<?php
// BrightPlan Studio – Stripe Config (Toggle Ready)

// Choose environment: 'test' or 'live'
$MODE = 'live'; // 🚀 set to live for launch

// Stripe configuration
$STRIPE_CONFIG = [
    'test' => [
        // ==== TEST KEYS ====
        'secret_key'     => 'sk_test_51SAPns4ARtgy00FG7XJ2IxHdGRAxiJykntdSEfNqJmhW02i8vcnB2BHN4BQcmotU572xVyxcaQfHKoYF5steeRN700IcuN6dPT',
        'webhook_secret' => 'whsec_BTyyIA8HtWexdEXLxXfYKq8EIAv7dEqO',
        'price_ids'      => [
            'essentials' => 'price_1SCWIE4ARtgy00FGNShlUEQA', // Test Essentials Plan
        ],
    ],
    'live' => [
        // ==== LIVE KEYS (✅ Live Secret Key already filled) ====
        'secret_key'     => 'sk_live_51SAPns4ARtgy00FGXXXXXXXXXXXXXXXXXXXXXXXX',
        'webhook_secret' => 'whsec_YOUR_REAL_LIVE_WEBHOOK_SECRET', // ⚠️ update from dashboard
        'price_ids'      => [
            'essentials' => 'price_live_YOUR_REAL_LIVE_PRICE_ID', // ⚠️ update from dashboard
        ],
    ],
];

// Select current environment
$current = $STRIPE_CONFIG[$MODE];
