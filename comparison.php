<?php
$page_title = 'BrightPlan Studio – Compare Membership Tiers';
$meta_desc  = 'Compare BrightPlan Studio membership tiers: Essentials, Growth, and Leadership+. See features, pricing, and choose the plan that matches your leadership journey.';
include 'header.php';
?>

<main class="container" role="main" style="margin:40px auto; max-width:1200px;">

  <section style="background:#fff; padding:30px; border-radius:12px; box-shadow:0 8px 28px rgba(0,0,0,.06); margin-bottom:40px; text-align:center;">
    <h1 style="margin-top:0; font-family:'Montserrat', sans-serif;">Compare Membership Tiers</h1>
    <p style="color:#555; margin:0;">A clear view of Essentials, Growth, and Leadership+ side by side</p>
  </section>

  <table style="width:100%; border-collapse:collapse; text-align:center; font-family:'Montserrat', sans-serif; box-shadow:0 8px 28px rgba(0,0,0,.06);">
    <thead style="background:#f5f5f5;">
      <tr>
        <th style="padding:15px; border:1px solid #ddd;">Features</th>
        <th style="padding:15px; border:1px solid #ddd;">Essentials<br><small>A$31.90 / mo<br>A$319.00 / yr</small></th>
        <th style="padding:15px; border:1px solid #ddd;">Growth<br><small>A$86.90 / mo<br>A$869.00 / yr</small></th>
        <th style="padding:15px; border:1px solid #ddd;">Leadership+<br><small>A$218.90 / mo<br>A$2189.00 / yr</small></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="padding:12px; border:1px solid #ddd; text-align:left;">Invite code access to member portal</td>
        <td style="border:1px solid #ddd;">✔</td>
        <td style="border:1px solid #ddd;">✔</td>
        <td style="border:1px solid #ddd;">✔</td>
      </tr>
      <tr>
        <td style="padding:12px; border:1px solid #ddd; text-align:left;">Core materials for leadership foundations</td>
        <td>✔</td>
        <td>✔</td>
        <td>✔</td>
      </tr>
      <tr>
        <td style="padding:12px; border:1px solid #ddd; text-align:left;">Growth-focused leadership modules</td>
        <td>–</td>
        <td>✔</td>
        <td>✔</td>
      </tr>
      <tr>
        <td style="padding:12px; border:1px solid #ddd; text-align:left;">Manager dashboards & reporting tools</td>
        <td>–</td>
        <td>✔</td>
        <td>✔</td>
      </tr>
      <tr>
        <td style="padding:12px; border:1px solid #ddd; text-align:left;">Collaborative team resources</td>
        <td>–</td>
        <td>✔</td>
        <td>✔</td>
      </tr>
      <tr>
        <td style="padding:12px; border:1px solid #ddd; text-align:left;">Enterprise-ready resources</td>
        <td>–</td>
        <td>–</td>
        <td>✔</td>
      </tr>
      <tr>
        <td style="padding:12px; border:1px solid #ddd; text-align:left;">Single Sign-On (SSO) integration</td>
        <td>–</td>
        <td>–</td>
        <td>✔</td>
      </tr>
      <tr>
        <td style="padding:12px; border:1px solid #ddd; text-align:left;">Bespoke frameworks & consultancy</td>
        <td>–</td>
        <td>–</td>
        <td>✔</td>
      </tr>
    </tbody>
    <tfoot style="background:#fafafa;">
      <tr>
        <td></td>
        <td style="padding:15px; border:1px solid #ddd;"><a class="btn" href="starter.php">Choose Essentials</a></td>
        <td style="padding:15px; border:1px solid #ddd;"><a class="btn" href="growth.php">Choose Growth</a></td>
        <td style="padding:15px; border:1px solid #ddd;"><a class="btn" href="leadership.php">Choose Leadership+</a></td>
      </tr>
    </tfoot>
  </table>

  <p style="margin-top:30px; font-size:14px; color:#444; text-align:center;">
    🌍 BrightPlan Studio contributes <strong>1% of all subscription revenue</strong> to Stripe Climate carbon removal projects.
  </p>

</main>

<?php include 'footer.php'; ?>
