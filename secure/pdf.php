<?php
// ============================================================
// BrightPlan Studio™ Secure PDF Generator
// ============================================================

require __DIR__ . '/guard.php';
requireAuth('essentials'); // Growth & Leadership inherit

// Autoload Dompdf
$autoloadA = __DIR__ . '/../vendor/autoload.php';
$autoloadB = __DIR__ . '/../vendor/dompdf/autoload.inc.php';
if (file_exists($autoloadA)) {
    require $autoloadA;
} elseif (file_exists($autoloadB)) {
    require $autoloadB;
} else {
    http_response_code(500);
    exit('PDF engine not installed or autoload not found.');
}

use Dompdf\Dompdf;
use Dompdf\Options;

// Document map
$map = [
    'bp_essentials_workbook'   => __DIR__ . '/templates/bp_essentials_workbook.html',
    'bp_essentials_quickstart' => __DIR__ . '/templates/bp_essentials_quickstart.html'
];

$doc = $_GET['doc'] ?? '';
if (!isset($map[$doc])) {
    http_response_code(404);
    exit('Document not found');
}

$html = file_get_contents($map[$doc]);
if ($html === false) {
    http_response_code(500);
    exit('Template read error');
}

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'DejaVu Sans');

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$name = $doc . '.pdf';
$dompdf->stream($name, ['Attachment' => false]);
