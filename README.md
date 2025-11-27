# SITC Student Registration System - Special Offer Edition

A comprehensive web-based student registration and payment management system built with Laravel 12. This application facilitates online diploma program registrations with integrated payment processing through bank transfers and PayHere gateway, along with a full-featured admin panel for student data management.

---

## 📋 Table of Contents

-   [Features](#features)
-   [Tech Stack](#tech-stack)
-   [System Requirements](#system-requirements)
-   [Installation](#installation)
-   [Configuration](#configuration)
-   [Database Schema](#database-schema)
-   [Application Architecture](#application-architecture)
-   [Best Practices Implemented](#best-practices-implemented)
-   [Usage Guide](#usage-guide)
-   [Routes Documentation](#routes-documentation)
-   [Troubleshooting](#troubleshooting)
-   [License](#license)

---

## ✨ Features

### Student Registration Flow

-   **Multi-step Registration Process**: Intuitive 3-step workflow (Diploma Selection → Personal Information → Payment)
-   **Progress Indicators**: Visual progress bars and countdown timers on each step
-   **Dynamic Diploma Selection**: Choose from 5 UGC-recognized diploma programs
-   **Comprehensive Data Collection**: Personal details, contact information, address, NIC validation
-   **Per-Diploma Uniqueness**: Same student can register for multiple diplomas using same contact details

### Payment System

-   **Dual Payment Methods**:
    -   **Bank Transfer**: Upload payment slips to 4 major Sri Lankan banks (Bank of Ceylon, Sampath Bank, Commercial Bank, People's Bank)
    -   **Online Payment**: Integrated PayHere payment gateway for instant processing
-   **Payment Slip Upload**: Supports multiple file formats (JPG, PNG, PDF, DOCX, DOC) up to 10MB
-   **Automated SMS Notifications**: Confirmation messages sent to WhatsApp number upon successful payment
-   **Print-Optimized Success Pages**: A4-ready receipts for both payment methods

### Admin Panel

-   **Secure Authentication**: Session-based admin login with environment-configured credentials
-   **Student Management Dashboard**:
    -   Advanced search across 5 fields (Registration ID, Full Name, WhatsApp, NIC, Email)
    -   Filter by diploma program
    -   Pagination (15 records per page)
    -   View complete student details
    -   Edit student information with dynamic dropdowns
    -   Delete students with double confirmation (type "DELETE" to confirm)
-   **Excel Export**: Generate comprehensive reports with 17 data columns
-   **Payment Slip Management**: View uploaded payment slips, automatic deletion on student removal
-   **Responsive UI**: Modern glass-morphism design with TailwindCSS

### Data Validation & Security

-   **Custom Validation Rules**: Per-diploma uniqueness for NIC, Email, and WhatsApp number
-   **Composite Unique Constraints**: Database-level enforcement of data integrity
-   **CSRF Protection**: Laravel's built-in protection on all forms
-   **File Validation**: Secure file upload with type and size restrictions
-   **Session Management**: Secure data flow between registration steps

---

## 🛠 Tech Stack

### Backend

-   **Laravel**: 12.38.1
-   **PHP**: 8.4.6
-   **Database**: SQLite (production-ready, easily switchable to MySQL/PostgreSQL)
-   **Excel Processing**: PhpOffice/PhpSpreadsheet 5.2

### Frontend

-   **CSS Framework**: TailwindCSS 4.0
-   **JavaScript**: Alpine.js 3.15.1
-   **Build Tool**: Vite 7.0.7
-   **HTTP Client**: Axios 1.11.0
-   **Font**: Inter (Google Fonts)

### Payment Integration

-   **PayHere**: Sri Lankan payment gateway with MD5 hash verification

### Services

-   **SMS Service**: Custom implementation for payment notifications

---

## 💻 System Requirements

-   **PHP**: >= 8.2
-   **Composer**: Latest version
-   **Node.js**: >= 18.x
-   **npm**: >= 9.x
-   **SQLite3**: Enabled in PHP (or MySQL/PostgreSQL if preferred)
-   **Required PHP Extensions**:
    -   PDO
    -   SQLite/MySQL/PostgreSQL
    -   Mbstring
    -   OpenSSL
    -   Fileinfo
    -   GD (for image processing)

---

## 📦 Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd std-pro
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Environment Variables

Edit `.env` file and set the following:

```env
# Application
APP_NAME="SITC Student Registration"
APP_URL=http://localhost:8000

# Database (SQLite default)
DB_CONNECTION=sqlite
# DB_DATABASE=/absolute/path/to/database/database.sqlite

# Admin Credentials
ADMIN_USERNAME=admin
ADMIN_PASSWORD=your_secure_password

# PayHere Configuration
PAYHERE_MERCHANT_ID=your_merchant_id
PAYHERE_MERCHANT_SECRET=your_merchant_secret

# SMS Service (Configure based on your provider)
SMS_API_KEY=your_sms_api_key
SMS_API_URL=https://your-sms-provider.com/api
```

### 6. Create Database File (SQLite)

```bash
touch database/database.sqlite
```

### 7. Run Migrations

```bash
php artisan migrate
```

### 8. Create Storage Symlink

```bash
php artisan storage:link
```

### 9. Build Frontend Assets

```bash
npm run build
```

### 10. Start Development Server

```bash
# Option 1: Simple server
php artisan serve

# Option 2: With Vite hot reload
npm run dev
# In separate terminal:
php artisan serve
```

Visit: `http://localhost:8000`

---

## ⚙️ Configuration

### Diploma Programs (`config/diplomas.php`)

Configure available diploma programs with registration prefixes:

```php
return [
    [
        'name' => 'Diploma in English',
        'full_name' => 'Diploma in English – 2025 – UGC Recognized University Diploma',
        'reg_prefix' => 'SITC/2025/3B/EN',
    ],
    // Add more diplomas...
];
```

**Fields**:

-   `name`: Short display name
-   `full_name`: Complete program title
-   `reg_prefix`: Prefix for registration ID generation (e.g., `SITC/2025/3B/EN/12345678`)

### Districts (`config/districts.php`)

List of Sri Lankan districts for address dropdown:

```php
return [
    'Colombo',
    'Gampaha',
    'Kalutara',
    // ... all 25 districts
];
```

### Bank Accounts (`upload-slip.blade.php`)

Update bank account details in the accordion section:

```php
// Bank of Ceylon
Account Name: XXXXX
Account Number: XXXXXXXXXX
Branch: XXXXX

// Sampath Bank
Account Name: XXXXX
Account Number: XXXXXXXXXX
Branch: XXXXX

// Commercial Bank
Account Name: XXXXX
Account Number: XXXXXXXXXX
Branch: XXXXX

// People's Bank
Account Name: XXXXX
Account Number: XXXXXXXXXX
Branch: XXXXX
```

### Admin Credentials

Set in `.env`:

```env
ADMIN_USERNAME=admin
ADMIN_PASSWORD=your_secure_password
```

Access admin panel at: `/sitc-admin-area/login`

---

## 🗄 Database Schema

### `students` Table

| Column                | Type          | Constraints      | Description                               |
| --------------------- | ------------- | ---------------- | ----------------------------------------- |
| `id`                  | INTEGER       | PRIMARY KEY      | Auto-increment ID                         |
| `registration_id`     | VARCHAR(255)  | UNIQUE, NOT NULL | Format: `PREFIX/RANDOM8DIGITS`            |
| `student_id`          | VARCHAR(255)  | NULLABLE         | Auto-generated after payment confirmation |
| `full_name`           | VARCHAR(255)  | NOT NULL         | Student's full name                       |
| `name_with_initials`  | VARCHAR(255)  | NOT NULL         | Name with initials format                 |
| `gender`              | VARCHAR(50)   | NOT NULL         | Male/Female                               |
| `nic`                 | VARCHAR(20)   | NOT NULL         | National Identity Card number             |
| `date_of_birth`       | DATE          | NOT NULL         | Student's date of birth                   |
| `whatsapp_number`     | VARCHAR(20)   | NOT NULL         | WhatsApp contact (for SMS)                |
| `home_contact_number` | VARCHAR(20)   | NULLABLE         | Alternative contact number                |
| `email`               | VARCHAR(255)  | NOT NULL         | Email address                             |
| `permanent_address`   | TEXT          | NOT NULL         | Full address                              |
| `postal_code`         | VARCHAR(10)   | NOT NULL         | Postal/ZIP code                           |
| `district`            | VARCHAR(100)  | NOT NULL         | Sri Lankan district                       |
| `selected_diploma`    | VARCHAR(255)  | NOT NULL         | Selected diploma program name             |
| `terms_accepted`      | BOOLEAN       | DEFAULT 0        | Terms & conditions acceptance             |
| `payment_method`      | VARCHAR(50)   | NULLABLE         | `bank_slip` or `payhere`                  |
| `payment_status`      | VARCHAR(50)   | NULLABLE         | Payment confirmation status               |
| `amount_paid`         | DECIMAL(10,2) | NULLABLE         | Payment amount in LKR                     |
| `payment_date`        | DATETIME      | NULLABLE         | Payment completion timestamp              |
| `payment_slip`        | VARCHAR(255)  | NULLABLE         | File path to uploaded slip                |
| `created_at`          | TIMESTAMP     | AUTO             | Record creation time                      |
| `updated_at`          | TIMESTAMP     | AUTO             | Last update time                          |

### Composite Unique Constraints

Per-diploma uniqueness implemented with composite keys:

```sql
UNIQUE (nic, selected_diploma)
UNIQUE (email, selected_diploma)
UNIQUE (whatsapp_number, selected_diploma)
```

**Purpose**: Allows the same student to register for different diplomas using the same contact information.

### Migrations

1. **`2025_11_14_000000_create_students_table.php`** - Initial schema
2. **`2025_11_27_000001_drop_contact_number_from_students.php`** - Removed legacy field
3. **`2025_11_27_000002_update_selected_diploma_enum.php`** - Changed to string type
4. **`2025_11_27_000003_update_unique_constraints_per_diploma.php`** - Composite constraints

---

## 🏗 Application Architecture

### MVC Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── RegistrationController.php    # Student registration flow
│   │   ├── PaymentController.php         # Payment processing
│   │   └── AdminController.php           # Admin panel CRUD
│   └── Requests/
│       └── StoreStudentRequest.php       # Custom validation
├── Models/
│   └── Student.php                       # Eloquent model
└── Services/
    └── SmsService.php                    # SMS notifications
```

### Controllers

#### `RegistrationController.php`

Handles the multi-step registration workflow:

-   **`landing()`**: Welcome page
-   **`selectDiploma(POST)`**: Stores selected diploma in session
-   **`showRegistrationForm()`**: Displays registration form
-   **`store(POST)`**: Validates and stores student data, generates registration ID
-   **`generateRegistrationId()`**: Creates unique 8-digit random registration ID

**Session Management**:

```php
session(['selected_diploma' => $request->diploma]);
session(['student_data' => $validated]);
```

#### `PaymentController.php`

Manages dual payment methods:

-   **`paymentOptions()`**: Shows bank slip vs PayHere choice
-   **`showUploadSlip()`**: Bank transfer form with 4 bank accounts
-   **`storeSlip(POST)`**: Processes file upload, generates student ID, sends SMS
-   **`payhere()`**: Initiates PayHere transaction with MD5 hash
-   **`payhereNotify(POST)`**: Webhook for payment status updates
-   **`payhereSuccess(GET)`**: Success redirect handler

**File Storage**:

```php
$path = $request->file('payment_slip')->store('payment_slips', 'public');
```

**SMS Notification**:

```php
$smsService = new \App\Services\SmsService();
$smsService->sendPaymentConfirmation($student->whatsapp_number, $student->registration_id);
```

#### `AdminController.php`

Full CRUD operations for admin panel:

-   **`showLogin()`/`login(POST)`**: Session-based authentication
-   **`dashboard(GET)`**: Search, filter, pagination (15 per page)
-   **`export(GET)`**: Excel file with 17 columns
-   **`view($id)`**: JSON response with full student data
-   **`edit($id)`**: Edit form with dynamic dropdowns
-   **`update(PUT, $id)`**: Validation and update logic
-   **`destroy(DELETE, $id)`**: Deletes student and payment slip file
-   **`logout(POST)`**: Clears admin session

**Search Implementation**:

```php
$students = Student::query()
    ->when($search, fn($q) => $q->where('registration_id', 'like', "%{$search}%")
        ->orWhere('whatsapp_number', 'like', "%{$search}%")
        ->orWhere('nic', 'like', "%{$search}%")
        ->orWhere('email', 'like', "%{$search}%")
        ->orWhere('full_name', 'like', "%{$search}%"))
    ->when($diploma, fn($q) => $q->where('selected_diploma', $diploma))
    ->orderBy('created_at', 'desc')
    ->paginate(15);
```

**Excel Export Columns**:

1. Registration ID
2. Full Name
3. Name with Initials
4. Gender
5. NIC
6. Date of Birth
7. Email
8. WhatsApp Number
9. Home Contact Number
10. Permanent Address
11. Postal Code
12. District
13. Selected Diploma
14. Payment Method
15. Amount Paid
16. Payment Date
17. Payment Slip URL

### Custom Request Validation

#### `StoreStudentRequest.php`

Per-diploma uniqueness validation using closure:

```php
'nic' => [
    'required',
    'string',
    'max:20',
    function ($attribute, $value, $fail) {
        $diploma = session('selected_diploma');
        $exists = Student::where('nic', $value)
            ->where('selected_diploma', $diploma)
            ->exists();
        if ($exists) {
            $fail('This NIC has already been registered for this diploma.');
        }
    }
],
```

Similar logic for `email` and `whatsapp_number`.

### Models

#### `Student.php`

**Fillable Fields**:

```php
protected $fillable = [
    'registration_id', 'student_id', 'full_name', 'name_with_initials',
    'gender', 'nic', 'date_of_birth', 'home_contact_number',
    'whatsapp_number', 'email', 'permanent_address', 'postal_code',
    'district', 'selected_diploma', 'terms_accepted', 'payment_method',
    'payment_status', 'amount_paid', 'payment_date', 'payment_slip'
];
```

**Timestamps**: Enabled (`created_at`, `updated_at`)

### Services

#### `SmsService.php`

Custom SMS integration for payment notifications:

```php
public function sendPaymentConfirmation($phoneNumber, $registrationId)
{
    // Implementation depends on SMS provider API
    // Sends confirmation message with registration details
}
```

---

## ✅ Best Practices Implemented

### 1. **Separation of Concerns**

-   Controllers handle HTTP logic only
-   Models manage data relationships
-   Services encapsulate business logic (SMS)
-   Custom Request classes for validation

### 2. **Security**

-   **CSRF Protection**: All forms include `@csrf` tokens
-   **Input Validation**: Comprehensive validation rules in StoreStudentRequest
-   **SQL Injection Prevention**: Eloquent ORM with parameterized queries
-   **File Upload Security**: Type and size validation, secure storage paths
-   **Session Security**: Environment-configured credentials, session encryption
-   **POST-only Destructive Routes**: Logout and delete use POST method

### 3. **Database Design**

-   **Composite Unique Constraints**: Per-diploma data integrity
-   **Proper Indexing**: Unique keys on frequently queried fields
-   **Nullable Fields**: Optional data (home_contact_number, student_id)
-   **Appropriate Data Types**: VARCHAR for text, DECIMAL for currency, DATE for dates
-   **Migration History**: Tracked changes with separate migration files

### 4. **Code Organization**

-   **Config Files**: Centralized diploma and district data
-   **Blade Components**: Reusable UI elements (button.blade.php, input.blade.php, card.blade.php, layout.blade.php)
-   **Route Grouping**: Admin routes under `/sitc-admin-area` prefix with middleware
-   **Descriptive Naming**: Clear function and variable names
-   **Comments**: Inline documentation for complex logic

### 5. **User Experience**

-   **Progress Indicators**: Visual feedback on registration steps
-   **Countdown Timers**: JavaScript-based time limits per step
-   **Responsive Design**: Mobile-friendly TailwindCSS layouts
-   **Glass Morphism UI**: Modern backdrop-filter effects
-   **Loading States**: Disabled buttons during form submission
-   **Error Messages**: User-friendly validation feedback
-   **Print Optimization**: A4-ready success pages with `@media print` CSS

### 6. **Performance**

-   **Pagination**: Efficient data loading (15 records per page)
-   **Eager Loading**: Optimized queries (where applicable)
-   **Asset Bundling**: Vite for optimized CSS/JS
-   **Database Connection Pooling**: SQLite for lightweight operations
-   **File Storage**: Public disk with symlink for efficient serving

### 7. **Maintainability**

-   **Version Control**: Git-based workflow
-   **Environment Configuration**: `.env` for sensitive data
-   **Composer Scripts**: Automated setup commands
-   **Consistent Code Style**: Laravel conventions
-   **Migration-based Schema**: Reversible database changes

### 8. **Data Integrity**

-   **Database-level Constraints**: Enforced uniqueness
-   **Application-level Validation**: Double-checked in StoreStudentRequest
-   **Double Confirmation**: Type "DELETE" to confirm destructive actions
-   **File Cleanup**: Deletes payment slips when student is removed

---

## 📖 Usage Guide

### For Students

#### Step 1: Select Diploma Program

1. Visit the landing page
2. Click "Start Registration"
3. Choose from 5 diploma programs
4. Click "Next"

#### Step 2: Fill Registration Form

1. **Personal Information**:
    - Full Name
    - Name with Initials
    - Gender (dropdown)
    - NIC Number
    - Date of Birth
2. **Contact Information**:
    - WhatsApp Number (will receive SMS confirmation)
    - Home Contact Number (optional)
    - Email Address
3. **Address Information**:
    - Permanent Address
    - Postal Code
    - District (dropdown)
4. Accept Terms & Conditions
5. Click "Submit"

#### Step 3: Make Payment

**Option A: Bank Transfer**

1. Select "Upload Bank Slip"
2. Click on preferred bank to view account details
3. Transfer Rs. 50,000.00 to the account
4. Upload payment slip (JPG/PNG/PDF/DOCX/DOC, max 10MB)
5. Receive SMS confirmation with Registration ID

**Option B: Online Payment**

1. Select "Pay Online with PayHere"
2. Click "Proceed to Payment"
3. Complete payment on PayHere gateway
4. Automatic redirect to success page
5. Receive SMS confirmation with Registration ID

#### Step 4: Receive Confirmation

-   Print success page (A4 format)
-   Note your Registration ID (e.g., `SITC/2025/3B/EN/12345678`)
-   Student ID will be generated after payment verification

---

### For Administrators

#### Login

1. Navigate to `/sitc-admin-area/login`
2. Enter credentials from `.env` file
3. Access dashboard

#### Dashboard Operations

**Search Students**:

-   Type in search box to filter by:
    -   Registration ID
    -   Full Name
    -   WhatsApp Number
    -   NIC
    -   Email
-   Results update in real-time

**Filter by Diploma**:

-   Use dropdown to show only students from specific diploma program

**View Student Details**:

1. Click "View" button in Actions column
2. Modal displays all 18+ fields including:
    - Personal information
    - Contact details
    - Address
    - Payment information
    - Payment slip (clickable link)

**Edit Student**:

1. Click "Edit" button
2. Modify any field except:
    - Registration ID (read-only)
    - Payment fields (read-only)
3. Districts and Diplomas populated from config files
4. Click "Update Student"

**Delete Student**:

1. Click "Delete" button
2. Modal appears
3. Type exactly "DELETE" in confirmation field
4. Click "Confirm Delete"
5. Student record AND payment slip file are removed

**Export to Excel**:

1. Click "Export to Excel" button (top right)
2. Downloads `.xlsx` file with 17 columns
3. All visible students (respects current filters)

**Logout**:

-   Click "Logout" in header
-   Session cleared, redirected to login

---

## 🗺 Routes Documentation

### Public Routes

```php
// Welcome & Landing
GET /                          → welcome.blade.php

// Registration Flow
GET /register                  → RegistrationController@landing
POST /register/select-diploma  → RegistrationController@selectDiploma
GET /register/form             → RegistrationController@showRegistrationForm
POST /register/store           → RegistrationController@store

// Payment Flow
GET /payment/options           → PaymentController@paymentOptions
GET /payment/upload-slip       → PaymentController@showUploadSlip
POST /payment/upload-slip      → PaymentController@storeSlip
GET /payment/slip-success      → slip-success.blade.php
GET /payment/payhere           → PaymentController@payhere
POST /payment/payhere/notify   → PaymentController@payhereNotify (webhook)
GET /payment/payhere/success   → PaymentController@payhereSuccess
GET /payment/success           → payment-success.blade.php
```

### Admin Routes (Prefix: `/sitc-admin-area`)

```php
// Authentication
GET /sitc-admin-area/login     → AdminController@showLogin
POST /sitc-admin-area/login    → AdminController@login
POST /sitc-admin-area/logout   → AdminController@logout

// Dashboard
GET /sitc-admin-area/dashboard → AdminController@dashboard

// CRUD Operations
GET /sitc-admin-area/export    → AdminController@export (Excel download)
GET /sitc-admin-area/student/{id} → AdminController@view (JSON)
GET /sitc-admin-area/student/{id}/edit → AdminController@edit
PUT /sitc-admin-area/student/{id} → AdminController@update
DELETE /sitc-admin-area/student/{id} → AdminController@destroy
```

---

## 🔧 Troubleshooting

### Common Issues

#### 1. **"No application encryption key has been specified"**

```bash
php artisan key:generate
```

#### 2. **SQLite database not found**

```bash
touch database/database.sqlite
php artisan migrate
```

#### 3. **Payment slips not displaying**

```bash
php artisan storage:link
# Verify symlink: public/storage -> storage/app/public
```

#### 4. **Vite manifest not found**

```bash
npm install
npm run build
```

#### 5. **Composite unique constraint violation**

-   Error: "Duplicate entry for NIC/Email/WhatsApp"
-   Solution: Student already registered for this diploma. Use different details or select different diploma.

#### 6. **Admin login fails**

-   Check `.env` file for correct `ADMIN_USERNAME` and `ADMIN_PASSWORD`
-   Ensure no extra spaces in credentials

#### 7. **Excel export downloads empty file**

-   Verify `PhpOffice/PhpSpreadsheet` is installed:
    ```bash
    composer require phpoffice/phpspreadsheet
    ```

#### 8. **SMS not sending**

-   Check `SmsService.php` configuration
-   Verify API credentials in `.env`
-   Check SMS provider logs

#### 9. **PayHere payment fails**

-   Verify `PAYHERE_MERCHANT_ID` and `PAYHERE_MERCHANT_SECRET` in `.env`
-   Check MD5 hash generation logic
-   Enable PayHere sandbox mode for testing

#### 10. **Pagination not preserving filters**

-   Ensure using `$students->appends(request()->query())` in blade template
-   Check if search/diploma parameters are in URL

---

## 📄 License

This project is proprietary software developed for SITC Campus. All rights reserved.

---

## 👥 Credits

**Developed by**: Codezela Technologies
**Framework**: Laravel 12.38.1  
**Payment Gateway**: PayHere (Sri Lanka)  
**UI Design**: TailwindCSS with glass-morphism effects

---

## 📞 Support

For technical support or inquiries:

-   **Email**: info@sitc.lk

---

**Last Updated**: 27 November 2025  
**Version**: 1.0.0
