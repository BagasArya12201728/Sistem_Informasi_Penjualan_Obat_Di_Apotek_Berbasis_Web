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
              <h6 class="m-0 font-weight-bold text-primary">Data suplier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                  <div class="my-2"></div>
                  <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter"> 
                    <span class="icon text-white-50">
                      <i class="fas fa-folder-open"></i>
                    </span>
                    <span class="text"></span><strong>Tambah data </strong>
                  </a><p />

                <table class="table" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px" >
                  <thead>

                    <tr>
                      <th width=3px>No</th>
                      <!-- <th width=10px>Kode</th> -->
                      <th>Nama </th>
                      <th>Lokasi</th>
                      <th>Telp</th>
                      <th>Email</th>
                      <th width="200px">Alamat</th>
                      <th style="text-align : center" width="140">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;
                      $res = $connect->query('SELECT * FROM suplier'); 
                      while ($data = $res->fetch_object()) {                   
                        echo "<tr>
                          <td align=center>$no</td>
                          <td>$data->nama</td>
                          <td>$data->kota</td>
                          <td>$data->telp</td>
                          <td>$data->email</td>
                          <td>$data->alamat</td>
                          <td>
                            <a href='action/action.php?act=del-sup&&kode=$data->kode' class='btn btn-danger btn-sm'  data-id=$data->kode><span class='fa fa-trash'></span> Hapus</a>
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


 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Form tambah suplier</h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <form method="POST" action="action/action?act=add-sup">
        <div class="form-group">
          <?php 
            $result   = $connect->query('SELECT MAX(kode) AS kode FROM suplier');
            $execute  = $result->fetch_object();   
            // $nums_row = $result->num_rows;
          ?>

          <label for="exampleFormControlInput1">Kode suplier</label>
          <input type="text" class="form-control" style="font-size: 12px" value="<?= $execute->kode+1 ?>" readonly>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama suplier</label>
          <input type="text" class="form-control" name="nama" style="font-size: 12px">
        <div class="form-group">
          <label for="exampleFormControlInput1">Lokasi</label>
          <input type="text" class="form-control" name="lokasi" style="font-size: 12px">
        <div class="form-group">
          <label for="exampleFormControlInput1">Telp</label>
          <input type="text" class="form-control" name="telp" style="font-size: 12px">
        <div class="form-group">
          <label for="exampleFormControlInput1">Email</label>
          <input type="text" class="form-control" name="email" style="font-size: 12px">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea class="form-control"rows="3" name="alamat" style="font-size: 12px"></textarea>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end Add Karyawan -->




 <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Form edit suplier</h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >

     <div class="hasil-data"></div>

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
                url : 'pages/modul/modal-e-sup.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
