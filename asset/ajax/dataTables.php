<?php
$table = 'barang';
$primaryKey = 'kode_brg';
 
$columns = array(
    array( 'db' => 'kode_brg','dt' => 0 ),
    array( 'db' => 'nama_brg','dt' => 1 ),
    array( 'db' => 'kategori','dt' => 2 ),
    array( 'db' => 'satuan', 'dt' => 3 ),
    array( 'db' => 'satuan', 'dt' => 4 ),
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'fathan_jaya',
    'host' => 'localhost'
);
require('ssp.class.php');
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>