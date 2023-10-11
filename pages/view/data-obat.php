<?php 

if($_SESSION['level']!="Admin" AND $_SESSION['level']!="Apoteker" ){
  
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




     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data obat</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                  <div class="my-2"></div>
                  <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter"> 
                    <span class="icon text-white-50">
                      <i class="fas fa-folder-open"></i>
                    </span>
                    <span class="text"></span><strong>Tambah data </strong>
                  </a></p>

                <table class="table" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px">
                  <thead>
                    <tr>
                      <th width="40px">Kode</th>
                      <th>Nama </th>
                      <th>Suplier</th>
                      <th>Kategori</th>
                      <th>Harga beli</th>
                      <th>Harga jual</th>
                      <th>Stok</th>
                      <th style="text-align : center" >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1;
                      $res = $connect->query('SELECT * FROM tb_obat'); 
                      while ($data = $res->fetch_object()) {                   
                        echo "<tr>
                          <td align=center>$no</td>
                          <td>$data->nama</td>
                          <td>$data->suplierid</td>
                          <td>$data->kategori</td>
                          <td>$data->beli</td>
                          <td>$data->jual</td>
                          <td>$data->stok</td>
                          <td>
                            <a href='action/action.php?act=del-obat&&kode=$data->kode' class='btn btn-danger btn-sm'  data-id=$data->kode><span class='fa fa-trash'></span> Hapus</a>
                            <a href='#edit_modal' class='btn btn-dark btn-sm' data-toggle='modal' data-id='$data->kode'><span class='fa fa-edit'></span> Ubah</a>
                          </td> 
                        </tr>"; 
                        $no++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<!-- Form Addd Karyawan -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-size: 20px">Form tambah Obat</h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="action/action?act=add-obat" style="font-size: 14px" method="POST">
        <div class="row form-modal">
          <?php 
            $result   = $connect->query('SELECT max(kode) AS kode FROM tb_obat');
            $execute  = $result->fetch_object();   
            $nums_row = $result->num_rows;
            

          ?>

          <div class="col-md-2">
            <label for="exampleFormControlInput1">Kode obat</label>
            <input type="text" class="form-control" style="font-size: 12px" value="<?= $execute->kode+1 ?>" readonly>
          </div>
          <div class="col-md-10">
            <label for="exampleFormControlInput1">Nama obat</label>
            <input type="text" class="form-control" style="font-size: 12px" name="nama">
          </div><p>
          <div class="col-md-12" style="padding-top: 10px">
            <label for="exampleFormControlInput1">Suplier</label>
            <select class="form-control" style="font-size: 12px" name="suplier">
            <?php $no=1;
                 $res = $connect->query('SELECT * FROM suplier'); 
                 while ($data = $res->fetch_object()) {   
                    echo"<option>$data->nama</option>";
            } ?> 
            </select>
          </div>
          <div class="col-md-6" style="padding-top: 10px">
            <label for="exampleFormControlInput1">Kategori</label>
            <select class="form-control select2" style="font-size: 12px" name="kategori">
              <?php $result = $connect->query('SELECT * FROM kategori');
                  while ($data = $result->fetch_object()) {
                    echo "<option>$data->nama</option>";
              } ?>
              
            </select>
          </div>
          <div class="col-md-6" style="padding-top: 10px">
            <label for="exampleFormControlInput1">Satuan</label>
            <select class="form-control select2" style="font-size: 12px" name="satuan">
              <?php $result = $connect->query('SELECT * FROM satuan');
                  while ($data = $result->fetch_object()) {
                    echo "<option>$data->nama</option>";
              } ?>
            </select>

          </div>
          <hr width="100%" align="center" color="#0A1B2A">
          <div class="col-md-6">
            <label for="exampleFormControlInput1">Harga beli</label>
            <input type="text" class="form-control" onkeyup="convertToRupiah(this);" style="font-size: 12px" name="hbeli">
          </div>
          <div class="col-md-6">
            <label for="exampleFormControlInput1">Harga jual</label>
            <input type="text" class="form-control" onkeyup="convertToRupiah(this);" style="font-size: 12px" name="hjual">
          </div>
          <hr width="100%" align="center" color="#0A1B2A">
          <div class="col-md-6">
            <label for="exampleFormControlInput1">Expired</label>
            <input type="date" class="form-control" style="font-size: 12px" name="expire">
          </div>
          <div class="col-md-6">
            <label for="exampleFormControlInput1">Stok</label>
            <input class="form-control" onkeyup="convertToRupiah(this);" style="font-size: 12px" name="stok">
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
      </div>
      </form>


    </div>
  </div>
</div>


 <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-size: 20px">Form edit obat</h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

           <div class="hasil-data"></div>


      </div>
    </div>
  </div>
</div>




  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#edit_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'pages/modul/modal-e-obat.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
