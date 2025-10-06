<?php
require_once __DIR__ . '/session_config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?auth=required");
    exit();
}
include 'header.php';
?>

<section class="hero" style="background:#111;color:#fff;">
  <div class="hero-box">
    <h1 class="hero-title">Your Account</h1>
    <img src="/favicon-512.png" alt="BrightPlan Studio Logo">
    <p class="hero-tagline" style="margin:0;font-size:1.2rem;color:#ccc;">
      Manage your subscriptions and access your dashboard
    </p>
  </div>
</section>

<main class="container" style="margin:40px auto; max-width:900px;">
  <div class="account-card">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?></h2>
    <p><strong>Plan Level:</strong> <?php echo ucfirst($_SESSION['role']); ?></p>

    <hr style="margin:20px 0;">

    <?php if ($_SESSION['role'] === 'essentials'): ?>
      <h3>Essentials Dashboard</h3>
      <p>Access your wellbeing toolkit, leadership foundations, and starter resources.</p>
      <a href="downloads/Essentials_Preview_Final_2.0.pdf" target="_blank" class="btn">Download Essentials Preview</a>

    <?php elseif ($_SESSION['role'] === 'growth'): ?>
      <h3>Growth Dashboard</h3>
      <p>Manage team dashboards, track ESG growth, and view advanced reporting tools.</p>
      <a href="downloads/Growth_Preview.pdf" target="_blank" class="btn">Download Growth Preview</a>

    <?php elseif ($_SESSION['role'] === 'leadership'): ?>
      <h3>Leadership+ Dashboard</h3>
      <p>Access predictive analytics, AI/VR leadership lab, and enterprise transformation resources.</p>
      <a href="downloads/Leadership_Preview.pdf" target="_blank" class="btn">Download Leadership+ Preview</a>

    <?php else: ?>
      <p>No dashboard assigned to this role.</p>
    <?php endif; ?>

    <hr style="margin:20px 0;">

    <div class="account-actions">
      <a href="plans.php" class="btn">View Plans</a>
      <a href="settings.php" class="btn outline">Account Settings</a>
      <a href="logout.php" class="btn">Log Out</a>
    </div>
  </div>
</main>

<?php include 'footer.php'; ?>
