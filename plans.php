<?php
// plans.php – BrightPlan Studio Subscription Tiers
include 'header.php';
?>

<section class="hero" role="region" aria-label="Plans hero" style="background:#111;color:#fff;">
  <div class="hero-box">
    <h1 class="hero-title">Plans & Features</h1>
    <img src="/favicon-512.png" alt="BrightPlan Studio Logo">
    <p class="hero-tagline">Clear, outcome-focused subscriptions for individuals, teams, and enterprises.</p>
  </div>
</section>

<main class="container" role="main" style="margin:40px auto; max-width:1100px;">

  <!-- Executive summary -->
  <section style="background:#fff; padding:22px; border-radius:12px; box-shadow:0 8px 28px rgba(0,0,0,.06); margin-bottom:28px;">
    <h2 style="margin-top:0; font-family:'Montserrat', sans-serif; color:var(--accent);">Executive Summary</h2>
    <p style="color:#555; margin:0;">
      BrightPlan Studio™ subscriptions are structured for flexibility and impact. Choose the right tier for
      your journey — Essentials, Growth, or Leadership+ — and scale as your needs evolve.
    </p>
  </section>

  <!-- Plans Grid -->
  <section class="grid-3">

    <!-- Essentials -->
    <div class="card">
      <h3>Essentials</h3>
      <p class="desc">
        Digital wellbeing toolkit, leadership foundations curriculum, and self-paced growth modules.
      </p>
      <a href="/essentials.php" class="btn">Explore Essentials</a><br><br>
      <a href="/downloads/Essentials_Preview.pdf" target="_blank" class="btn outline">Download Preview</a>
    </div>

    <!-- Growth -->
    <div class="card">
      <h3>Growth</h3>
      <p class="desc">
        Advanced coaching modules, team dashboards, and custom development plans for leaders on the rise.
      </p>
      <a href="/growth.php" class="btn">Explore Growth</a><br><br>
      <a href="/downloads/Growth_Preview.pdf" target="_blank" class="btn outline">Download Preview</a>
    </div>

    <!-- Leadership+ -->
    <div class="card">
      <h3>Leadership+</h3>
      <p class="desc">
        Enterprise-grade executive dashboards, AI/VR leadership lab, and ESG impact reporting.
      </p>
      <a href="/leadership.php" class="btn">Explore Leadership+</a><br><br>
      <a href="/downloads/Leadership_Preview.pdf" target="_blank" class="btn outline">Download Preview</a>
    </div>

  </section>
</main>

<?php include 'footer.php'; ?>


