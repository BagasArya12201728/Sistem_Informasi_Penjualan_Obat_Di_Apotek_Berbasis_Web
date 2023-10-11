<?php
require_once __DIR__ . '/mpdf/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<h4 style="font-size: 20px; font-weight: bold;  text-align: center; height : 0px;"><strong>Laporan Stok</strong></h4>
                <h5 style="font-size: 14px; font-weight: bold;  text-align: center;">Priode : '.$date = date("d M Y").' </h5>
                <hr>


  <table width="100%" cellspacing="0" style="font-size: 12px">
      <tr>
        <th width="2%">No</th>
        <th width="9%">Kode</th>
        <th width="40%">Nama</th>
        <th width="12%">Kategori</th>
        <th width="10%">Satuan</th>
        <th width="10%">Stok</th>  
      </tr>';

$mpdf->WriteHTML($html);

$mpdf->Output();



?>
