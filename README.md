# 🏋️ AIA Fitness Gym Management System

A comprehensive web-based management system for fitness gyms designed to streamline member management, attendance tracking, class scheduling, staff operations, and administrative tasks.

---

## 📋 Table of Contents

1. [System Overview](#system-overview)
2. [Architecture](#architecture)
3. [System Features](#system-features)
4. [Prerequisites & Requirements](#prerequisites--requirements)
5. [Installation Guide](#installation-guide)
6. [Configuration](#configuration)
7. [User Roles & Workflows](#user-roles--workflows)
8. [Step-by-Step Usage Process](#step-by-step-usage-process)
9. [Security Features](#security-features)
10. [Database Setup](#database-setup)
11. **[🚨 TROUBLESHOOTING](QUICK_FIX_GUIDE.md)** ← **START HERE IF HAVING ISSUES**
12. [Technology Stack](#technology-stack)
13. [Support & Contact](#support--contact)

---

## 🆘 **HAVING ISSUES?**

✅ **Quick Fix Guide**: [QUICK_FIX_GUIDE.md](QUICK_FIX_GUIDE.md) - Fastest solutions  
✅ **System Diagnostics**: [system_diagnostics.php](system_diagnostics.php) - Run full health check  
✅ **Detailed Guides**: See [Troubleshooting Section](#-troubleshooting) below

---

## 🎯 System Overview

The **AIA Fitness Gym Management System** is a complete business management solution built specifically for fitness facilities. It provides:

- **Member Management**: Registration, approval, and membership tracking
- **Attendance System**: Real-time check-in/check-out functionality
- **Payment Processing**: Track membership payments and billing
- **Class Scheduling**: Manage fitness classes and trainers
- **Staff Operations**: Employee management and task assignment
- **Customer Support**: Ticketing system for member inquiries
- **Admin Dashboard**: Comprehensive reporting and analytics
- **Responsive Design**: Works seamlessly on desktop, tablet, and mobile devices

---

## 🏗️ Architecture

### System Layers

```
┌─────────────────────────────────────────────────────────────┐
│          PRESENTATION LAYER (User Interfaces)              │
│  Login Portal | Front Desk | Owner Dashboard | Website     │
└─────────────────────────────────────────────────────────────┘
                            ↓
┌─────────────────────────────────────────────────────────────┐
│       BUSINESS LOGIC LAYER (Core Services)                 │
│  • Authentication & Authorization                           │
│  • Membership Management                                    │
│  • Attendance Tracking                                      │
│  • Payment Processing                                       │
│  • Class Scheduling                                         │
│  • Reporting & Analytics                                    │
└─────────────────────────────────────────────────────────────┘
                            ↓
┌─────────────────────────────────────────────────────────────┐
│       DATA ACCESS LAYER (Database Operations)              │
│  • Secure Connection Management                             │
│  • Prepared Statements & Query Execution                    │
│  • Transaction Management                                   │
└─────────────────────────────────────────────────────────────┘
                            ↓
┌─────────────────────────────────────────────────────────────┐
│            DATABASE LAYER (MySQL/MariaDB)                  │
│  • 36 Tables with proper relationships                      │
│  • Indexes for optimal performance                          │
│  • Triggers for data synchronization                        │
└─────────────────────────────────────────────────────────────┘
```

### Key Modules

```
📁 pages/
├── 📂 front_desk/              # Front Desk Operations
│   ├── attendance/             # Check-in/Check-out
│   ├── membership/             # Member management
│   ├── profile/                # Staff profiles
│   └── support/                # Customer support
│
├── 📂 owner/                   # Owner/Admin Features
│   ├── reports/                # Business analytics
│   ├── staff/                  # Employee management
│   └── settings/               # System configuration
│
└── 📂 homepage/                # Public-facing Website
    ├── About & Services
    ├── Pricing & Plans
    ├── Schedule & Classes
    └── Contact & Feedback
```

---

## ✨ System Features

### For Members (Public Access)
- ✅ User Registration & Account Creation
- ✅ View Gym Information, Facilities & Classes
- ✅ Check Membership Plans & Pricing
- ✅ View Trainer Profiles
- ✅ Browse Photo Gallery
- ✅ Contact Gym via Inquiry Form
- ✅ Password Recovery

### For Front Desk Staff
- ✅ Process Member Check-in/Check-out
- ✅ Register & Approve New Members
- ✅ Process Membership Payments
- ✅ View & Manage Attendance History
- ✅ Handle Member Support Tickets
- ✅ Generate Membership Reports
- ✅ Manage Pending Applications

### For Owners/Administrators
- ✅ Complete Business Dashboard
- ✅ Revenue & Financial Reports
- ✅ Member Analytics & Statistics
- ✅ Staff Management & Scheduling
- ✅ Gym Settings & Configuration
- ✅ Access Control & Permissions
- ✅ Member & Payment History
- ✅ Promotional Campaign Management

### Security Features
- ✅ CSRF Protection
- ✅ XSS Prevention
- ✅ SQL Injection Protection
- ✅ Rate Limiting & Brute-Force Protection
- ✅ Secure Password Hashing (Argon2ID)
- ✅ Session Management & Fixation Prevention
- ✅ Input Validation & Sanitization
- ✅ Security Headers Implementation

---

## 📦 Prerequisites & Requirements

### Server Requirements
- **Web Server**: Apache 2.4+ with mod_rewrite enabled
- **PHP Version**: 7.4+ (Recommended: 8.1+)
- **Database**: MySQL 5.7+ or MariaDB 10.3+
- **Memory**: Minimum 512MB (recommended 1GB+)
- **Disk Space**: Minimum 500MB

### Local Development Requirements
- **Software**:
  - XAMPP 7.4+ (or AMP stack equivalent)
  - PHP with MySQLi extension
  - Apache Web Server
  - MySQL/MariaDB

- **Browser Support**:
  - Chrome 90+
  - Firefox 88+
  - Safari 14+
  - Edge 90+

### Additional Requirements
- PHP Extensions:
  - `mysqli` (for database connection)
  - `json` (for data handling)
  - `gd` (for image processing)
  - `openssl` (for encryption)

---

## 🚀 Installation Guide

### Step 1: Prerequisites Installation

#### For Windows (XAMPP):

1. **Download XAMPP**
   - Visit https://www.apachefriends.org/
   - Download XAMPP for Windows (PHP 7.4+ recommended)

2. **Install XAMPP**
   - Run the installer
   - Choose installation directory (e.g., `C:\xampp`)
   - Install Apache and MySQL components

3. **Start Services**
   - Open XAMPP Control Panel
   - Click "Start" next to Apache
   - Click "Start" next to MySQL

#### For macOS/Linux:
```bash
# Install via package manager or download from official sites
# MAC (Homebrew)
brew install apache httpd mysql

# Linux (Ubuntu/Debian)
sudo apt-get install apache2 mysql-server php
```

---

### Step 2: Download & Setup Project

1. **Clone/Download the Project**
   ```bash
   # Place the gym system in htdocs
   # Windows XAMPP: C:\xampp\htdocs\gym System\
   # or
   # Linux/Mac: /var/www/html/gym-system/
   ```

2. **Verify Project Structure**
   ```
   gym System/
   ├── config.php
   ├── index.php
   ├── login_handler.php
   ├── pages/
   ├── security/
   ├── includes/
   ├── assets/
   └── sql/
   ```

3. **Set Folder Permissions**
   ```bash
   # Linux/Mac
   chmod -R 755 /path/to/gym\ System
   chmod -R 777 /path/to/gym\ System/logs
   ```

---

### Step 3: Database Setup

1. **Open phpMyAdmin**
   - Navigate to: http://localhost/phpmyadmin
   - Log in (default: username=`root`, password=empty)

2. **Create Database**
   - Click "New" in left panel
   - Database name: `gym_mgmt`
   - Collation: `utf8mb4_unicode_ci`
   - Click "Create"

3. **Import Database Structure**
   - Select the `gym_mgmt` database
   - Go to "Import" tab
   - Choose file: `sql/gym_mgmt.sql`
   - Click "Import"

4. **Verify Tables**
   - You should see 36 tables created successfully
   - Tables include: clients, staff, attendance, payments, etc.

---

### Step 4: Configure System

1. **Update config.php** (if needed)
   ```php
   // File: config.php
   
   // For local development:
   $host = 'localhost';
   $db   = 'gym_mgmt';
   $user = 'root';
   $pass = '';
   
   // For production with custom credentials:
   $host = 'your_server_address';
   $db   = 'your_database_name';
   $user = 'your_username';
   $pass = 'your_password';
   ```

2. **Security Configuration**
   - Check `security/SecurityConfig.php`
   - Ensure all encryption keys are set
   - Configure rate limiting thresholds if needed

3. **Set Timezone**
   - Default: Asia/Manila (Philippines time)
   - Modify in `config.php` if needed:
   ```php
   date_default_timezone_set('Asia/Manila');
   ```

---

### Step 5: Verify Installation

1. **Access the System**
   - Open browser
   - Navigate to: `http://localhost/gym System/`

2. **See Homepage**
   - Should display the public gym website
   - Check all elements load correctly

3. **Test Database Connection**
   - Homepage should load without errors
   - Database queries working if content displays

---

## ⚙️ Configuration

### Essential Configuration Files

#### 1. **config.php** - Database & Core Settings
```php
// Database connection
$host = 'localhost';
$db   = 'gym_mgmt';
$user = 'root';
$pass = '';

// Timezone (PHP)
date_default_timezone_set('Asia/Manila');

// MySQL Timezone
$conn->query("SET time_zone = '+08:00'");
```

#### 2. **security/SecurityConfig.php** - Security Settings
```php
// Password policies
define('MIN_PASSWORD_LENGTH', 8);
define('PASSWORD_REQUIRE_UPPERCASE', true);
define('PASSWORD_REQUIRE_NUMBERS', true);

// Session security
define('SESSION_LIFETIME', 3600); // 1 hour

// Rate limiting
define('LOGIN_MAX_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900); // 15 minutes
```

#### 3. **includes/EmailHelper.php** - Email Configuration
```php
// SMTP Settings for email notifications
$emailConfig = [
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'username' => 'your_email@gmail.com',
    'password' => 'your_app_password',
    'from_address' => 'noreply@aiafitnessgyp.com'
];
```

---

## 👥 User Roles & Workflows

### 1. **Anonymous User** (Public Access)
**Access Level**: Can browse website only
- No database modifications
- View: Homepage, Services, Pricing, Schedule

**Available Actions**:
- 📄 View gym information and facilities
- 📋 View membership plans and pricing
- 👨 View trainer profiles and availability
- 📷 Browse photo gallery
- 📧 Send inquiry/feedback form
- 🔐 Register for membership
- 🔑 Login if already registered

---

### 2. **Member** (Registered User)
**Access Level**: Personal dashboard access
- Can only view own data
- Check-in/check-out operations

**Available Actions**:
- 👤 View personal profile & membership status
- 📊 View attendance history (personal)
- 📅 View class schedules
- 📱 Track membership expiry date
- 🔑 Update password

**Workflow**:
```
Register on website
    ↓
Wait for admin approval
    ↓
Receive approval confirmation
    ↓
Login to member dashboard
    ↓
View profile & membership
    ↓
Check-in at gym (front desk)
    ↓
Check-out when leaving
```

---

### 3. **Front Desk Staff**
**Access Level**: Full module access
- Can modify member data
- Record payments and attendance
- Process new applications

**Available Actions**:
- ✅ Approve/Deny pending member applications
- 👤 Register new members manually
- 💳 Record member payments
- ⏱️ Process attendance (check-in/check-out)
- 📋 View member details and history
- 🎫 Generate membership reports
- 🎟️ Manage membership status
- 📞 Handle customer support tickets
- 📊 View attendance reports

**Workflow**:
```
Start shift
    ↓
Member arrives at gym
    ↓
Search member in system
    ↓
Click "Check-In" button
    ↓
Time-in recorded with timestamp
    ↓
Member uses gym facilities
    ↓
Member returns to desk
    ↓
Click "Check-Out" button
    ↓
Time-out recorded
    ↓
Daily attendance logged
```

---

### 4. **Owner/Administrator**
**Access Level**: Complete system access
- Full data modification capability
- System configuration access
- All report generation

**Available Actions**:
- 📊 View comprehensive business dashboard
- 💰 Generate financial & revenue reports
- 📈 View member analytics & statistics
- 👨‍💼 Manage staff and assign roles
- ⚙️ Configure gym settings
- 🔐 Manage user permissions
- 🔍 View audit logs
- 📧 Manage promotional campaigns
- 🗑️ Archive/Delete data

**Workflow**:
```
Login to admin dashboard
    ↓
View key metrics
    ↓
Analyze revenue & members
    ↓
Generate monthly reports
    ↓
Review pending approvals
    ↓
Manage staff assignments
    ↓
Configure system settings
    ↓
Monitor security logs
```

---

## 📖 Step-by-Step Usage Process

### **Process 1: New Member Registration**

#### Flow:
```
1. Anonymous User → Website Homepage
2. Click "Register / Join Us" Button
3. Fill Registration Form:
   - Personal Info (Name, Age, Contact)
   - Email Address
   - Password
   - Membership Plan Selection
4. Submit Form
5. Data saved to "pending_clients" table
6. Confirmation message displayed
7. Front Desk notified of new application
```

#### Detailed Steps:

**Step 1: Access Registration Page**
- Open http://localhost/gym System/
- Click "Register" or "Join Us" button
- `pages/homepage/join_handler.php` processes the form

**Step 2: Fill Member Information**
```
Required Information:
├── Family Name
├── Given Name
├── Email Address
├── Contact Number
├── Date of Birth
└── Membership Plan (Basic/Premium/VIP)
```

**Step 3: System Processing**
- Form validates all required fields
- Data sanitized to prevent SQL injection
- Member record created in `pending_clients` table
- Email confirmation sent to member

**Step 4: Front Desk Approval**
- Front desk staff logs in
- Navigation → Membership → Pending Clients
- Reviews application details
- Clicks "Approve" or "Decline" button

**Step 5: System Updates**
- If Approved: Data moved to `clients` table
- Member status set to "Active"
- Expiry date calculated (based on plan)
- Member receives approval notification
- Link provided to set/reset password

**Step 6: Member Activation**
- Member receives email with login credentials
- Logs in with email and password
- Access to member dashboard granted
- Can start using gym facilities

---

### **Process 2: Member Check-In/Check-Out**

#### Flow:
```
1. Member Arrives at Gym
2. Approaches Front Desk
3. Staff Opens Front Desk System
4. Search Member by:
   - Name
   - ID Number
   - Contact Number
5. Click "Check-In" Button
6. System Records:
   - Member ID
   - Check-In Time (timestamp)
   - Date
7. Member enters gym floor
...
8. Member Returns to Desk
9. Staff Clicks "Check-Out" Button
10. System Records:
    - Member ID
    - Check-Out Time (timestamp)
11. Attendance Record Complete
```

#### Step-by-Step:

**Step 1: Open Front Desk System**
- Staff logs in with username/password
- Dashboard → Attendance Module
- URL: `pages/front_desk/attendance/attendance_tracking.php`

**Step 2: Search for Member**
```
Search Options:
├── Search by Member Name
├── Search by ID Number
├── Search by Contact Number
└── Quick ID Scan (if barcode enabled)
```

**Step 3: Check-In Process**
- Select member from search results
- Click "Check-In" button
- Confirm action
- System displays:
  - ✅ Check-in successful
  - Current time: 06:30 AM
  - Member name
  - Membership status

**Step 4: Usage Period**
- Member uses gym facilities
- Time tracked in background

**Step 5: Check-Out Process**
- Member returns to desk
- Staff searches member again
- Clicks "Check-Out" button
- System records:
  - Check-out time: 07:30 AM
  - Duration: 1 hour
  - Attendance logged

**Step 6: Attendance Record Created**
```
attendance table entry:
├── member_id: 101
├── date: 2026-04-09
├── time_in: 06:30:00
├── time_out: 07:30:00
├── duration: 60 minutes
└── recorded_by: Staff Username
```

---

### **Process 3: Payment Processing**

#### Flow:
```
1. Staff Selects Member
2. Click "View Payments" / "Add Payment"
3. Enter Payment Details:
   - Amount
   - Payment Method (Cash/Card/Bank)
   - Reference Number
4. Select Membership Package
5. Confirm Payment
6. System Updates:
   - Payment recorded
   - Membership renewed
   - Expiry date extended
7. Receipt generated
8. Payment logged in reports
```

#### Step-by-Step:

**Step 1: Access Payment Module**
- Log in to Front Desk
- Click "Membership" → "Payments"
- URL: `pages/front_desk/membership/payments.php`

**Step 2: Search Member**
- Enter member ID or name
- Click "Search"
- System displays member profile:
  - Name
  - Current membership status
  - Expiry date
  - Payment history

**Step 3: Add New Payment**
- Click "Add Payment" button
- Form displays with fields:
  ```
  Payment Form:
  ├── Payment Date
  ├── Amount (auto-filled based on plan)
  ├── Payment Method (Cash/Card/Check/Bank Transfer)
  ├── Payment Reference (optional receipt #)
  ├── Membership Type (Basic/Premium/VIP)
  └── Notes (optional)
  ```

**Step 4: Confirm Details**
- Review all information
- Click "Process Payment"
- System validates amount matches membership plan

**Step 5: Payment Recording**
- Data inserted into `payments` table
- Membership renewed/extended
- New expiry date calculated
- Receipt generated

**Step 6: Confirmation**
- Payment confirmed message displayed
- Receipt available for printing
- Member record updated automatically
- Payment logged in financial reports

---

### **Process 4: Generating Reports**

#### Types of Reports Available:

1. **Membership Reports**
   - Total active members
   - Members by membership type
   - Expiring soon (30-60 days)
   - Expired members

2. **Financial/Payment Reports**
   - Daily/Weekly/Monthly revenue
   - Revenue by membership type
   - Outstanding payments
   - Payment method breakdown

3. **Attendance Reports**
   - Daily check-ins
   - Peak hours analysis
   - Member attendance frequency
   - Inactive members (no check-in for X days)

#### Step-by-Step Report Generation:

**Step 1: Access Reports Module**
- Admin/Owner Login
- Dashboard → Reports
- URL: `pages/front_desk/membership/reports.php`

**Step 2: Select Report Type**
- Choose from dropdown:
  - Membership Report
  - Payment Report
  - Attendance Report
  - Revenue Report

**Step 3: Set Date Range**
```
Date Filter Options:
├── From Date: [Calendar]
├── To Date: [Calendar]
├── Preset Options:
│   ├── Today
│   ├── This Week
│   ├── This Month
│   ├── This Year
│   └── Custom Range
└── Apply Filter
```

**Step 4: Additional Filters**
- Select membership type (if applicable)
- Select payment method (if applicable)
- Sort by (Name/Date/Amount)

**Step 5: Generate Report**
- Click "Generate Report"
- System queries database
- Results displayed in table format

**Step 6: Export Options**
- 📊 View as table
- 📥 Download as CSV
- 📄 Download as PDF
- 🖨️ Print report

---

### **Process 5: Member Profile Management**

#### Staff Profile Updates:

**Step 1: Access Profile Module**
- URL: `pages/front_desk/profile/profile.php`
- Shows staff/employee profiles

**Step 2: View/Edit Profile**
- Click on staff member
- Edit available fields:
  ```
  Editable Fields:
  ├── Contact Number
  ├── Email Address
  ├── Department
  ├── Position
  ├── Shift Timing
  ├── Emergency Contact
  └── Profile Photo
  ```

**Step 3: Save Changes**
- Click "Update Profile"
- System validates data
- Changes saved to `staff` table
- Confirmation message displayed

#### Member Profile (Member Dashboard):

**Step 1: Member Login**
- Navigate to login page
- Enter email and password
- Redirected to member dashboard

**Step 2: View Profile**
- Click "My Profile" or "Account"
- Display shows:
  ```
  Member Info:
  ├── Full Name
  ├── Email Address
  ├── Contact Number
  ├── Date of Birth
  ├── Member ID
  ├── Membership Type
  ├── Status (Active/Expired)
  ├── Join Date
  ├── Expiry Date
  └── Recently Visited
  ```

**Step 3: Update Personal Information**
- Click "Edit Profile"
- Update allowed fields:
  - Email address
  - Contact number
  - Emergency contact
  - Password

**Step 4: Change Password**
- Click "Change Password"
- Enter current password
- Enter new password (must meet requirements)
- Confirm new password
- Click "Update"

---

### **Process 6: Customer Support Ticket System**

#### Creating a Support Ticket:

**Step 1: Access Support Module**
- Front Desk: Click "Support" → "Support Tickets"
- URL: `pages/front_desk/support/support_tickets.php`

**Step 2: Create New Ticket**
- Click "Create New Ticket" button
- Form fields:
  ```
  Support Ticket Form:
  ├── Member/Client Selection
  ├── Subject (Issue title)
  ├── Category:
  │   ├── Membership Issue
  │   ├── Payment Problem
  │   ├── Equipment Complaint
  │   ├── Class Inquiry
  │   └── General
  ├── Priority:
  │   ├── High
  │   ├── Medium
  │   └── Low
  ├── Description (detailed issue)
  └── Attachments (optional)
  ```

**Step 3: Submit Ticket**
- Click "Submit"
- Ticket number generated automatically
- Ticket saved to database
- Confirmation email sent to member

**Step 4: Track Status**
- View all tickets in dashboard
- Status options:
  - 🟡 Open (waiting response)
  - 🟢 In Progress (being handled)
  - 🔵 Pending Member (awaiting member info)
  - ✅ Resolved (closed)
  - ❌ Closed (no resolution)

**Step 5: Update Ticket**
- Click on ticket
- Add notes/comments
- Update status if needed
- Update priority if needed
- Assign to staff member if needed

---

## 🔒 Security Features

### Implemented Protection Layers

#### 1. **Authentication & Authorization**
✅ **Features**:
- Session-based user authentication
- Secure password hashing (Argon2ID algorithm)
- Password strength validation
  - Minimum 8 characters
  - Must contain uppercase letters
  - Must contain numbers
  - Special characters recommended
- Role-based access control (RBAC)
- Session regeneration on privilege escalation
- Session timeout (default: 1 hour)

✅ **Rate Limiting**:
- Maximum 5 login attempts
- 15-minute lockout after failed attempts
- IP-based blocking for repeated violations

#### 2. **Input Security**
✅ **Implemented**:
- All user inputs validated and sanitized
- Whitelist validation for form fields
- Context-aware sanitization
- File upload validation (type, size, content)
- Regular expression patterns for email, phone, etc.

#### 3. **SQL Injection Prevention**
✅ **Methods**:
- Prepared statements for ALL database queries
- Parameterized queries with bound parameters
- Never concatenate user input into SQL
- Database connection hardening

#### 4. **XSS (Cross-Site Scripting) Prevention**
✅ **Protection**:
- Output escaping for all user data
- HTML entities encoding
- Content Security Policy headers
- JavaScript sanitization

#### 5. **CSRF (Cross-Site Request Forgery)**
✅ **Protection**:
- CSRF tokens on all forms
- Token validation on every state-changing request
- Double-submit cookie pattern
- SameSite cookie attributes

#### 6. **Security Headers**
✅ **Implemented**:
```
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
Strict-Transport-Security: max-age=31536000
Content-Security-Policy: [restrictive policy]
```

#### 7. **Additional Security**
✅ **Features**:
- HTTPS enforcement for production
- Secure session cookies (HTTPOnly, Secure flags)
- Password reset tokens with expiration
- Audit logging for critical operations
- Error handling without information disclosure
- Database error suppression on production

---

## 🗄️ Database Setup

### Database Schema Overview

#### Core Tables:

1. **clients** (Members)
   - id_number (Primary Key)
   - family_name, given_name
   - email, contact_number
   - birthday
   - membership_availed
   - membership_status
   - activation_date, expiry_date
   - sales_person

2. **staff** (Employees)
   - staff_id (Primary Key)
   - username, password_hash
   - role (admin, desk, trainer, etc.)
   - email, contact_number
   - department
   - shift_start, shift_end

3. **attendance** (Check-in/Check-out)
   - attendance_id (Primary Key)
   - member_id (FK)
   - date
   - time_in, time_out
   - duration_minutes
   - recorded_by

4. **payments** (Transactions)
   - payment_id (Primary Key)
   - member_id (FK)
   - amount
   - payment_date
   - payment_method
   - membership_type
   - reference_number

5. **pending_clients** (New Applications)
   - id (Primary Key)
   - family_name, given_name
   - email, contact_number
   - membership_availed
   - membership_rate
   - entry_date
   - status

### Database Import

**Method 1: phpMyAdmin**
```
1. Open http://localhost/phpmyadmin
2. Create database: gym_mgmt
3. Go to Import tab
4. Select: sql/gym_mgmt.sql
5. Click Import
```

**Method 2: Command Line (MySQL)**
```bash
mysql -u root -p < /path/to/gym_mgmt.sql
# Enter password when prompted (empty for local)
```

**Method 3: Command Line (MariaDB)**
```bash
mariadb -u root -p < /path/to/gym_mgmt.sql
```

### Verification

**Check Tables Created**:
```sql
USE gym_mgmt;
SHOW TABLES;
```

**Should see 36 tables including**:
- clients
- staff
- attendance
- payments
- pending_clients
- support_tickets
- And more...

---

## 🐛 Troubleshooting

### Quick Diagnostic Tools

**Access Complete Diagnostics:**
- Visit: `http://localhost/gym System/system_diagnostics.php`
- Runs complete system health check
- Shows exact errors and solutions

**Detailed Troubleshooting Guides:**
- [Connection Failures](TROUBLESHOOTING_CONNECTION.md) - Complete database connection fixes
- [Blank Pages & White Screen](TROUBLESHOOTING_BLANK_PAGES.md) - PHP errors and debugging
- [Login Problems](TROUBLESHOOTING_LOGIN.md) - Authentication and session issues
- [Attendance & Payment Issues](TROUBLESHOOTING_ATTENDANCE_PAYMENT.md) - Recording and calculation problems
- [Responsive Design Issues](TROUBLESHOOTING_RESPONSIVE_DESIGN.md) - Mobile and tablet fixes

---

### Issue 1: "Connection failed" Error

**Symptoms**:
- Page shows "Database connection failed"
- Error: `Connection failed: Unknown database 'gym_mgmt'`
- PHP Fatal Error

**INSTANT FIX - 3 Steps**:
```
STEP 1: Start MySQL
├─ XAMPP Control Panel → Click "Start" next to MySQL
└─ Wait for "Running" status indicator

STEP 2: Verify Database  
├─ Open http://localhost/phpmyadmin
├─ Check if "gym_mgmt" database exists
└─ If not, create: New → Database name → Create

STEP 3: Import SQL
├─ Select gym_mgmt database
├─ Import tab → Choose sql/gym_mgmt.sql
└─ Click "Import"
```

**Then Refresh Your Browser** - Connection should work now!

**For detailed solutions, see:** [TROUBLESHOOTING_CONNECTION.md](TROUBLESHOOTING_CONNECTION.md)

---

### Issue 2: Blank White Page

**Symptoms**:
- Browser shows completely blank page
- No content or error message
- Works in other browser sometimes

**INSTANT FIX - Enable Error Display**:

Add this to the TOP of any blank page:
```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Rest of code...
?>
```

**Then refresh** - Now you'll see the actual error!

**Common Blank Page Causes:**
- ❌ Missing include file → Shows: "Failed to open stream"
- ❌ PHP syntax error → Shows: "Parse error"
- ❌ Fatal error → Shows: "Call to undefined function"
- ❌ Database connection failed → Shows: Connection error

**For detailed solutions, see:** [TROUBLESHOOTING_BLANK_PAGES.md](TROUBLESHOOTING_BLANK_PAGES.md)

---

### Issue 3: Login Not Working

**Symptoms**:
- Cannot log in even with correct credentials
- "Invalid credentials" message
- Works on desktop, not on mobile
- Gets stuck on login page

**INSTANT FIX - Test With Diagnostics**:

**Step 1:** Check if staff table has users
```sql
SELECT * FROM staff;
-- Should show at least one admin user
```

**Step 2:** If no users, create one
```php
<?php
// Create proper hash
$hash = password_hash('admin123', PASSWORD_ARGON2ID);
echo "Hash: " . $hash;
// Copy hash and use in SQL below
?>
```

Then run:
```sql
INSERT INTO staff (username, password_hash, role, email) 
VALUES ('admin', 'paste_hash_here', 'admin', 'admin@gym.com');
```

**Step 3:** Try login again

**Common Login Issues Solved:**
- ✅ Wrong password hash → Use PASSWORD_ARGON2ID
- ✅ Session not starting → Check php.ini session.save_path
- ✅ Cookies blocked → Check browser privacy settings
- ✅ Redirect loop → Verify logic in login_handler.php

**For detailed solutions, see:** [TROUBLESHOOTING_LOGIN.md](TROUBLESHOOTING_LOGIN.md)

---

### Issue 4: Attendance Not Recording

**Symptoms**:
- Check-in/Check-out button clicked but nothing happens
- No confirmation message
- Attendance table empty
- Times show as incorrect

**INSTANT FIX - Check Three Things**:

**1. Verify Time Zones Match:**
```sql
-- Check MySQL timezone
SELECT @@global.time_zone, NOW();

-- Check PHP timezone in config.php should be:
date_default_timezone_set('Asia/Manila');
$conn->query("SET time_zone = '+08:00'");
```

**2. Verify Member Exists:**
```sql
SELECT id, family_name, given_name FROM clients LIMIT 5;
-- If empty, no members to check-in
```

**3. Check Attendance Table:**
```sql
DESCRIBE attendance;
-- Should have: id, client_id, check_in_time, check_out_time, attendance_date
```

**Enable Logging to Debug:**
```php
<?php
// Add this to attendance function
$logFile = __DIR__ . '/logs/attendance.log';
file_put_contents($logFile, "Check-in attempted for member: " . $memberId . "\n", FILE_APPEND);
// Then check /logs/attendance.log
?>
```

**For detailed solutions, see:** [TROUBLESHOOTING_ATTENDANCE_PAYMENT.md](TROUBLESHOOTING_ATTENDANCE_PAYMENT.md)

---

### Issue 5: Payment Not Processing

**Symptoms**:
- Payment form submits but no record created
- Member expiry not extended after payment
- Wrong amount calculated
- "Amount" field saves as 0

**INSTANT FIX - Enable Payment Logging**:

Check the payment log:
```
File: /logs/payment.log
Look for entries like:
  ✓ Payment inserted successfully
  ✗ FAILED: Member not found
```

**Quick Verification:**

**1. Check payment_history table:**
```sql
DESCRIBE payment_history;
-- Should have: id, member_id, amount, payment_date, notes
```

**2. Verify member exists:**
```sql
SELECT id, family_name, membership_status FROM clients WHERE id = 1;
```

**3. Test payment insertion:**
```sql
INSERT INTO payment_history (member_id, amount, payment_method, payment_date) 
VALUES (1, 999.00, 'Cash', NOW());

-- Then check it exists:
SELECT * FROM payment_history ORDER BY id DESC LIMIT 1;
```

**4. Update member expiry after payment:**
```sql
UPDATE clients 
SET expiry_date = DATE_ADD(CURDATE(), INTERVAL 30 DAY)
WHERE id = 1;
```

**For detailed solutions, see:** [TROUBLESHOOTING_ATTENDANCE_PAYMENT.md](TROUBLESHOOTING_ATTENDANCE_PAYMENT.md)

---

### Issue 6: Responsive Design Not Working

**Symptoms**:
- Mobile view shows desktop layout
- Text too small to read
- Can't tap buttons
- Horizontal scrolling on phone
- CSS not loading on mobile

**INSTANT FIX - Add Viewport Tag**:

Ensure this line exists in page `<head>`:
```html
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ↑ This is REQUIRED for mobile responsiveness -->
</head>
```

**Test Responsiveness:**

**Method 1 - Browser DevTools:**
```
1. Press F12
2. Click device icon (top-left of DevTools)
3. Select "iPhone" or "Mobile"
4. Page should adapt
```

**Method 2 - Check CSS Loads:**
```
1. Press F12 → Network tab
2. Refresh page
3. Look for mobile-responsive.css
4. Should show 200 status (not 404)
```

**Common Mobile Issues Fixed:**
- ✅ Fixed width container → Use: `max-width: 100%`
- ✅ No margin on mobile → CSS: `padding: 0 16px`
- ✅ Buttons hard to tap → Size: min 44px × 44px
- ✅ Font too small → Base: 16px (not 12px)
- ✅ Images overflow → CSS: `max-width: 100%`

**For detailed solutions, see:** [TROUBLESHOOTING_RESPONSIVE_DESIGN.md](TROUBLESHOOTING_RESPONSIVE_DESIGN.md)

---

## Where to Get Help

| Issue | Location |
|-------|----------|
| 🔍 Full system check | [system_diagnostics.php](system_diagnostics.php) |
| 🗄️ Database problems | [TROUBLESHOOTING_CONNECTION.md](TROUBLESHOOTING_CONNECTION.md) |
| ⚪ Blank pages | [TROUBLESHOOTING_BLANK_PAGES.md](TROUBLESHOOTING_BLANK_PAGES.md) |
| 🔐 Login failed | [TROUBLESHOOTING_LOGIN.md](TROUBLESHOOTING_LOGIN.md) |
| ⏱️ Attendance/Payment | [TROUBLESHOOTING_ATTENDANCE_PAYMENT.md](TROUBLESHOOTING_ATTENDANCE_PAYMENT.md) |
| 📱 Mobile issues | [TROUBLESHOOTING_RESPONSIVE_DESIGN.md](TROUBLESHOOTING_RESPONSIVE_DESIGN.md) |
| 📊 Error logs | `/logs/` folder |

---

## 🏗️ Technology Stack

### Backend Technologies
- **Language**: PHP 7.4+ (Recommended 8.1+)
- **Database**: MySQL 5.7+ / MariaDB 10.3+
- **Architecture**: MVC-based (Model-View-Controller)
- **Security**: Argon2ID password hashing, OWASP practices

### Frontend Technologies
- **Markup**: HTML5
- **Styling**: CSS3 (mobile-responsive)
- **Scripting**: JavaScript (ES6+)
- **Responsive**: Mobile-first design
- **Compatibility**: All modern browsers

### Server Requirements
- **Web Server**: Apache 2.4+ with mod_rewrite
- **Protocol**: HTTP/HTTPS
- **Execution**: Server-side PHP rendering

### Development Tools
- **Local Environment**: XAMPP
- **Database Tool**: phpMyAdmin
- **Version Control**: Git (recommended)
- **Testing**: Browser DevTools

---

## 📞 Support & Contact

### System Documentation
- 📄 **System Architecture**: `Compile system md/SYSTEM_ARCHITECTURE.md`
- 🔒 **Security Guide**: `security/SECURITY_IMPLEMENTATION_GUIDE.md`
- 📋 **API Reference**: `security/QUICK_REFERENCE.md`
- 🛣️ **Roadmap**: `Compile system md/ROAD MAP.md`
- ✅ **Status**: `Compile system md/SYSTEM_STATUS.md`

### Quick Links
- **Admin Login**: http://localhost/gym System/admin.php
- **Member Login**: http://localhost/gym System/index.php
- **phpMyAdmin**: http://localhost/phpmyadmin
- **Front Desk Portal**: http://localhost/gym System/portal.php

### Common Issues Documentation
- 📖 See **Troubleshooting** section above
- 🔍 Check logs in: `/logs/` folder
- 📝 Review: `security/README.md`

### Getting Help
1. Check existing documentation in `/Compile system md/`
2. Review security guidelines in `/security/`
3. Check system logs for error messages
4. Verify database connection is working
5. Clear browser cache and try again

---

## 📝 License & Version

**System**: AIA Fitness Gym Management System  
**Version**: 1.0.0  
**Last Updated**: April 2026  
**Status**: ✅ Fully Functional

---

## ✨ Key Highlights

✅ **Complete Solution**: All-in-one gym management platform  
✅ **Secure**: Enterprise-grade security implementation  
✅ **User-Friendly**: Intuitive interfaces for all user levels  
✅ **Responsive**: Works perfectly on all devices  
✅ **Scalable**: Ready for growing gym operations  
✅ **Well-Documented**: Comprehensive guides and documentation  
✅ **Maintainable**: Clean code structure and organization  
✅ **Production-Ready**: Suitable for live deployment  

---

**Thank you for using AIA Fitness Gym Management System!** 🏋️💪

For any questions or issues, refer to the documentation or contact system administrator.

