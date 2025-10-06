<?php
$page_title = 'BrightPlan Studio – Products & Packages';
$meta_desc  = 'Explore BrightPlan Studio membership tiers: Essentials, Growth, and Leadership+. Compare features, download a preview whitepaper, and subscribe today.';
include 'header.php';
?>

<main class="container" role="main" style="margin:40px auto; max-width:1100px;">

  <section style="background:#fff; padding:22px; border-radius:12px; box-shadow:0 8px 28px rgba(0,0,0,.06); margin-bottom:28px; text-align:center; position:relative; overflow:hidden;">
    <!-- Watermark -->
    <div style="position:absolute; top:40%; left:50%; transform:translate(-50%,-50%); opacity:0.04; font-size:110px; font-weight:700; font-family:'Montserrat', sans-serif; letter-spacing:5px; text-transform:uppercase; white-space:nowrap; pointer-events:none;">
      BrightPlan Studio | Executive Growth
    </div>

    <h1 style="margin-top:0; font-family:'Montserrat', sans-serif;">Our Membership Tiers</h1>
    <p style="color:#555; margin:0;">Select the plan that matches your leadership journey.</p>
  </section>

  <section class="grid-3">
    <!-- Essentials -->
    <article class="card" style="background:#fff; padding:20px; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,.08); text-align:center;">
      <h2>Essentials</h2>
      <p class="desc">Starter resources for individuals beginning their leadership journey.</p>
      <ul style="text-align:left; display:inline-block; margin:10px auto; color:#444;">
        <li>Invite code access to member portal</li>
        <li>Core materials</li>
      </ul>
      <p><strong>Monthly:</strong> A$31.90<br><strong>Annual:</strong> A$319.00</p>
      <a class="btn outline" href="downloads/whitepaper.zip">Download Preview</a><br><br>
      <a class="btn" href="starter.php">Learn More</a>
    </article>

    <!-- Growth -->
    <article class="card" style="background:#fff; padding:20px; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,.08); text-align:center;">
      <h2>Growth</h2>
      <p class="desc">Advanced content and team dashboards to help you level up.</p>
      <ul style="text-align:left; display:inline-block; margin:10px auto; color:#444;">
        <li>Invite code access to member portal</li>
        <li>Essentials included</li>
        <li>Extra growth modules</li>
      </ul>
      <p><strong>Monthly:</strong> A$86.90<br><strong>Annual:</strong> A$869.00</p>
      <a class="btn outline" href="downloads/whitepaper.zip">Download Preview</a><br><br>
      <a class="btn" href="growth.php">Learn More</a>
    </article>

    <!-- Leadership+ -->
    <article class="card" style="background:#fff; padding:20px; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,.08); text-align:center;">
      <h2>Leadership+</h2>
      <p class="desc">Comprehensive package for professionals and leaders, including exclusives.</p>
      <ul style="text-align:left; display:inline-block; margin:10px auto; color:#444;">
        <li>Invite code access to member portal</li>
        <li>Growth content</li>
        <li>Leadership+ exclusives</li>
      </ul>
      <p><strong>Monthly:</strong> A$218.90<br><strong>Annual:</strong> A$2189.00</p>
      <a class="btn outline" href="downloads/whitepaper.zip">Download Preview</a><br><br>
      <a class="btn" href="leadership.php">Learn More</a>
    </article>
  </section>

</main>

<?php include 'footer.php'; ?>


