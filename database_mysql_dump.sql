-- ============================================================================
-- SITC Student Registration System - MySQL Database Dump
-- ============================================================================
-- Generated: November 27, 2025
-- Database: sitc_student_registration
-- Version: 1.0.0
-- Description: Complete MySQL-compatible database schema for student 
--              registration system with dual payment methods
-- ============================================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `sitc_student_registration`
-- Create database (uncomment if needed)
--

-- CREATE DATABASE IF NOT EXISTS `sitc_student_registration` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- USE `sitc_student_registration`;

-- ============================================================================
-- Table structure for table `cache`
-- ============================================================================

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- Table structure for table `cache_locks`
-- ============================================================================

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- Table structure for table `failed_jobs`
-- ============================================================================

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- Table structure for table `jobs`
-- ============================================================================

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- Table structure for table `job_batches`
-- ============================================================================

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- Table structure for table `migrations`
-- ============================================================================

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_14_000000_create_students_table', 1),
(5, '2025_11_14_091759_add_payment_fields_to_students_table', 1),
(6, '2025_11_26_221443_add_additional_fields_to_students_table', 1),
(7, '2025_11_27_000001_drop_contact_number_from_students', 1),
(8, '2025_11_27_000002_update_selected_diploma_enum', 1),
(9, '2025_11_27_000003_update_unique_constraints_per_diploma', 1);

