<?php
require_once __DIR__ . '/session_config.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = "essentials";

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)");
        $stmt->execute([$name,$email,$password,$role]);
        header("Location: login.php?registered=1");
        exit();
    } catch (PDOException $e) {
        $error = "That email already exists.";
    }
}

include 'header.php';
?>

<section class="hero" style="background:#111;color:#fff;">
  <div class="hero-box">
    <!-- Title -->
    <h1 class="hero-title">Register</h1>

    <!-- Phoenix logo -->
    <img src="/favicon-512.png" alt="BrightPlan Studio Logo">

    <!-- Tagline -->
    <p class="hero-tagline" style="margin:0;font-size:1.2rem;color:#ccc;">
      Create your BrightPlan Studio&trade; account
    </p>
  </div>
</section>

<main class="container" style="margin:40px auto; max-width:800px;">
  <div class="form-wrap">
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
      <label>Full Name</label>
      <input type="text" name="name" required>

      <label>Email Address</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <div class="actions">
        <button type="submit" class="btn">Register</button>
        <a href="login.php" class="btn outline">Already have an account? Log in</a>
      </div>
    </form>
  </div>
</main>

<?php include 'footer.php'; ?>


