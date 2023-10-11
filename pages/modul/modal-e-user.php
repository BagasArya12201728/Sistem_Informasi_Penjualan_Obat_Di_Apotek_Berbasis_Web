<?php

    include "../../config.php";


    if($_POST['idx']) {
        $kode = $_POST['idx'];      
        $sql = $connect->query("SELECT * FROM db_user WHERE username = '$kode' ");
        $result =$sql->fetch_object(); ?>

      <form method="POST" action="action/action?act=edit-user">
        <div class="form-group">
          <label for="exampleFormControlInput1">Username</label>
          <input type="text" class="form-control" name="user" readonly="" style="font-size: 12px" value="<?= $result->username ?>">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama</label>
          <input type="text" class="form-control" name="nama" style="font-size: 12px" value="<?= $result->nama ?>">
        </div>
        <div class="form-gr">
          <label for="exampleFormControlInput1">Level</label><br>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-success active">
          <input type="radio" name="level"  autocomplete="off" checked="" value="Admin"> Admin
          </label>
         <label class="btn btn-success">
          <input type="radio" name="level"  autocomplete="off" value="Apoteker" > Apoteker
        </label>
        </div>
        </div><br>
        <div class="form-group">
          <label for="exampleFormControlInput1">Password</label>
          <input type="password" class="form-control" name="pass" style="font-size: 12px" value="<?= $result->username ?>">
        </div>

          <!-- <input type="text" class="form-control" name="email" style="font-size: 12px"> -->
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea class="form-control"rows="3" name="alamat" style="font-size: 12px"><?= $result->alamat ?></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
      </div>
      </form>

<?php } ?>
