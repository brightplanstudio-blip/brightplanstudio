<?php
// Safely reset sessions and restart PHP runtime
session_start();
session_destroy();

// Clear session files
$path = ini_get("session.save_path");
if ($path && is_dir($path)) {
    $files = glob("$path/sess_*");
    foreach ($files as $file) {
        @unlink($file);
    }
    echo "✅ All PHP sessions cleared from $path <br>";
} else {
    echo "⚠️ Session path not found: $path <br>";
}

// Optional: try forcing PHP restart (works on some hosts)
if (function_exists("posix_kill")) {
    $pid = getmypid();
    posix_kill($pid, 9);
    echo "🔄 PHP process killed.";
} else {
    echo "ℹ️ posix_kill not available, PHP will restart automatically on next request.";
}
?>
