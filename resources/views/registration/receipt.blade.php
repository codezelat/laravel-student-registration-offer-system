<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 15px;
            color: #333;
            line-height: 1.4;
            font-size: 12px;
        }
        .receipt-container {
            max-width: 480px;
            margin: 0 auto;
            border: 1px solid #2563eb;
            border-radius: 5px;
            padding: 20px;
            background: #fff;
        }
        .header {
            text-align: center;
            border-bottom: 1px solid #2563eb;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        .receipt-title {
            font-size: 18px;
            font-weight: bold;
            color: #dc2626;
            margin: 10px 0;
        }
        .info-section {
            margin-bottom: 15px;
        }
        .info-title {
            font-size: 14px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 8px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 3px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            padding: 3px 0;
        }
        .info-label {
            font-weight: 600;
            color: #374151;
            min-width: 100px;
            font-size: 11px;
        }
        .info-value {
            color: #111827;
            text-align: right;
            flex: 1;
            font-size: 11px;
        }
        .payment-section {
            background: #f0f9ff;
            border: 1px solid #0ea5e9;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
        }
        .payment-title {
            font-size: 14px;
            font-weight: bold;
            color: #0ea5e9;
            margin-bottom: 10px;
            text-align: center;
        }
        .success-message {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            color: #059669;
            margin: 15px 0;
            padding: 10px;
            background: #ecfdf5;
            border: 1px solid #10b981;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header -->
        <div class="header">
            <img src="file://{{ public_path('images/sitc-logo.png') }}" alt="SITC Logo" class="logo">
            <div class="receipt-title">PAYMENT RECEIPT</div>
        </div>

        <!-- Student Information -->
        <div class="info-section">
            <div class="info-title">Student Information</div>
            <div class="info-row">
                <span class="info-label">Registration ID:</span>
                <span class="info-value">{{ $student->registration_id }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Full Name:</span>
                <span class="info-value">{{ $student->full_name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">NIC:</span>
                <span class="info-value">{{ $student->nic }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $student->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Contact Number:</span>
                <span class="info-value">{{ $student->whatsapp_number }}</span>
            </div>
        </div>

        <!-- Program Information -->
        <div class="info-section">
            <div class="info-title">Program Information</div>
            <div class="info-row">
                <span class="info-label">Selected Program:</span>
                <span class="info-value">{{ $student->selected_diploma }}</span>
            </div>
        </div>

        <!-- Payment Information -->
        <div class="payment-section">
            <div class="payment-title">Payment Details</div>
            <div class="info-row">
                <span class="info-label">Payment Method:</span>
                <span class="info-value">Online Payment (PayHere)</span>
            </div>
            <div class="info-row">
                <span class="info-label">Payment Status:</span>
                <span class="info-value" style="color: #059669; font-weight: bold;">Completed</span>
            </div>
            <div class="info-row">
                <span class="info-label">Payment Date:</span>
                <span class="info-value">{{ $student->payment_date ? $student->payment_date->format('Y-m-d H:i:s') : 'N/A' }}</span>
            </div>
        </div>

        <!-- Success Message -->
        <div class="success-message">
            Course Fees Successfully Paid
        </div>

        <!-- Footer -->
        <div class="footer">
            <div>This is a computer-generated receipt and does not require a signature.</div>
        </div>
    </div>
</body>
</html>