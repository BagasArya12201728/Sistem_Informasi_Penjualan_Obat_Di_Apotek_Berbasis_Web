<?php
$table = 'view_penjualan';
$primaryKey = 'id';

$columns = array(
    array('db' => 'id','dt'=> 0 ),

    array( 'db' => 'tgl','dt' => 1, 'formatter'=> function( $d, $row ) { return date ( 'd M Y', strtotime($d)) ;} ),
    array(
           'db'        => 'total_harga',
           'dt'        => 2,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
    array(
           'db'        => 'total_bayar',
           'dt'        => 3,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
    array(
           'db'        => 'kembali',
           'dt'        => 4,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
    array('db' => 'kasir',
          'dt' => 5,

          'formatter' => function( $d ) {
          return '<div class="text-center"><span class="btn btn-dark btn-sm" ><span class="fa fa-user"></span> ' .$d.'</span></div>';
          }
    ),


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
