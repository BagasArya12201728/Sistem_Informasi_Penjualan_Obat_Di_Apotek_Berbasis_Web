<?php

    include "../../config.php";


    if($_POST['idx']) {
        $kode = $_POST['idx'];      
        $sql = $connect->query("SELECT * FROM suplier WHERE kode = $kode");
        $result =$sql->fetch_object(); ?>

        <form action="action/action.php?act=up-sup" method="post">

          <label for="exampleFormControlInput1">Kode suplier</label>
          <input type="text" name="kode" class="form-control" style="font-size: 12px" value="<?= $result->kode ?>" readonly>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama suplier</label>
          <input type="text" class="form-control" name="nama" style="font-size: 12px" value="<?= $result->nama ?>">
        <div class="form-group">
          <label for="exampleFormControlInput1">Lokasi</label>
          <input type="text" class="form-control" name="lokasi" style="font-size: 12px" value="<?= $result->kota ?>">
        <div class="form-group">
          <label for="exampleFormControlInput1">Telp</label>
          <input type="text" class="form-control" name="telp" style="font-size: 12px" value="<?= $result->telp ?>">
        <div class="form-group">
          <label for="exampleFormControlInput1">Email</label>
          <input type="text" class="form-control" name="email" style="font-size: 12px" value="<?= $result->email ?>">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea class="form-control"rows="3" name="alamat" style="font-size: 12px"><?= $result->alamat ?></textarea>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="modal-footer"><button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary btn-sm">Simpan Data</button></div>

        </form>     

<?php } ?>
