<?php
$page_title = 'Refund Policy – BrightPlan Studio';
$meta_desc  = 'BrightPlan Studio Refund Policy: rules for digital subscriptions, cancellations, renewals, billing errors, fraud review, and global consumer law compliance (ACL, GDPR, CCPA).';
include 'header.php';
?>

<section class="hero" role="region" aria-label="Refund hero">
  <div class="hero-box">
    <h1 class="hero-title">Refund Policy</h1>
    <p class="hero-tagline">Effective Date: <?php echo date('F j, Y'); ?></p>
  </div>
</section>

<main class="container" role="main">
  <div style="max-width:800px; margin:40px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 8px 28px rgba(0,0,0,.08);">

    <p>
      This Refund Policy applies to all purchases from <strong>BrightPlan Studio Pty Ltd</strong> (“BrightPlan Studio”, “we”, “us”, “our”).
      Our offerings are <strong>digital subscriptions and downloadable resources</strong>. By purchasing, you agree to this policy
      and our <a href="terms.php">Terms of Service</a>.
    </p>

    <h2>1. Global Consumer Law Compliance</h2>
    <p>
      Nothing in this policy limits your rights under the <strong>Australian Consumer Law (ACL)</strong>, the <strong>EU General Data Protection Regulation (GDPR)</strong>,
      the <strong>UK GDPR</strong>, or the <strong>California Consumer Privacy Act (CCPA)</strong>. Where applicable, you are entitled to remedies for service failures that
      fall under mandatory consumer protection frameworks.
    </p>

    <h2>2. Digital Products and Subscriptions</h2>
    <ul>
      <li><strong>No refunds</strong> are provided for change of mind, user error, or once digital content has been delivered as described.</li>
      <li>Access to purchased content is granted immediately on payment confirmation and is considered “<strong>provided</strong>”.</li>
      <li>Where a <strong>material service outage</strong> prevents access for more than 24 consecutive hours (not caused by your local system or internet), you may request a credit or refund for the affected period.</li>
    </ul>

    <h2>3. Billing, Renewal, and Cancellation</h2>
    <ul>
      <li>Plans are billed in advance on a <strong>monthly</strong> or <strong>annual</strong> basis and renew automatically unless cancelled.</li>
      <li>You may cancel at any time. Cancellation stops future billing but does <strong>not</strong> retroactively refund past payments.</li>
      <li>To avoid renewal charges, cancellation must be completed before the renewal timestamp on your receipt or account page.</li>
    </ul>

    <h2>4. Duplicate Charges and Billing Errors</h2>
    <ul>
      <li>If you believe you were <strong>charged twice</strong> or incorrectly, notify us within <strong>14 days</strong> of the charge.</li>
      <li>Once verified via Stripe logs, we will reverse duplicate charges or correct errors promptly.</li>
    </ul>

    <h2>5. Fraud Review and Account Security</h2>
    <ul>
      <li>We may temporarily suspend access during fraud investigations initiated by Stripe or our internal systems.</li>
      <li>If a transaction is confirmed as <strong>unauthorised</strong>, we will refund it in full and secure the account.</li>
    </ul>

    <h2>6. Technical Requirements</h2>
    <p>
      Customers are responsible for ensuring they meet minimum technical requirements (supported device, browser, and stable internet).
      Inability to access content due to local device or network issues does not qualify as a service failure.
    </p>

    <h2>7. Chargebacks</h2>
    <p>
      Please contact us first for billing issues. If unresolved, you may raise a dispute with your card issuer. We will provide Stripe logs and access evidence to demonstrate delivery of services.
    </p>

    <h2>8. Taxes</h2>
    <p>
      All prices are in AUD and may include <strong>GST</strong> or applicable VAT. Invoices and receipts clearly state tax treatment for compliance.
    </p>

    <h2>9. How to Request a Remedy</h2>
    <p>
      To request a refund, credit, or consumer law remedy, email <a href="mailto:support@brightplanstudio.com">support@brightplanstudio.com</a> with:
    </p>
    <ul>
      <li>Your order email and Stripe receipt ID,</li>
      <li>Date and time of purchase, plan type,</li>
      <li>Clear description of the issue (include screenshots or error logs if relevant).</li>
    </ul>
    <p>
      We will review and respond in writing. Approved refunds are processed back to the original payment method.
    </p>

    <h2>10. Governing Law</h2>
    <p>
      This policy is governed by the laws of <strong>South Australia, Australia</strong>. For international customers, mandatory consumer protection laws of your jurisdiction also apply.
      Any disputes shall first be resolved in good faith before escalating to the courts of South Australia, unless local laws require otherwise.
    </p>

    <h2>11. Contact</h2>
    <p>
      Questions or requests: <a href="mailto:support@brightplanstudio.com">support@brightplanstudio.com</a>.
    </p>

  </div>
</main>

<?php include 'footer.php'; ?>
