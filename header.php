<?php
require_once __DIR__ . '/session_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BrightPlan Studio</title>

  <!-- Fonts & Styles -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <header class="site-header">
    <!-- Mobile Toggle -->
    <button class="nav-toggle" id="nav-toggle">☰</button>

    <nav class="site-nav" id="site-nav">
      <a href="index.php">Home</a>
      <a href="plans.php">Plans</a>
      <a href="register.php">Register</a>

      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="account.php">Account</a>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </nav>
  </header>

  <!-- simple mobile nav toggle -->
  <script>
    document.getElementById('nav-toggle').addEventListener('click', function () {
      document.getElementById('site-nav').classList.toggle('show');
    });
  </script>
