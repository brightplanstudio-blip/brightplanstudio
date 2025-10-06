<?php
// index.php – BrightPlan Studio Homepage (all updates applied)
include 'header.php';
?>

<style>
/* Hero section responsive fix */
.hero {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  min-height: 55vh; /* reduced padding */
  text-align: center;
  padding: 20px;
  box-sizing: border-box;
}

.hero-title {
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  font-size: 2.5rem;
  color: #d4af37;
  margin: 0;
}

.hero-box img {
  margin: 15px 0;
}

/* Tablet view */
@media (max-width: 991px) {
  .hero-title {
    font-size: 1.8rem !important;
  }
  .hero-box img {
    height: 90px !important;
  }
}

/* Mobile view */
@media (max-width: 600px) {
  .hero-title {
    font-size: 1.5rem !important;
  }
  .hero-box img {
    height: 70px !important;
  }
}

/* Package card styles */
.card {
  background: linear-gradient(to bottom, #fffbe6, #d4af37) !important;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 8px 28px rgba(0,0,0,.08);
  color: #333;
  transition: transform 0.2s ease;
}

.card:hover {
  transform: translateY(-4px);
}

.card h3 {
  color: #333;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
  margin-bottom: 10px;
}
</style>

<section class="hero" role="region" aria-label="Homepage hero" style="background:#111;color:#fff;">
  <div class="hero-box">

    <!-- Title -->
    <h1 class="hero-title">Welcome to BrightPlan Studio™</h1>

    <!-- Phoenix logo below heading -->
    <img src="/favicon-512.png" alt="BrightPlan Studio Logo">

    <!-- Tagline -->
    <p class="hero-tagline" style="margin:0;font-size:1.2rem;color:#ccc;">
      The globally trusted digital ecosystem for growth, leadership, and wellbeing.
    </p>

    <!-- Actions -->
    <div class="hero-actions" style="margin-top:20px;">
      <a href="/plans.php" class="btn" style="margin-right:10px;">View Plans</a>
      <a href="/register.php" class="btn outline">Get Started</a>
    </div>
  </div>
</section>

<main class="container" role="main" style="margin:40px auto;max-width:1100px;">

  <!-- Why BrightPlan Studio -->
  <section style="margin-bottom:40px;text-align:center;">
    <h2 style="font-family:'Montserrat',sans-serif;font-size:1.8rem;color:#d4af37;margin-bottom:16px;">
      Why BrightPlan Studio™
    </h2>
    <p style="max-width:900px;margin:0 auto;font-size:1rem;line-height:1.6;color:#333;">
      BrightPlan Studio™ unites our four pillars of expertise —
      <strong>Executive Wellness™, Technology &amp; Innovation™, Environmental Social Political™, and Business Performance™</strong> —
      to deliver integrated solutions in leadership, corporate wellbeing, ESG strategy, and performance growth.
    </p>
  </section>

  <!-- Package Cards -->
  <div class="grid-3">
    <div class="card">
      <h3>Essentials</h3>
      <p class="desc">
        Entry into BrightPlan Studio™, providing essential tools for individuals to strengthen wellbeing, performance, and leadership foundations.
      </p>
      <a href="/essentials.php" class="btn">Explore Essentials</a>
    </div>

    <div class="card">
      <h3>Growth</h3>
      <p class="desc">
        Advanced solutions expanding on Business Performance™ and Executive Wellness™, equipping teams with leadership frameworks and collaborative dashboards.
      </p>
      <a href="/growth.php" class="btn">Explore Growth</a>
    </div>

    <div class="card">
      <h3>Leadership+</h3>
      <p class="desc">
        Premium access leveraging all BrightPlan pillars — innovation, wellness, ESG, and performance — for executives and enterprise transformation.
      </p>
      <a href="/leadership.php" class="btn">Explore Leadership+</a>
    </div>
  </div>

</main>

<?php include 'footer.php'; ?>
