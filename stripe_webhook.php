<?php
// stripe_webhook.php – BrightPlan Studio (Toggle-ready + onboarding email)
ini_set('display_errors', 0);
error_reporting(E_ALL);

require __DIR__ . '/config.stripe.php';
require __DIR__ . '/vendor/stripe-php/init.php';
require __DIR__ . '/functions.php';

\Stripe\Stripe::setApiKey($current['secret_key']);
$WEBHOOK_SECRET = $current['webhook_secret'];

// ---- Settings for onboarding email ----
$FROM_EMAIL = 'support@brightplanstudio.com';
$FROM_NAME  = 'BrightPlan Studio';
$COMPANY    = 'BrightPlan Studio Pty Ltd.';
$ABN        = '99690991489';

// Map roles to human plan names (ensure these align with your site copy)
$ROLE_TO_PLAN = [
  'essentials' => 'Essentials',
  'growth'     => 'Growth',
  'leadership' => 'Leadership+',
];

// Log file
$logFile = __DIR__ . "/stripe_webhook.log";
file_put_contents($logFile, "Webhook hit at ".date('c')."\n", FILE_APPEND);

// Read and verify signature
$payload   = @file_get_contents('php://input');
$sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

try {
    $event = \Stripe\Webhook::constructEvent($payload, $sigHeader, $WEBHOOK_SECRET);
    file_put_contents($logFile, "Event: ".$event->type."\n", FILE_APPEND);
} catch (\Throwable $e) {
    file_put_contents($logFile, "Signature error: ".$e->getMessage()."\n", FILE_APPEND);
    http_response_code(400);
    exit;
}

if ($event->type === 'checkout.session.completed') {
    $session  = $event->data->object;

    // Expand line items (safer if not expanded by Stripe)
    try {
        $sessionFull = \Stripe\Checkout\Session::retrieve([
            'id' => $session->id,
            'expand' => ['line_items.data.price'],
        ]);
    } catch (\Throwable $e) {
        file_put_contents($logFile, "Expand error: ".$e->getMessage()."\n", FILE_APPEND);
        http_response_code(200);
        exit;
    }

    $email   = $session->customer_details->email ?? '';
    $items   = $sessionFull->line_items->data ?? [];
    $priceId = $items[0]->price->id ?? '';

    // Determine role by matching configured price IDs
    $role = 'essentials';
    foreach ($current['price_ids'] as $r => $pid) {
        if ($pid === $priceId) { $role = $r; break; }
    }
    $planName = $ROLE_TO_PLAN[$role] ?? 'Essentials';

    file_put_contents($logFile, "Processing email=$email | Price=$priceId | Role=$role\n", FILE_APPEND);

    if ($email) {
        $pdo = db();

        // Check if user exists
        $st = $pdo->prepare("SELECT id, name, email FROM users WHERE email=? LIMIT 1");
        $st->execute([$email]);
        $user = $st->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Update role
            $pdo->prepare("UPDATE users SET role=? WHERE id=?")->execute([$role, $user['id']]);
            file_put_contents($logFile, "Updated existing user {$email} to role $role\n", FILE_APPEND);
            $firstName = trim(explode(' ', $user['name'] ?? '')[0]) ?: 'there';
            send_onboarding_email($email, $firstName, $planName, $FROM_EMAIL, $FROM_NAME, $COMPANY, $ABN, $logFile);
        } else {
            // Create minimal record with random password (user can set later via your flows)
            $firstName = trim(explode('@', $email)[0]); // derive simple first name from email
            $pw = bin2hex(random_bytes(8));
            $pdo->prepare("INSERT INTO users (name,email,password_hash,role,created_at) VALUES (?,?,?,?,NOW())")
                ->execute([$firstName, $email, password_hash($pw, PASSWORD_DEFAULT), $role]);
            file_put_contents($logFile, "Created new user {$email} with role $role\n", FILE_APPEND);
            send_onboarding_email($email, $firstName, $planName, $FROM_EMAIL, $FROM_NAME, $COMPANY, $ABN, $logFile);
        }
    }
}

http_response_code(200);

// ---- Helper: send onboarding email (HTML) using PHP mail() ----
function send_onboarding_email($to, $firstName, $planName, $fromEmail, $fromName, $company, $abn, $logFile) {
    $subject = "Welcome to BrightPlan Studio – {$planName}";
    $headers  = "From: {$fromName} <{$fromEmail}>\r\n";
    $headers .= "Reply-To: {$fromEmail}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $html = <<<HTML
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Welcome to BrightPlan Studio™</title></head>
<body style="font-family:Arial, Helvetica, sans-serif; background:#f6f7f9; padding:20px; color:#333;">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; margin:0 auto; background:#ffffff; padding:20px; border-radius:8px; box-shadow:0 8px 28px rgba(0,0,0,.06);">
    <tr>
      <td align="center" style="padding:20px 0;">
        <h1 style="color:#d4af37; margin-bottom:5px;">BrightPlan Studio&#8482;</h1>
        <p style="margin:0; font-size:1.1rem; color:#6b6f78;">Empowering growth, leadership & wellbeing</p>
      </td>
    </tr>
    <tr>
      <td>
        <h2 style="color:#111317;">Welcome, {$firstName}!</h2>
        <p>Thank you for subscribing to <strong>{$company}</strong>. Your <strong>{$planName}</strong> plan is now active.</p>
        <p>You now have access to:</p>
        <ul>
          <li>Exclusive resources tailored to your success</li>
          <li>Personalised tools to manage growth & wellbeing</li>
          <li>Priority access to new features as they launch</li>
        </ul>
        <p style="text-align:center; margin:24px 0;">
          <a href="https://brightplanstudio.com/account.php" style="display:inline-block; padding:12px 24px; background:#d4af37; color:#fff; text-decoration:none; font-weight:600; border-radius:8px;">Go to My Account</a>
        </p>
        <p>Need help? Contact us at <a href="mailto:support@brightplanstudio.com">support@brightplanstudio.com</a>.</p>
      </td>
    </tr>
    <tr>
      <td style="padding-top:20px; font-size:0.85rem; color:#6b6f78; text-align:center;">
        <p>{$company} | ABN: {$abn}</p>
        <p>&copy; 2025 BrightPlan Studio&#8482;. All Rights Reserved.</p>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;

    $ok = @mail($to, $subject, $html, $headers);
    file_put_contents($logFile, $ok ? "Email sent to {$to}\n" : "Email failed to {$to}\n", FILE_APPEND);
}



