<?php
// functions.php – BrightPlan Studio (final, session-safe)

// ---- SESSIONS ----
if (session_status() === PHP_SESSION_NONE) {
    $custom = __DIR__ . '/sessions';
    if (!is_dir($custom)) { @mkdir($custom, 0777, true); @chmod($custom, 0777); }

    ini_set('session.save_handler', 'files');
    ini_set('session.save_path', $custom);
    ini_set('session.gc_maxlifetime', 1800);
    ini_set('session.use_cookies', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_trans_sid', 0);
    ini_set('session.cookie_path', '/');
    ini_set('session.cookie_domain', '.brightplanstudio.com'); // ✅ allow across www + non-www
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 1 : 0);

    session_start();
}

// ---- DB ----
function db() {
    static $pdo = null;
    if ($pdo) return $pdo;

    $host = "localhost";
    $dbname = "briglwxe_brightplan_db";
    $username = "briglwxe_bps_user";
    $password = "APS06ongoing!!!";

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    return $pdo;
}

// ---- AUTH HELPERS ----
function require_login() {
    if (empty($_SESSION['user_id'])) {
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Pragma: no-cache");
        header("Location: /login.php");
        exit;
    }
}

function set_user_session(array $user) {
    $_SESSION['user_id']    = $user['id']    ?? null;
    $_SESSION['user_name']  = $user['name']  ?? '';
    $_SESSION['user_email'] = $user['email'] ?? '';
    $_SESSION['role']       = $user['role']  ?? 'essentials';
}

function logout_user() {
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time()-42000,
            $p["path"], $p["domain"], $p["secure"], $p["httponly"]
        );
    }
    session_destroy();
    header("Location: /login.php");
    exit;
}
