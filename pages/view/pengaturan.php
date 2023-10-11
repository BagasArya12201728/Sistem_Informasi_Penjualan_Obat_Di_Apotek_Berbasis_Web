<?php 

if($_SESSION['level']!="Admin"){
  
  // header("location:../../error/page_403.html");  
echo "<META HTTP-EQUIV='Refresh'
CONTENT='0; URL=pages/error/index.html'>";
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


<style type="text/css">
#idform{
 padding-left: 20%;
 padding-right: 20%;
 font-size: 12px;
 margin-bottom: -10px;

}
</style>


     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengatuan</h6>
            </div>
            <div class="card-body">
              <h5 align="center"><b>Pengaturan Apotek</b></h5><hr>


                <form action="action/action.php?act=up-pengaturan" id="idform" class="form-horizontal form-label-left" method="post" >

              <?php $sql = $connect->query("SELECT * FROM data_apotek");

              while ($data = $sql->fetch_object()) { ?>
                            
                           <div class="col-md-8" style="">
                           <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Nama Apotek <span class="required"></span></label>
                            
                            <div class="col-md-12">
                            <input type="text" name="nama" value="<?= $data->nama ?>" style="font-size: 12px" class="form-control">
                        </div>
                        </div>
                        </div>

    
                           <div class="col-md-12">

                            <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name" style="font-size: 12px"> No. Telp <span class="required"></span></label>
                            
                            <div class="col-md-12">
                            <input type="text" id="first-name" name="telp" required="required"  value="<?= $data->telp ?>" class="form-control ">
                        </div>
                        </div>
                        </div>

                           <div class="col-md-12">

                            <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Alamat Apotek <span class="required"></span></label>
                            
                            <div class="col-md-12">
                              <textarea cols="40" name="alamat" required="required" class="form-control" style="font-size: 12px"><?= $data->alamat ?></textarea>
                        </div>
                        </div>
                        </div>

                           <div class="col-md-12">

                            <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Informasi <span class="required"></span></label>
                            
                            <div class="col-md-12">
                              <textarea cols="40" name="info" required="required" class="form-control" style="font-size: 12px"><?= $data->info ?></textarea>

                        </div>
                        </div>
                        </div>

                        <div class="col-md-12">
                        

                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Edit Data Obat</label><br>
                             <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-success">
                                <input type="radio" name="edit" id="status" autocomplete="off" value="buka"> Buka
                              </label>
                              
                              <label class="btn btn-success">
                                  <input type="radio" name="edit" id="status" autocomplete="off" value="tutup" > Tutup
                              </label>
                              </div>
                            </div>




                        <hr>
              <?php } ?>

                        <div class="text-center" >
                          <input type="submit" name="" class="btn btn-danger" value="Simpan Pembaruan">
                        </div><br>
                      </form>
 

              </div>
            </div>
          </div>
