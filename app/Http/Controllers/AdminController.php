<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Session::get('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->username === config('app.admin_username') && $request->password === config('app.admin_password')) {
            Session::put('admin_logged_in', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
    }

    public function dashboard(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $query = Student::query();

        // Filter by search term
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', '%' . $search . '%')
                  ->orWhere('id', 'like', '%' . $search . '%')
                  ->orWhere('contact_number', 'like', '%' . $search . '%')
                  ->orWhere('nic', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Filter by diploma
        if ($request->has('diploma') && $request->diploma != '') {
            $query->where('selected_diploma', $request->diploma);
        }

        $students = $query->orderBy('created_at', 'desc')->paginate(25);

        // Get unique diplomas for filter dropdown
        $diplomas = Student::distinct()->pluck('selected_diploma')->filter()->sort()->values();

        return view('admin.dashboard', compact('students', 'diplomas'));
    }

    public function export(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $query = Student::query();

        // Apply same filter as dashboard
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', '%' . $search . '%')
                  ->orWhere('id', 'like', '%' . $search . '%')
                  ->orWhere('contact_number', 'like', '%' . $search . '%')
                  ->orWhere('nic', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Filter by diploma
        if ($request->has('diploma') && $request->diploma != '') {
            $query->where('selected_diploma', $request->diploma);
        }

        $students = $query->get();

        // Create new Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'Student ID');
        $sheet->setCellValue('B1', 'Full Name');
        $sheet->setCellValue('C1', 'NIC');
        $sheet->setCellValue('D1', 'Date of Birth');
        $sheet->setCellValue('E1', 'Contact Number');
        $sheet->setCellValue('F1', 'Email Address');
        $sheet->setCellValue('G1', 'Selected Diploma');
        $sheet->setCellValue('H1', 'Payment Method');
        $sheet->setCellValue('I1', 'Payment Status');
        $sheet->setCellValue('J1', 'Amount Paid');
        $sheet->setCellValue('K1', 'Payment Date');
        $sheet->setCellValue('L1', 'Payment Slip');

        // Style headers
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
        $sheet->getStyle('A1:L1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FF667eea');
        $sheet->getStyle('A1:L1')->getFont()->getColor()->setARGB('FFFFFFFF');

        // Add data
        $row = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $row, $student->student_id ?? 'N/A');
            $sheet->setCellValue('B' . $row, $student->full_name);
            $sheet->setCellValue('C' . $row, $student->nic);
            $sheet->setCellValue('D' . $row, $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : 'N/A');
            $sheet->setCellValue('E' . $row, $student->contact_number);
            $sheet->setCellValue('F' . $row, $student->email);
            $sheet->setCellValue('G' . $row, $student->selected_diploma);
            $sheet->setCellValue('H' . $row, ucfirst($student->payment_method ?? 'N/A'));
            $sheet->setCellValue('I' . $row, ucfirst($student->payment_status ?? 'N/A'));
            $sheet->setCellValue('J' . $row, $student->amount_paid ? 'LKR ' . number_format($student->amount_paid, 2) : 'N/A');
            $sheet->setCellValue('K' . $row, $student->payment_date ? $student->payment_date->format('Y-m-d H:i:s') : 'N/A');
            $sheet->setCellValue('L' . $row, $student->payment_slip ? url('storage/' . $student->payment_slip) : 'N/A');
            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'L') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Create writer and download
        $filename = 'students_' . date('Y-m-d_His') . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit;
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    public function view($id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function edit($id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $student = Student::findOrFail($id);
        return view('admin.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $student = Student::findOrFail($id);
        
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'nic' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'selected_diploma' => 'required|string',
            'payment_status' => 'nullable|string',
        ]);

        $student->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $student = Student::findOrFail($id);
        
        // Delete payment slip file if exists
        if ($student->payment_slip && \Storage::exists('public/' . $student->payment_slip)) {
            \Storage::delete('public/' . $student->payment_slip);
        }
        
        $student->delete();

        return response()->json(['success' => true, 'message' => 'Student deleted successfully']);
    }
}
