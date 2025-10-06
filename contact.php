<?php
$page_title = 'Contact Sales – BrightPlan Studio';
$meta_desc  = 'Contact BrightPlan Studio sales team for enterprise subscriptions and tailored solutions.';
include 'header.php';
?>

<section class="hero" role="region" aria-label="Contact hero">
  <div class="hero-box">
    <h1 class="hero-title">Contact Sales</h1>
    <p class="hero-tagline">Enterprise solutions tailored for your organisation</p>
  </div>
</section>

<main class="container">
  <div style="max-width:600px; margin:40px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 8px 28px rgba(0,0,0,.08);">

    <h2>Get in Touch</h2>
    <p>Please complete the form below and our team will respond within 1–2 business days.</p>

    <form method="post" action="send_contact.php">
      <label style="display:block; margin-bottom:6px; font-weight:600;">Name</label>
      <input type="text" name="name" required 
             style="width:100%; padding:10px; margin-bottom:16px; border:1px solid #ccc; border-radius:6px;">

      <label style="display:block; margin-bottom:6px; font-weight:600;">Email</label>
      <input type="email" name="email" required 
             style="width:100%; padding:10px; margin-bottom:16px; border:1px solid #ccc; border-radius:6px;">

      <label style="display:block; margin-bottom:6px; font-weight:600;">Message</label>
      <textarea name="message" required rows="5" 
                style="width:100%; padding:10px; margin-bottom:20px; border:1px solid #ccc; border-radius:6px;"></textarea>

      <button type="submit" class="btn">Send Message</button>
    </form>

    <p style="margin-top:20px; font-size:0.9rem; color:#555;">
      Or contact us directly at 
      <a href="mailto:support@brightplanstudio.com">support@brightplanstudio.com</a>.
    </p>
  </div>
</main>

<?php include 'footer.php'; ?>
