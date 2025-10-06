<?php
// make_hash.php
$password = "Password123!";
$hash = password_hash($password, PASSWORD_BCRYPT);
echo "Plain: $password<br>";
echo "Hash: $hash<br>";
echo "Length: " . strlen($hash) . "<br>";
?>
