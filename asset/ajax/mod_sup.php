<?php
$table = 'suplier';
$primaryKey = 'kode';
 
$columns = array(
    array(
           'db'        => 'kode',
           'dt'        => 0,
           'formatter' => function( $d, $row ) {
            return 'S-0'.($d);
           }
       ),
    array( 'db' => 'nama','dt' => 1 ),
    array( 'db' => 'Kota','dt' => 2 ),
    array( 'db' => 'Telp','dt' => 3 ),
    array( 'db' => 'Email','dt' => 4 ),
    array( 'db' => 'Alamat','dt' => 5 ),
  );

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'db_apotek',
    'host' => 'localhost'
);
require('ssp.class.php');
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>