-- ============================================================================
-- Table structure for table `password_reset_tokens`
-- ============================================================================

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- Table structure for table `sessions`
-- ============================================================================

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- Table structure for table `students` (MAIN APPLICATION TABLE)
-- ============================================================================
-- This is the core table for student registration system
-- Contains all student information, payment details, and diploma selection
-- ============================================================================

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `registration_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unique registration ID (e.g., SITC/2025/3B/EN/12345678)',
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Auto-generated student ID after payment confirmation',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Student full name',
  `name_with_initials` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name with initials format',
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Student gender',
  `nic` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'National Identity Card number',
  `date_of_birth` date NOT NULL COMMENT 'Student date of birth',
  `whatsapp_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'WhatsApp contact number (for SMS notifications)',
  `home_contact_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Alternative contact number',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email address',
  `permanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Full permanent address',
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Postal/ZIP code',
  `district` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sri Lankan district',
  `selected_diploma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Selected diploma program name',
  `terms_accepted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Terms and conditions acceptance',
  `payment_method` enum('bank_slip','payhere','online','slip') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment method used',
  `payment_slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'File path to uploaded payment slip',
  `payment_status` enum('pending','completed') COLLATE utf8mb4_unicode_ci DEFAULT 'pending' COMMENT 'Payment confirmation status',
  `payhere_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'PayHere transaction order ID',
  `amount_paid` decimal(10,2) DEFAULT NULL COMMENT 'Amount paid in LKR',
  `payment_date` timestamp NULL DEFAULT NULL COMMENT 'Payment completion timestamp',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_registration_id_unique` (`registration_id`),
  UNIQUE KEY `students_student_id_unique` (`student_id`),
  UNIQUE KEY `students_nic_diploma_unique` (`nic`,`selected_diploma`),
  UNIQUE KEY `students_email_diploma_unique` (`email`,`selected_diploma`),
  UNIQUE KEY `students_whatsapp_diploma_unique` (`whatsapp_number`,`selected_diploma`),
  KEY `students_registration_id_index` (`registration_id`),
  KEY `students_email_index` (`email`),
  KEY `students_nic_index` (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Main student registration table with payment tracking';

-- ============================================================================
-- Table structure for table `users`
-- ============================================================================

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================================
-- COMPOSITE UNIQUE CONSTRAINTS EXPLANATION
-- ============================================================================
-- The students table uses composite unique constraints to allow the same
-- student to register for multiple diploma programs:
--
-- 1. students_nic_diploma_unique (nic, selected_diploma)
--    - Same NIC can register for different diplomas
--    - Cannot register twice for the same diploma
--
-- 2. students_email_diploma_unique (email, selected_diploma)
--    - Same email can register for different diplomas
--    - Cannot register twice for the same diploma
--
-- 3. students_whatsapp_diploma_unique (whatsapp_number, selected_diploma)
--    - Same WhatsApp number can register for different diplomas
--    - Cannot register twice for the same diploma
--
-- Example: Student with NIC 123456789V can register for:
--   - Diploma in English (using same email/WhatsApp)
--   - Diploma in IT (using same email/WhatsApp)
--   - Diploma in HR (using same email/WhatsApp)
-- But cannot register twice for "Diploma in English"
-- ============================================================================

-- ============================================================================
-- DIPLOMA PROGRAMS REFERENCE
-- ============================================================================
-- Available diploma programs (configured in config/diplomas.php):
--
-- 1. Diploma in English
--    Registration Prefix: SITC/2025/3B/EN
--    Amount: 50000.00 LKR
--
-- 2. Diploma in Psychology and Counseling
--    Registration Prefix: SITC/2025/4B/PC
--    Amount: 50000.00 LKR
--
-- 3. Diploma in Information Technology
--    Registration Prefix: SITC/2025/2B/IT
--    Amount: 50000.00 LKR
--
-- 4. Diploma in Human Resource Management
--    Registration Prefix: SITC/2025/3B/HR
--    Amount: 50000.00 LKR
--
-- 5. Diploma in Business Management
--    Registration Prefix: SITC/2025/2B/BM
--    Amount: 50000.00 LKR
-- ============================================================================

-- ============================================================================
-- PAYMENT METHODS REFERENCE
-- ============================================================================
-- 1. Bank Transfer (bank_slip or slip)
--    - Upload payment slip to 4 major Sri Lankan banks
--    - Banks: Bank of Ceylon, Sampath Bank, Commercial Bank, People's Bank
--    - File stored in: storage/app/public/payment_slips/
--    - Supported formats: JPG, PNG, PDF, DOCX, DOC
--    - Max file size: 10MB
--
-- 2. Online Payment (payhere or online)
--    - PayHere payment gateway integration
--    - Instant payment processing
--    - MD5 hash verification
--    - payhere_order_id stores transaction reference
-- ============================================================================

-- ============================================================================
-- INDEXES AND PERFORMANCE OPTIMIZATION
-- ============================================================================
-- The following indexes are created for optimal query performance:
--
-- Primary Key: id
-- Unique Indexes:
--   - registration_id (unique identifier for each registration)
--   - student_id (unique identifier after payment)
--   - (nic, selected_diploma) - composite for per-diploma uniqueness
--   - (email, selected_diploma) - composite for per-diploma uniqueness
--   - (whatsapp_number, selected_diploma) - composite for per-diploma uniqueness
--
-- Regular Indexes:
--   - registration_id (for fast lookups in admin search)
--   - email (for fast lookups in admin search)
--   - nic (for fast lookups in admin search)
--
-- Admin dashboard searches on:
--   - registration_id (exact match)
--   - full_name (LIKE search)
--   - whatsapp_number (LIKE search)
--   - nic (LIKE search)
--   - email (LIKE search)
--   - selected_diploma (exact match for filtering)
-- ============================================================================

-- ============================================================================
-- SAMPLE DATA STRUCTURE
-- ============================================================================
-- Example student record structure:
--
-- registration_id: "SITC/2025/3B/EN/12345678"
-- student_id: "STD2025001" (generated after payment)
-- full_name: "John Doe"
-- name_with_initials: "J. Doe"
-- gender: "male"
-- nic: "123456789V"
-- date_of_birth: "2000-01-15"
-- whatsapp_number: "0771234567"
-- home_contact_number: "0112345678"
-- email: "john.doe@example.com"
-- permanent_address: "123, Main Street, Colombo 07"
-- postal_code: "00700"
-- district: "Colombo"
-- selected_diploma: "Diploma in English"
-- terms_accepted: 1
-- payment_method: "bank_slip"
-- payment_slip: "payment_slips/abc123.jpg"
-- payment_status: "completed"
-- payhere_order_id: NULL
-- amount_paid: 50000.00
-- payment_date: "2025-11-27 14:30:00"
-- ============================================================================

-- ============================================================================
-- IMPORT INSTRUCTIONS
-- ============================================================================
-- To import this database into MySQL via phpMyAdmin:
--
-- 1. Login to phpMyAdmin
-- 2. Create a new database named "sitc_student_registration" (or any name)
-- 3. Select the database
-- 4. Click "Import" tab
-- 5. Choose this SQL file
-- 6. Click "Go" button
-- 7. Wait for import to complete
--
-- To use with Laravel application:
-- 1. Update your .env file:
--    DB_CONNECTION=mysql
--    DB_HOST=127.0.0.1
--    DB_PORT=3306
--    DB_DATABASE=sitc_student_registration
--    DB_USERNAME=your_mysql_username
--    DB_PASSWORD=your_mysql_password
--
-- 2. No need to run migrations, database is ready to use
-- 3. Set up storage symlink: php artisan storage:link
-- 4. Configure admin credentials in .env
-- ============================================================================

-- ============================================================================
-- COLLATION AND CHARACTER SET
-- ============================================================================
-- All tables use utf8mb4_unicode_ci collation for proper Unicode support
-- This ensures compatibility with:
-- - Sinhala characters
-- - Tamil characters
-- - Special characters in names and addresses
-- - Emojis (if needed in future)
-- ============================================================================

COMMIT;

-- ============================================================================
-- END OF SQL DUMP
-- ============================================================================
-- Database structure created successfully
-- Total tables: 11
-- Main application table: students
-- Supporting tables: users, sessions, cache, jobs, migrations
-- Ready for import into MySQL/MariaDB via phpMyAdmin
-- Compatible with MySQL 5.7+ and MariaDB 10.2+
-- ============================================================================
