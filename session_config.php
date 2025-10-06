<?php
// ============================================================
// BrightPlan Studio – Global Session Configuration (Final)
// ============================================================

// Absolute path to the shared session directory
$savePath = __DIR__ . '/sessions';
if (!is_dir($savePath)) {
    mkdir($savePath, 0755, true);
}
session_save_path($savePath);

// Shared cookie configuration
session_name('BPSSESSID');
session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/',
    'domain'   => $_SERVER['SERVER_NAME'], // applies to all sub-pages
    'secure'   => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax'
]);

// Recommended PHP settings
ini_set('session.gc_maxlifetime', 14400);
ini_set('session.use_strict_mode', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.auto_start', 0);

// Start the session once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
