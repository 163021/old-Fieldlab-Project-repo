<?php


require_once __DIR__ . 'vendor/autoload.php';


// Pak de variablen


$inzake_adres = $_POST['inzake-adres'];
$te_postcode = $_POST['te-postcode'];
$deb_nmr = $_POST['deb-nmr'];
$gaat_mee = $_POST['tuin'];


$mpdf = new \Mpdf\Mpdf();


$data = '';

$data .= '<h1>Lijst van zaken</h1>';

$data .= '<strong>Inzake het adres:</strong> ' . $inzake_adres . '<br />';
$data .= '<strong>Te (postcode en plaats</strong> ' . $te_postcode . '<br />';
$data .= '<strong>Inzake het adres:</strong> ' . $deb_nmr . '<br />';
$data .= '<strong>Inzake het adres:</strong> ' . $gaat_mee . '<br />';
