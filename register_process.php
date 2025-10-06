<?php
// register_process.php – BrightPlan Studio
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header("Location: /register.php"); exit; }

$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

if (!$name || !$email || strlen($pass) < 8) { die("Invalid details. <a href='/register.php'>Back</a>"); }

$pdo = db();
$st = $pdo->prepare("SELECT id FROM users WHERE email=? LIMIT 1");
$st->execute([$email]);
if ($st->fetch()) { die("Email already registered. <a href='/login.php'>Login</a>"); }

$hash = password_hash($pass, PASSWORD_DEFAULT);
$ins  = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
$ok   = $ins->execute([$name, $email, $hash, 'essentials']);

$st = $pdo->prepare("SELECT id, name, email, role FROM users WHERE email=? LIMIT 1");
$st->execute([$email]);
$user = $st->fetch();

set_user_session($user);
header("Location: /account.php");
exit;

