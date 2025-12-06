<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
                  ->orWhere('registration_id', 'like', '%' . $search . '%')
                  ->orWhere('whatsapp_number', 'like', '%' . $search . '%')
                  ->orWhere('nic', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Filter by diploma
        if ($request->has('diploma') && $request->diploma != '') {
            $query->where('selected_diploma', $request->diploma);
        }

        // Filter by payment method
        if ($request->has('payment_method') && $request->payment_method != '') {
            $query->where('payment_method', $request->payment_method);
        }

        $students = $query->orderBy('created_at', 'desc')->paginate(15);

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
                  ->orWhere('registration_id', 'like', '%' . $search . '%')
                  ->orWhere('whatsapp_number', 'like', '%' . $search . '%')
                  ->orWhere('nic', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Filter by diploma
        if ($request->has('diploma') && $request->diploma != '') {
            $query->where('selected_diploma', $request->diploma);
        }

        // Filter by payment method
        if ($request->has('payment_method') && $request->payment_method != '') {
            $query->where('payment_method', $request->payment_method);
        }

        $students = $query->get();

        // Create new Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'Registration ID');
        $sheet->setCellValue('B1', 'Full Name');
        $sheet->setCellValue('C1', 'Name with Initials');
        $sheet->setCellValue('D1', 'Gender');
        $sheet->setCellValue('E1', 'NIC');
        $sheet->setCellValue('F1', 'Date of Birth');
        $sheet->setCellValue('G1', 'Email');
        $sheet->setCellValue('H1', 'WhatsApp Number');
        $sheet->setCellValue('I1', 'Home Contact');
        $sheet->setCellValue('J1', 'Permanent Address');
        $sheet->setCellValue('K1', 'Postal Code');
        $sheet->setCellValue('L1', 'District');
        $sheet->setCellValue('M1', 'Selected Diploma');
        $sheet->setCellValue('N1', 'Payment Method');
        $sheet->setCellValue('O1', 'Amount Paid');
        $sheet->setCellValue('P1', 'Payment Date');
        $sheet->setCellValue('Q1', 'Payment Slip');

        // Style headers
        $sheet->getStyle('A1:Q1')->getFont()->setBold(true);
        $sheet->getStyle('A1:Q1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FF667eea');
        $sheet->getStyle('A1:R1')->getFont()->getColor()->setARGB('FFFFFFFF');

        // Add data
        $row = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $row, $student->registration_id ?? 'N/A');
            $sheet->setCellValue('B' . $row, $student->full_name);
            $sheet->setCellValue('C' . $row, $student->name_with_initials ?? 'N/A');
            $sheet->setCellValue('D' . $row, ucfirst($student->gender ?? 'N/A'));
            $sheet->setCellValue('E' . $row, $student->nic);
            $sheet->setCellValue('F' . $row, $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : 'N/A');
            $sheet->setCellValue('G' . $row, $student->email);
            $sheet->setCellValue('H' . $row, $student->whatsapp_number ?? 'N/A');
            $sheet->setCellValue('I' . $row, $student->home_contact_number ?? 'N/A');
            $sheet->setCellValue('J' . $row, $student->permanent_address ?? 'N/A');
            $sheet->setCellValue('K' . $row, $student->postal_code ?? 'N/A');
            $sheet->setCellValue('L' . $row, $student->district ?? 'N/A');
            $sheet->setCellValue('M' . $row, $student->selected_diploma);
            $sheet->setCellValue('N' . $row, ucfirst($student->payment_method ?? 'N/A'));
            $sheet->setCellValue('O' . $row, $student->amount_paid ? 'LKR ' . number_format($student->amount_paid, 2) : 'N/A');
            $sheet->setCellValue('P' . $row, $student->payment_date ? $student->payment_date->format('Y-m-d H:i:s') : 'N/A');
            
            if ($student->payment_slip) {
                $url = url('storage/' . $student->payment_slip);
                $sheet->setCellValue('Q' . $row, $url);
                $sheet->getCell('Q' . $row)->getHyperlink()->setUrl($url);
                $sheet->getStyle('Q' . $row)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
                $sheet->getStyle('Q' . $row)->getFont()->setUnderline(true);
            } else {
                $sheet->setCellValue('Q' . $row, 'N/A');
            }
            
            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'R') as $col) {
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
        $diplomas = config('diplomas');
        $districts = config('districts');
        
        return view('admin.edit', compact('student', 'diplomas', 'districts'));
    }

    public function update(Request $request, $id)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $student = Student::findOrFail($id);
        
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'name_with_initials' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female',
            'nic' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'whatsapp_number' => 'nullable|string|regex:/^07[0-9]{8}$/',
            'home_contact_number' => 'required|string|regex:/^0[0-9]{9}$/',
            'email' => 'required|email|max:255',
            'permanent_address' => 'nullable|string',
            'postal_code' => 'nullable|string|max:10',
            'district' => 'nullable|string',
            'selected_diploma' => 'required|string',
        ], [
            'whatsapp_number.regex' => 'Please enter a valid Sri Lankan mobile number starting with 07 (e.g., 0771234567).',
            'home_contact_number.regex' => 'Please enter a valid Sri Lankan mobile number (e.g., 0771234567).',
        ], [
            'home_contact_number' => 'emergency contact number',
            'whatsapp_number' => 'WhatsApp number',
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
        if ($student->payment_slip && Storage::exists('public/' . $student->payment_slip)) {
            Storage::delete('public/' . $student->payment_slip);
        }
        
        $student->delete();

        return response()->json(['success' => true, 'message' => 'Student deleted successfully']);
    }
}
