<?php 

if($_SESSION['level']!="Admin" AND $_SESSION['level']!="Apoteker" ){
  
  // header("location:../../error/page_403.html");  
echo "<META HTTP-EQUIV='Refresh'
CONTENT='0; URL=pages/error/index.html'>";
}

?>


<div class="row">
  <div class="col-sm-8">
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
              <h6 class="m-0 font-weight-bold text-primary">Data kategori</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table " id="dataTable" width="100%" cellspacing="0" style="font-size: 12px">
                  <thead>
                    <tr>
                      <th width="10px">No</th>
                      <th style="text-align: center">Kode</th>
                      <th style="text-align: center">Nama kategori</th>
                      <th style="text-align: center" >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                    $res = $connect->query('SELECT * FROM kategori'); 
                    while ($data = $res->fetch_object()) {                   
                    echo "<tr>
                      <td align='center'>$no</td>
                      <td align=center>BP-0$data->kode</td>
                      <td align=center>$data->nama</td>
                      <td align=center>
                        <a href='action/action.php?kode=$data->kode&&act=del-kategori' class='btn btn-danger btn-sm'><span class='fa fa-trash'> hapus</span></a>
                        <a href='?p=kategori&&kode=$data->kode' class='btn btn-primary btn-sm'><span class='fa fa-edit'> ubah</span></button>
                      </td>
                    </tr>";
                    $no++;
                  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  </div>
  <div class="col-sm-4">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form kategori</h6>
            </div>
            <div class="card-body">
              <?php 
                $result   = $connect->query('SELECT MAX(kode) AS kode FROM kategori');
                $execute  = $result->fetch_object();   
                // $nums_row = $result->num_rows;
              ?>



<?php  if (isset($_GET['kode'])): $getdata = $_GET['kode']; ?>

              <?php 
                $result   = $connect->query("SELECT * FROM kategori WHERE kode = '$getdata' ");
                $ex       = $result->fetch_object();   
                // $nums_row = $result->num_rows;
              ?>
                <form method="POST" action="action/action?act=up-kategori" style="font-size: 12px">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Kode kategori</label>
                    <input type="text" class="form-control" name="kode" value="<?= $ex->kode ?>" readonly=""  style="font-size: 12px">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama kategori</label>
                    <input type="text" class="form-control" value="<?= $ex->nama ?>" style="font-size: 12px" name="nama">
                  </div>
                  <button type="submit" class="btn btn-dark btn-sm" ><span class="fa fa-save"></span> Simpan</button>

                </form>


<?php else: ?>
  

                <form method="POST" action="action/action?act=add-kategori" style="font-size: 12px">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Kode kategori</label>
                    <input type="text" class="form-control" value="<?= $execute->kode+1 ?>" readonly="" style="font-size: 12px">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nama kategori</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" style="font-size: 12px" name="nama">
                  </div>
                  <button class="btn btn-dark btn-sm" ><span class="fa fa-save"></span> Simpan</button>

                </form>

<?php endif ?>



            </div>
          </div>
  </div>
</div>

