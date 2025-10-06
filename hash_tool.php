<?php
// hash_tool.php – temporary password hash generator
// ⚠️ Delete this file once you've finished updating your users

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['pwd'])) {
    $pwd = $_POST['pwd'];
    $hash = password_hash($pwd, PASSWORD_BCRYPT);
    echo "<h2>Generated Hash</h2>";
    echo "<p><strong>Plain:</strong> " . htmlentities($pwd) . "</p>";
    echo "<p><strong>Hash:</strong> " . htmlentities($hash) . "</p>";
    echo "<p><strong>Length:</strong> " . strlen($hash) . "</p>";
    echo "<hr><a href='hash_tool.php'>Generate another</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Hash Tool</title>
</head>
<body style="font-family:Arial; max-width:600px; margin:40px auto;">
  <h1>Password Hash Generator</h1>
  <form method="post">
    <label>Enter a password to hash:</label><br>
    <input type="text" name="pwd" style="width:100%;padding:8px;margin:10px 0;">
    <button type="submit" style="padding:10px 20px;">Generate Hash</button>
  </form>
</body>
</html>
