<?php 

if($_SESSION['level']!="Admin" AND $_SESSION['level']!="Apoteker" ){
  
  // header("location:../../error/page_403.html");  
echo "<META HTTP-EQUIV='Refresh'
CONTENT='0; URL=pages/error/index.html'>";
}

?>
<?php $res = $connect->query('SELECT * FROM data_apotek');
      $sh  = $res->fetch_object() ?>

<?php if ($sh->so == 'Buka'): ?>
  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data obat</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div class="my-2"></div>
      <div class="container">
       <div class="form-group row">
    <label class="col-sm-2 col-form-label" style="text-align: right;">Pilih obat</label>
    <div class="col-md-8">
        <form action="?p=stok-opname" method="POST">
      <div class="input-group">
        <input class="form-control" id="skills" name="kode"  style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa fa-search"></span></button>
        </span>
      </form>
      </div>
    </div>
  </div>
  <hr>
  <?php if (isset($_POST['kode'])): 
      $val = $_POST['kode'];
      $kode = intval($val);

      $res = $connect->query("SELECT * FROM tb_obat WHERE kode = '$kode' ");
      $dt  = $res->fetch_object();
 
  ?>

         <div class="form-group row">
              <label class="col-sm-2" style="text-align: right;">Data obat</label>
              <div class="col-md-8">
                <!-- <input type="hidden" name="kode_obat" value="<?=  $kode ?>"> -->
                <input class="form-control"  value="<?= $val ?>" readonly style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
    
       <div class="row" >
        <div class="col-md-6">
          <form action="action/action.php?act=stok-opname" method="POST">
            <div class="col-md-12">
             <div class="form-group row">
              <label class="col-sm-4" style="text-align: right;">Stok obat</label>
              <div class="col-md-8">
                <input type="hidden" name="kode_obat" value="<?=  $kode ?>">
                <input class="form-control" name="bil1" value="<?= $dt->stok ?>" readonly style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
          </div>
            <div class="col-md-12">
             <div class="form-group row">
              <label class="col-sm-4" style="text-align: right;">Selisih</label>
              <div class="col-md-8">
                <input class="form-control" name="total" readonly style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
          </div>
      </div>
        <div class="col">
            <div class="col-md-12">
             <div class="form-group row">
              <label class="col-sm-4" style="text-align: right;">Stok nyata</label>
              <div class="col-md-8">
                <input class="form-control" autocomplete="off" name="bil2" style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
          </div>
            <div class="col-md-12">
             <div class="form-group row">
              <label class="col-sm-4" style="text-align: right;">Keterangan</label>
              <div class="col-md-8">
                <input class="form-control" name="ket" autocomplete="off" style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
          </div>
        </div>
      </div>
        <hr>
        <div align="center">
        <input type="submit" name="" value="Simpan data" class="btn btn-primary ">
        </form>          
       </div>
    
  <?php endif ?>
      </div>

      </div>
    </div>
  </div>

<!-- ----------------------------------------------------------------------------------------------------------------- -->

  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data obat</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div class="my-2"></div>
          <table id="dataTable" class="table"  width="100%" cellspacing="0" style="font-size: 12px">
            <thead>
              <tr>
                <th width="10px">No</th>
                <th style="text-align : center" width="130px">Waktu</th>
                <th style="text-align : center">Stok</th>
                <th style="text-align : center">Stok nyata</th>
                <th style="text-align : center">Selisih</th>
                <th style="text-align : center">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              
              <?php if (isset($_POST['kode'])): 
                  $val = $_POST['kode'];
                  $kode = intval($val);
              ?>
              <?php $no=1; $result = $connect->query("SELECT opnma.stok, nama, nyata, selisih, keterangan, waktu FROM opnma, tb_obat WHERE tb_obat.kode=opnma.kode_obat AND kode_obat= '$kode'");
              while ($data = $result->fetch_object()) {
              $tanggal = date('Y-m-d', strtotime($data->waktu));
              echo "<tr>
                      <td style='text-align : center'>$no</td>
                      <td style='text-align : center'>".tanggal_indo($tanggal, true)."</td>
                      <td style='text-align : center'>$data->stok</td>
                      <td style='text-align : center'>$data->nyata</td>
                      <td style='text-align : center'>$data->selisih</td>
                      <td style='text-align : center'>$data->keterangan</td>
                    </tr>";

                    $no++;

              } ?>
                
              <?php endif ?>

            </tbody>
          </table>
      </div>
    </div>
  </div>

  <!----------------------------------------------------------------------------------------------------------------- -->
  
<?php else: ?>

  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data obat</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div class="my-2"></div>
      <div class="container">
<div class='notice notice-danger' style='padding-left: 20px; padding-right : 20px;'><strong>Maaf</strong> Untuk saat stok opname belum bisa dilakukan
    </div><br>
       <div class="form-group row">
    <label class="col-sm-2 col-form-label" style="text-align: right;">Pilih obat</label>
    <div class="col-md-8">
        <form action="?p=stok-opname" method="POST">
      <div class="input-group">
        <input class="form-control"disabled  style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
        <span class="input-group-btn">
          <button type="submit" disabled="" class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa fa-search"></span></button>
        </span>
      </form>
      </div>
    </div>
  </div>
  <hr>
       <div class="row" >
        <div class="col-md-6">
          <form action="action/action.php?act=stok-opname" method="POST">
            <div class="col-md-12">
             <div class="form-group row">
              <label class="col-sm-4" style="text-align: right;">Stok obat</label>
              <div class="col-md-8">
                <input class="form-control" disabled style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
          </div>
            <div class="col-md-12">
             <div class="form-group row">
              <label class="col-sm-4" style="text-align: right;">Selisih</label>
              <div class="col-md-8">
                <input class="form-control" disabled style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
          </div>
      </div>
        <div class="col">
            <div class="col-md-12">
             <div class="form-group row">
              <label class="col-sm-4" style="text-align: right;">Stok nyata</label>
              <div class="col-md-8">
                <input class="form-control" autocomplete="off" disabled style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
          </div>
            <div class="col-md-12">
             <div class="form-group row">
              <label class="col-sm-4" style="text-align: right;">Keterangan</label>
              <div class="col-md-8">
                <input class="form-control" name="ket" disabled autocomplete="off" style="border-radius: 5px; font-size: 14px;">
              </div>
            </div>        
          </div>
        </div>
      </div>
        <hr>
        <div align="center">
        <input type="submit" name="" value="Simpan data" disabled class="btn btn-primary ">
        </form>          
       </div>
    
      </div>

      </div>
    </div>
  </div>

<!-- ----------------------------------------------------------------------------------------------------------------- -->

  <!----------------------------------------------------------------------------------------------------------------- -->
<?php endif ?>