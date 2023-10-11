<?php
  session_start();
  
  $get_level = $_SESSION['level'];

  if ($get_level == 'Admin') {
    $table = 'data_obat';   
  }else{
    $table = 'dat_obat';   
  }

$primaryKey = 'kode';

$columns = array(
    array( 'db' => 'kode','dt'=> 0 ),
    array( 'db' => 'nama','dt' => 1 ),
    array( 'db' => 'suplierid','dt' => 2 ),
    array( 'db' => 'kategori','dt' => 3 ),
    array(
           'db'        => 'beli',
           'dt'        => 4,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
        array(
           'db'        => 'jual',
           'dt'        => 5,
           'formatter' => function( $d, $row ) {
            return 'Rp. '.(number_format($d));
           }
    ),
        array(
           'db'        => 'stok',
           'dt'        => 6,
           'formatter' => function( $d, $row ) {
            return(number_format($d));
           }

    ),
        array(
            'db' => 'kode',
            'dt' => 7,
            'formatter' => function( $d ) {
                return '
                <a href="action/action?kode='.$d.'&&act=del-obat" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span>
                </a> <a href="#edit_modal" class="btn btn-dark btn-sm" data-toggle="modal" data-id="'. $id .'"><span class="fa fa-edit"></span></a>';
            }
    )

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
