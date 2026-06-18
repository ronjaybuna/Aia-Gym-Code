Repository Feature Matrix

- Authentication: login, registration, forgot/reset password, rate-limiting, session management (see `login_handler.php`, `forgot_password_handler.php`, `security/AuthManager.php`).
- Attendance: front desk check-in/out, owner attendance overview, attendance logs, analytics (see `pages/front_desk/attendance/*`, `pages/owner/reports.php`).
- Payments: record payments, payment history, payment methods, payment charts and insights (see `pages/front_desk/membership/*`, `pages/owner/reports.php`).
- Reporting & Notifications: automated daily/weekly/monthly/yearly reports, owner notifications, export to PDF/Excel (see `pages/owner/notification_system.php`, `export_notification_pdf.php`).
- Staff Management: add/edit staff, staff activity logs, staff directory (see `pages/owner/add_staff.php`, `login_handler.php` staff integration).
- Feedback: customer feedback form, handling and email confirmations (see `pages/homepage/feedback.php`, `feedback_handler.php`).
- API & AJAX: multiple JSON endpoints and frontend fetch usage (see `pages/front_desk/get_attendance_json.php`, `pages/front_desk/membership/reports_data.php`, `pages/owner/owner.php`).
- Security: CSRF tokens, XSS headers, RateLimiter, API key/JWT support (see `includes/bootstrap.php`, `security/CsrfProtection.php`, `security/RateLimiter.php`, `security/ApiSecurity.php`).
- Email: SMTP and PHP mail support via `includes/EmailHelper.php`.
- Exports/Printing: PDF and Excel report generation (see `export_notification_pdf.php`, `export_notification_excel.php`).

Next steps:
- I can open a short recommendations file summarizing security and functional gaps and prioritized fixes. Proceed?