<?php
// session_test.php – BrightPlan Studio
// Purpose: Verify if PHP sessions are persisting

// Start session
session_start();

// Increment a counter in session
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 1;
} else {
    $_SESSION['counter']++;
}

// Output results
echo "<h2>BrightPlan Studio – Session Test</h2>";
echo "<p>Counter value: " . $_SESSION['counter'] . "</p>";
echo "<p>Session save path: " . session_save_path() . "</p>";
echo "<p>Session ID: " . session_id() . "</p>";

// Helpful guidance
if ($_SESSION['counter'] === 1) {
    echo "<p style='color:red;'>⚠️ Session did not persist. Refresh the page – if it always shows 1, sessions are not being saved.</p>";
} else {
    echo "<p style='color:green;'>✅ Session persisted correctly. Refreshing increments the counter.</p>";
}
?>
