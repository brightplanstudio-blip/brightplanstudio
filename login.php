<?php
require_once __DIR__ . '/session_config.php';
require 'db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id,email,password,role FROM users WHERE email=? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // ✅ Login success: set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email']  = $user['email'];
        $_SESSION['role']   = $user['role'];

        // Redirect to account page
        header("Location: account.php");
        exit();
    } else {
        // ❌ Login failed
        $error = "Invalid email or password.";
    }
}

include 'header.php';
?>

<section class="hero" style="background:#111;color:#fff;">
  <div class="hero-box">
    <!-- Title -->
    <h1 class="hero-title">Login</h1>

    <!-- Phoenix logo -->
    <img src="/favicon-512.png" alt="BrightPlan Studio Logo">

    <!-- Tagline -->
    <p class="hero-tagline" style="margin:0;font-size:1.2rem;color:#ccc;">
      Access your BrightPlan Studio&trade; account
    </p>
  </div>
</section>

<main class="container" style="margin:40px auto; max-width:800px;">
  <div class="form-wrap">
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
      <label>Email Address</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <div class="actions">
        <button type="submit" class="btn">Login</button>
        <a href="register.php" class="btn outline">Need an account? Register</a>
      </div>
    </form>
  </div>
</main>

<?php include 'footer.php'; ?>
