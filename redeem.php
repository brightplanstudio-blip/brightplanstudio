<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/functions.php';
require_login();

$pdo = db();
$code = trim($_POST['code'] ?? $_GET['code'] ?? '');

if ($code === '') {
    $_SESSION['redeem_message'] = "No code provided.";
    header("Location: account.php"); exit;
}

$st = $pdo->prepare("SELECT id, role, uses, max_uses, status FROM invite_codes WHERE code=? LIMIT 1");
$st->execute([$code]);
$invite = $st->fetch();

if (!$invite) {
    $_SESSION['redeem_message'] = "Invalid code.";
    header("Location: account.php"); exit;
}
if ($invite['status'] !== 'active') {
    $_SESSION['redeem_message'] = "This code is not active.";
    header("Location: account.php"); exit;
}
if ((int)$invite['uses'] >= (int)$invite['max_uses']) {
    $_SESSION['redeem_message'] = "This code has already been used.";
    header("Location: account.php"); exit;
}

if (empty($_SESSION['user']['id'])) {
    $_SESSION['redeem_message'] = "No active user session.";
    header("Location: login.php"); exit;
}

// Update user role and increment usage
$pdo->prepare("UPDATE users SET role=? WHERE id=?")->execute([$invite['role'], $_SESSION['user']['id']]);
$pdo->prepare("UPDATE invite_codes SET uses = uses + 1 WHERE id=?")->execute([$invite['id']]);

$_SESSION['user']['role'] = $invite['role'];
$_SESSION['redeem_message'] = "Code redeemed successfully! Your role has been updated to '{$invite['role']}'.";

header("Location: account.php"); exit;
