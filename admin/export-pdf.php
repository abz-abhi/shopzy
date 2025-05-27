<?php
require '../vendor/autoload.php';
require 'include/db_config.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Show errors while debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['order_id'])) {
    die("Missing order ID.");
}

$orderId = $_GET['order_id'];

// Setup Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Allow external CSS/images if needed
$dompdf = new Dompdf($options);

// Load invoice HTML
ob_start();
include 'invoice-template.php'; // This file should generate the full invoice HTML
$html = ob_get_clean();

// Generate PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Stream PDF to browser
$dompdf->stream("invoice-$orderId.pdf", ["Attachment" => false]); // false = preview
