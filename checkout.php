<?php
// checkout.php – BrightPlan Studio
require __DIR__ . '/config.stripe.php';
require __DIR__ . '/vendor/stripe-php/init.php';

\Stripe\Stripe::setApiKey($current['secret_key']);

// Essentials plan live price ID
$priceId = $current['price_ids']['essentials'];

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'mode' => 'subscription', // Essentials is recurring monthly
    'line_items' => [[
        'price'    => $priceId,
        'quantity' => 1,
    ]],
    'success_url' => 'https://brightplanstudio.com/success.php?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url'  => 'https://brightplanstudio.com/cancel.php',
]);

header('Location: ' . $session->url, true, 303);
exit;
