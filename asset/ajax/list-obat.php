<?php
$table = 'dat_obat';
$primaryKey = 'kode';
 
$columns = array(
    array(
           'db'        => 'kode',
           'dt'        => 0,
           'formatter' => function( $d, $row ) {
            return ($d);
           }
       ),
    array( 'db' => 'nama','dt' => 1 ),
    array( 'db' => 'suplierid','dt' => 2 ),
    array(
           'db'        => 'beli',
           'dt'        => 3,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
        array(
           'db'        => 'jual',
           'dt'        => 4,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
    array( 'db' => 'stok', 'dt' => 5 ),
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