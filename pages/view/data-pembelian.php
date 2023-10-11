<?php 

if($_SESSION['level']!="Admin" AND $_SESSION['level']!="Apoteker" ){
  
  // header("location:../../error/page_403.html");  
echo "<META HTTP-EQUIV='Refresh'
CONTENT='0; URL=?p=404.php'>";
}

?>
<?php
if (isset($_GET['status'])) {
  $get_stat = $_GET['status'];
  if ($get_stat=='sukses') {
    echo '    <div class="alert alert-success alert-white rounded">
        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
        <div class="icon">
            <i class="fa fa-check"></i>
        </div>
        <strong>Success!</strong> 
    </div>';
  
  }elseif ($get_stat=='gagal') {
    echo '    <div class="alert alert-danger alert-white rounded">
        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
        <div class="icon">
            <i class="fa fa-times-circle"></i>
        </div>
        <strong>Gagal!</strong> 
        
    </div>    
';
  } 

} ?>



     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pembelian</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                  <div class="my-2"></div>
                  <a href="?p=form-pembelian" class="btn btn-dark btn-sm"><span class="icon text-white-50"><i class="fas fa-folder-open"></i></span><span class="text"></span><strong>Tambah data </strong></a><p />

                  <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="100px" height="">No. Struk</th>
                      <th>Hari / tanggal </th>
                      <th>Total</th>
                      <th>Tunai</th>
                      <th>Kembali</th>
                      <th style="text-align : center">Apoteker</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="100px" height="">No. Struk</th>
                      <th>Hari / Tanggal</th>
                      <th>Total</th>
                      <th>Total Bayar</th>
                      <th>kembali</th>
                      <th style="text-align : center">Apoteker</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $no=1;
                      $res = $connect->query('SELECT * FROM pembelian'); 
                      while ($data = $res->fetch_object()) {                   
                        echo "<tr>
                          <td align=center>$data->id</td>
                          <td>$data->tgl</td>
                          <td>$data->total_harga</td>
                          <td>$data->total_bayar</td>
                          <td>$data->kembali</td>
                          <td>$data->kasir</td>
                        </tr>"; 
                        $no++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          

