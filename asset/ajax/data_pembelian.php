<?php
$table = 'data_pembelian';
$primaryKey = 'nota';
 
$columns = array(
    array('db' => 'nota','dt'=> 0 ),

    array( 'db' => 'tgl','dt' => 1, 'formatter'=> function( $d, $row ) { return date ( 'D, d M Y', strtotime($d)) ;} ),
    array( 'db' => 'jatuh_tempo','dt' => 2, 'formatter'=> function( $d, $row ) { return date ( 'd M Y', strtotime($d)) ;} ),
    array( 'db' => 'status','dt' => 3 ),
    array(
           'db'        => 'total_harga',
           'dt'        => 4,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
        array(
           'db'        => 'bayar',
           'dt'        => 5,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
        array(
           'db'        => 'sisa',
           'dt'        => 6,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
    array('db' => 'id','dt'=> 7 ),


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