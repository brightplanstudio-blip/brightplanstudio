<?php
// ============================================================
// login_process.php – BrightPlan Studio™
// ============================================================

require_once __DIR__ . '/session_config.php';
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email && $password) {
        $pdo = db();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            // Role (default Essentials if missing)
            $role = strtolower($user['role'] ?? 'essentials');

            // Store in both formats for guard.php compatibility
            $_SESSION['role'] = $role;
            $_SESSION['user'] = [
                'id'    => $user['id'],
                'email' => $user['email'],
                'name'  => $user['name'],
                'role'  => $role
            ];

            header("Location: account.php");
            exit;

        } else {
            $error = "Invalid email or password.";
        }

    } else {
        $error = "Please enter both email and password.";
    }

} else {
    $error = "Invalid request.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Failed – BrightPlan Studio</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <main class="container">
    <div class="form-wrap">
      <h2>Login Failed</h2>
      <p><?php echo htmlspecialchars($error); ?></p>
      <a href="login.php" class="btn">Back to Login</a>
    </div>
  </main>
</body>
</html>

