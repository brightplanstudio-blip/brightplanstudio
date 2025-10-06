<?php
// ============================================================
// BrightPlan Studio™ Access Control (Final)
// ============================================================

require_once __DIR__ . '/../session_config.php';

/*
Accepts both:
  $_SESSION['role']
  $_SESSION['user']['role']
*/

function getUserRole(): string {
    if (!empty($_SESSION['user']['role'])) {
        return strtolower($_SESSION['user']['role']);
    }
    if (!empty($_SESSION['role'])) {
        return strtolower($_SESSION['role']);
    }
    return '';
}

function hasTierAccess(string $userRole, string $required): bool {
    $rank = ['essentials'=>1, 'growth'=>2, 'leadership'=>3];
    return isset($rank[$userRole], $rank[$required]) && $rank[$userRole] >= $rank[$required];
}

function requireAuth(string $requiredTier): void {
    if (empty($_SESSION)) {
        http_response_code(401);
        exit('Unauthorized (no session)');
    }

    $role = getUserRole();
    if (!$role) {
        http_response_code(401);
        exit('Unauthorized (no role)');
    }

    if (!hasTierAccess($role, $requiredTier)) {
        http_response_code(403);
        exit('Forbidden (insufficient tier)');
    }

    // Security headers
    header('X-Robots-Tag: noindex, noarchive, nosnippet');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
}
