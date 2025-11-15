<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 24px;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px 20px;
            border: 2px solid white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: white;
            color: #667eea;
        }

        .container {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .controls {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
        }

        .search-box input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .search-box input:focus {
            outline: none;
            border-color: #667eea;
        }

        .btn-export {
            background: #28a745;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            white-space: nowrap;
        }

        .btn-export:hover {
            background: #218838;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #667eea;
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
            transition: background 0.2s;
        }

        tbody tr:hover {
            background: #f9f9f9;
        }

        td {
            padding: 15px;
        }

        .payment-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .payment-link:hover {
            text-decoration: underline;
        }

        .no-payment {
            color: #999;
            font-style: italic;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 20px;
            background: white;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #667eea;
            transition: all 0.3s;
        }

        .pagination a:hover {
            background: #667eea;
            color: white;
        }

        .pagination .active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .pagination .disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .total-records {
            text-align: center;
            padding: 15px;
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }

            .controls {
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard - Student Records</h1>
        <a href="{{ route('admin.logout') }}" class="btn-logout">Logout</a>
    </div>

    <div class="container">
        <div class="controls">
            <form action="{{ route('admin.dashboard') }}" method="GET" style="display: flex; gap: 15px; flex: 1; flex-wrap: wrap;">
                <div class="search-box">
                    <input type="text" name="search" placeholder="Search by Name, ID, NIC, Contact No, or Email..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-export" style="background: #667eea;">Search</button>
                @if(request('search'))
                    <a href="{{ route('admin.dashboard') }}" class="btn-export" style="background: #6c757d;">Clear</a>
                @endif
            </form>
            <a href="{{ route('admin.export') }}?search={{ request('search') }}" class="btn-export">Export to Excel</a>
        </div>

        <div class="total-records">
            Showing {{ $students->firstItem() ?? 0 }} to {{ $students->lastItem() ?? 0 }} of {{ $students->total() }} students
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>NIC</th>
                        <th>Date of Birth</th>
                        <th>Contact Number</th>
                        <th>Email Address</th>
                        <th>Payment Slip</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->nic }}</td>
                            <td>{{ $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : 'N/A' }}</td>
                            <td>{{ $student->contact_number }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                @if($student->payment_slip)
                                    <a href="{{ asset('storage/' . $student->payment_slip) }}" target="_blank" class="payment-link">View Slip</a>
                                @else
                                    <span class="no-payment">No slip uploaded</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: #999;">
                                No students found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($students->hasPages())
            <div class="pagination">
                {{-- Previous Page Link --}}
                @if ($students->onFirstPage())
                    <span class="disabled">&laquo; Previous</span>
                @else
                    <a href="{{ $students->previousPageUrl() }}&search={{ request('search') }}">&laquo; Previous</a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                    @if ($page == $students->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}&search={{ request('search') }}">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($students->hasMorePages())
                    <a href="{{ $students->nextPageUrl() }}&search={{ request('search') }}">Next &raquo;</a>
                @else
                    <span class="disabled">Next &raquo;</span>
                @endif
            </div>
        @endif
    </div>
</body>
</html>
