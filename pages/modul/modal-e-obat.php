<?php
    include "../../config.php";
    // $level = $_SESSION['username'];

session_start();
$level = $_SESSION['level'];
    


    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $sql = $connect->query("SELECT * FROM tb_obat WHERE kode = $id");
        while ($dt =$sql->fetch_object()){ $getsup = $dt->suplierid; 
		?>
      <form action="action/action?act=up-obat" style="font-size: 14px" method="POST" >
        <div class="row form-modal">
          <div class="col-md-2">
            <label for="exampleFormControlInput1">Kode obat</label>
            <input type="text" class="form-control" name="kode" style="font-size: 12px" value="<?= $dt->kode ?>"readonly>
          </div>
          <div class="col-md-10">
            <label for="exampleFormControlInput1">Nama obat</label>
            <input type="text" class="form-control" style="font-size: 12px" name="nama" value="<?= $dt->nama ?>">
          </div><p>
          <div class="col-md-12" style="padding-top: 10px">
        
            <label for="exampleFormControlInput1">Suplier</label>
            <select class="form-control" style="font-size: 12px" name="suplier">
            <?php $no=1;
                 $res = $connect->query('SELECT * FROM suplier'); 
                 while ($data = $res->fetch_object()) { ?>
                    <option <?php if($data->nama == $getsup){ echo 'selected'; } ?> ><?= $data->nama ?></option>
           <?php } ?> 
            </select>
          </div>
          <div class="col-md-6" style="padding-top: 10px">
            <label for="exampleFormControlInput1">Kategori</label>
            <select class="form-control select2" style="font-size: 12px" name="kategori">
              <?php $result = $connect->query('SELECT * FROM kategori');
                  while ($data = $result->fetch_object()) { ?> 
                    <option <?php if($data->nama == $dt->kategori ){ echo 'selected'; } ?> ><?= $data->nama ?></option>
             <?php } ?>
              
            </select>
          </div>
          <div class="col-md-6" style="padding-top: 10px">
            <label for="exampleFormControlInput1">Satuan</label>
            <select class="form-control select2" style="font-size: 12px" name="satuan">
              <?php $result = $connect->query('SELECT * FROM satuan');
                  while ($data = $result->fetch_object()) { ?>
                    <option <?php if($data->nama == $dt->satuan ){ echo 'selected'; } ?> ><?= $data->nama ?></option>
             <?php } ?>
            </select>

          </div>
          <hr width="100%" align="center" color="#0A1B2A">
          <div class="col-md-6">
            <label for="exampleFormControlInput1">Harga beli</label>
            <input type="text" class="form-control" onkeyup="convertToRupiah(this);" style="font-size: 12px" name="hbeli" value="<?= $dt->beli ?>">
          </div>
          <div class="col-md-6">
            <label for="exampleFormControlInput1">Harga jual</label>
            <input type="text" class="form-control" onkeyup="convertToRupiah(this);" style="font-size: 12px" name="hjual" value="<?= $dt->jual ?>">
          </div>
          <hr width="100%" align="center" color="#0A1B2A">
          <div class="col-md-6">
            <label for="exampleFormControlInput1">Expired</label>
            <input type="date" class="form-control" name="expired" style="font-size: 12px" value="<?= $dt->expired ?>">
          </div>
          <div class="col-md-6">
            <label for="exampleFormControlInput1">Stok</label>
            <input class="form-control" onkeyup="convertToRupiah(this);" style="font-size: 12px" name="stok" value="<?= $dt->stok ?>">
          </div>
          <hr width="100%" align="center" color="#0A1B2A">
        <?php if ($level == 'Admin') { ?>
          <div class="col-md-6">
            <!-- <?php echo $dt->status ?> -->
            <label for="exampleFormControlInput1">Status obat</label><br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label <?php if ($dt->status == 'aktif'){ echo 'class="btn btn-dark btn-sm active"';  } else echo 'class="btn btn-dark btn-sm"';  ?> >
                    <input type="radio" name="status" id="status" autocomplete="off" value="aktif" <?php if ($dt->status == 'aktif'){ echo 'checked'; } ?> > Aktif
                  </label>
                  <label <?php if($dt->status == 'tidak'){ echo 'class="btn btn-dark btn-sm active"';  }else echo 'class="btn btn-dark btn-sm"'; ?>>
                    <input type="radio" name="status" id="status" autocomplete="off" value="tidak" <?php if($dt->status == 'tidak'){ echo 'checked'; }   ?> > Non - Aktif
                  </label>
                </div>

            <!-- <input type="date" class="form-control" style="font-size: 12px" name="expire"> -->
          </div>


          <div class="col-md-6">
            <label for="exampleFormControlInput1">Edit</label><br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label <?php if($dt->edit == 'buka'){ echo 'class="btn btn-danger btn-sm active"';  } else echo 'class="btn btn-danger btn-sm"';  ?>>
                    <input type="radio" name="edit" id="option1" autocomplete="off" value="buka" <?php if($dt->edit == 'buka'){ echo 'checked'; } ?> > Buka
                  </label>
                  <label <?php if($dt->edit == 'tutup'){ echo 'class="btn btn-danger btn-sm active"';  } else echo 'class="btn btn-danger btn-sm"';  ?>>
                    <input type="radio" name="edit" id="option2" autocomplete="off" value="tutup" <?php if($dt->edit == 'tutup'){ echo 'checked'; } ?> > Tutup
                  </label>
                </div>
            </div>
        </div><br>
  
        <?php } ?>

      </div>
      

<?php 
$res  = $connect->query("SELECT edit AS edit FROM tb_obat WHERE kode = '$id'");
    $data = $res->fetch_object();
// echo $level;

if ($level != 'Admin') {

   if ($data->edit == 'buka') {
     echo'<div class="modal-footer"><button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary btn-sm">Simpan Data</button></div>';
    }else{
    echo"<div class='notice notice-danger' style='padding-left: 20px; padding-right : 20px;'><strong>Maaf</strong> status edit sedang mati silahkan hub owner !!!
    </div><br>";
    echo "<div class='modal-footer'><button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Close</button>
    <button type='submit' class='btn btn-primary btn-sm' disabled>Simpan Data</button></div>'";
    }
}elseif ($level == 'Admin') {
     echo'<div class="modal-footer"><button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button></div>';
 } ?>
      
        <!-- <br> -->
      </div>

      </form>

        <?php } }  ?>