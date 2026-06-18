Security Recommendations — Prioritized

High priority
- Remove inline production credentials from `config.php` immediately and rotate those secrets.
  - Move DB credentials to environment variables (e.g., use `getenv('DB_*')`) and update `config.php` to read env values.
- Remove inline production credentials from `security/SecurityBootstrap.php` as well; it currently duplicates the same hard-coded DB auth.
- Remove or secure any fallback DB credentials in `pages/front_desk/attendance/mark_attendance.php`; placeholder `root` credentials are present in the file.
- Run a repository-wide secrets/static scan (gitleaks or truffleHog) to find other hard-coded secrets.
- Verify all user passwords are hashed with `password_hash()` and no plaintext passwords exist; migrate and force password resets if plaintext is found.

Elevated priority
- Harden Content Security Policy (`includes/SecurityHeaders.php`): remove `'unsafe-inline'` and `'unsafe-eval'`; adopt nonces or strict script/style hashes.
- Replace low-level SMTP implementation in `includes/EmailHelper.php` with a maintained library (PHPMailer/SwiftMailer) and configure via env-based credentials.
- Ensure session cookie flags: `Secure`, `HttpOnly`, and `SameSite=strict` where appropriate.

Medium priority
- Replace any dynamic SQL string-building with prepared statements everywhere; audit `secureQuery`/db helpers for unsafe patterns.
- Move logs outside the web root and tighten file permissions; centralize security logs and alerting.
- Limit detailed error output to logs; show generic errors to users (use `includes/SecureErrorHandler.php`).

Lower priority / operational
- Add secrets scanning to CI and pre-commit hooks.
- Add monitoring/alerting for `security_logs` and auto-block events (blocked_ips table) to notify admins.
- Add automated tests for auth flows and a small integration test for report exports.

Suggested immediate next steps
1. Run secrets scan and provide results.
2. Create a PR that replaces inline creds in `config.php` with `getenv()` usage and documents required env vars in `.env.example`.
   - A new `.env.example` file was added to document required variables.
3. Harden CSP and test the owner frontend (charts/reports) under nonce-based CSP.
   - Inline scripts must be updated to use the new `cspNonceAttr()` helper, or moved to external JS files.
4. Swap `includes/EmailHelper.php` to PHPMailer and verify SMTP delivery for password resets.

References
- Feature matrix: [REPO_FEATURES.md](REPO_FEATURES.md)
- Files of interest: [config.php](config.php), [includes/SecurityHeaders.php](includes/SecurityHeaders.php), [includes/EmailHelper.php](includes/EmailHelper.php), [security/AuthManager.php](security/AuthManager.php)

If you want, I can start by running a secrets scan now or open the PR to move credentials to env variables. Which should I do next?