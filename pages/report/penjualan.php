<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Laporan Penjualan</h5>
  </div><br>
  <div class="card-body" >
      <!-- <h5><b>Filter Sesuai Priode : </b></h5> -->
      <form action="#"  method="POST">

        <?php if(isset($_POST['cari'])){ ?>
        <div class="form-group sembunyikan"  id="data-shift">
          <label class="control-label col-md-2 col-sm-3 col-xs-12"> Pilih Apoteker <span class="required" ></span></label>
          <div class="col-md-5 col-sm-6 col-xs-12">
              <select class="form-control" name="apoteker" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
                <option disabled="" selected="">Pilih Salah Satu</option>
            <?php $sql = $connect->query("SELECT * FROM db_user");
                  while($data = $sql->fetch_object()) { ?>
                      <option><?= $data->username ?></option>
            <?php } ?>

              </select>
          </div>
        </div>

      
      <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Mulai <span class="required" ></span></label>
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group">
              <?php $date  = date('Y-m-01'); ?>
              
              <input type="date" value="<?php echo $_POST['awal'] ?>" class="form-control" name="awal" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
              <span class="input-group-btn">
                <div  class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px"><span class="fa fa-calendar"></span>
                </div>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Mulai <span class="required" ></span></label>
              <?php 
                $calender = CAL_GREGORIAN;
                $bulan = date('m');
                $thn   = date('Y');
                $total =  cal_days_in_month($calender, $bulan, $thn);


                $date1 = date('Y-m-'.$total);

               ?>
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group">
              <input type="date" class="form-control" value="<?php echo $_POST['akhir'] ?>" name="akhir" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
              <span class="input-group-btn">
                <div  class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px"><span class="fa fa-calendar">
                </div> 
                <button type="submit" name='cari' class="btn btn-danger btn-sm" name="" style="font-size: 16px"><span class="fa fa-search"> Cari Data</span></button></span></span><span>
              </span> 
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="padding-left: 25px" >
          <input type="checkbox"  href="#" id="clicksift"> Tampilkan apoteker</a>
      </div>
      </div>

        <?php }else {?>

        <div class="form-group sembunyikan"  id="data-shift">
          <label class="control-label col-md-2 col-sm-3 col-xs-12"> Pilih Apoteker <span class="required" ></span></label>
          <div class="col-md-5 col-sm-6 col-xs-12">

              <select class="form-control" name="apoteker" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
                <option disabled="" selected="">Pilih Salah Satu</option>
                <?php $qr = $connect->query("SELECT * FROM db_user");
                while ($exec = $qr->fetch_object()) {echo'
                <option>'.$exec->username.'</option>';
                } ?>
              </select>
          </div>
        </div>

      
      <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Mulai <span class="required" ></span></label>
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group">
              <?php $date  = date('Y-m-01'); ?>
              
              <input type="date" value="<?php echo $date ?>" class="form-control" name="awal" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
              <span class="input-group-btn">
                <div  class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px"><span class="fa fa-calendar"></span>
                </div>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Mulai <span class="required" ></span></label>
              <?php 
                $calender = CAL_GREGORIAN;
                $bulan = date('m');
                $thn   = date('Y');
                $total =  cal_days_in_month($calender, $bulan, $thn);


                $date1 = date('Y-m-'.$total);

               ?>
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group">
              <input type="date" class="form-control" value="<?php echo $date1; ?>" name="akhir" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
              <span class="input-group-btn">
                <div  class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px"><span class="fa fa-calendar">
                </div> 
                <button type="submit" name='cari' class="btn btn-danger btn-sm" name="" style="font-size: 16px"><span class="fa fa-search"> Cari Data</span></button></span></span><span>
              </span> 
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="padding-left: 25px" >
          <input type="checkbox"  href="#" id="clicksift"> Tampilkan apoteker</a>
      </div>
      </div>

    <?php } ?>
      <hr>
      </form>

      <div style="padding-top: 20px;color : black;" >
        <?php if (isset($_POST['cari'])) { $awal = $_POST['awal']; $akhir = $_POST['akhir'];
            if (empty($_POST['apoteker'])){ echo'
                <h4 class="text-center">Laporan Penjualan</h4>
                <h5 class="text-center" style="font-size:14px">'. tgl_indo($_POST["awal"]) .' - '. tgl_indo($_POST['akhir']) .' </h5>'; 
        ?>

                  <table class="table table-keytable" style="font-size: 12px">
                  <thead>
                  </thead>
                      <tbody>
                        <?php $no=1;
                              $query1 = $connect->query("SELECT * FROM penjualan WHERE tgl BETWEEN '$awal' AND '$akhir' ");
                              while ($p = $query1->fetch_object()) { $a = $p->id; 
                        ?>
                        
                        <tr>
                          <td rowspan="4" colspan="4"><h4>NO : <?= $no++; ?> </h4></td>
                        </tr>
                        <tr bgcolor="#DCDCDC">
                          <td colspan="1">No Faktur</td>
                          <td>: <?= $p->id ?></td>
                        </tr>
                        <tr bgcolor="#DCDCDC">
                          <td colspan="1">Pembeli</td>
                          <td>: <?= $p->customer ?></td>
                        </tr>
                        <tr bgcolor="#DCDCDC">
                          <td  colspan="1">Tgl</td>
                          <td>: <?= tgl_indo($p->tgl) ?></td>
                      </tr>
                      <tr bgcolor="#2F4F4F" style="color : white">
                        <td width="10%">Kode</td>
                        <td width="40%">Nama Obat</td>
                        <td width="15%">Harga</td>
                        <td width="10%">Qty</td>
                        <td width="10%">Diskon</td>
                        <td width="20%">Subtotal</td>
                      </tr>
                      <?php $sql = $connect->query("SELECT * FROM detail, tb_obat WHERE tb_obat.kode = detail.kode_obat AND id='$a'");
                            while ($dt = $sql->fetch_object()){ ?>
                      <tr style="color : red">
                        <td><?= $dt->kode ?></td>
                        <td><?= $dt->nama ?></td>
                        <td><?= number_format($dt->harga) ?></td>
                        <td><?= $dt->qty ?></td>
                        <td><?= $dt->diskon ?></td>
                        <td><?= number_format($dt->subtotal) ?></td>

                      </tr>

                      <?php } ?>
                  <?php $que = $connect->query("SELECT total_harga, kembali, total_bayar FROM penjualan WHERE id = '$a' ");
                          $e = $que->fetch_object();
                  ?>
                    <tr bgcolor="#DCDCDC">
                      <td colspan="4" rowspan="3"></td>
                      <td >Total Harga</td>
                      <td style="color : red"><b> : Rp. <?php echo number_format($e->total_harga) ?></b>,-</td>
                    </tr>
                    <tr bgcolor="#DCDCDC">
                      <td>Total Bayar</td>
                      <td> : Rp. <?php echo number_format($e->total_bayar) ?>,-</td>
                    </tr>
                    <tr bgcolor="#DCDCDC">
                      <td>Kembali</td>
                      <td> : Rp. <?php echo number_format($e->kembali) ?>,-</td>
                    </tr>

                    <tr>
                      <td height="40px" colspan="6" ></td>
                    </tr>
                    <tr>
                  <?php } ?>
                     <tr>
                  <?php $quer = $connect->query("SELECT SUM(total_harga) total FROM penjualan WHERE tgl BETWEEN '$awal' AND '$akhir'"); 
                          $q  = $quer->fetch_object();
                  ?>
                     <td colspan="6" align="right"><h4 style="font-size: 18px"><b style="color : black">Total Penjualan Bulan Ini : Rp. <?php echo number_format($q->total) ?>,-</b></h4></td>
                     </tr>
                  </tbody>
                </table>

                  <?php }elseif ($_POST['apoteker']) { $kasir = $_POST['apoteker'];  echo '
                <h4 class="text-center">Laporan Penjualan</h4>
                <h5 class="text-center" style="font-size:14px">'. tgl_indo($_POST["awal"]) .' - '. tgl_indo($_POST['akhir']) .' </h5> 
                <h5 class="text-center" style="font-size:14px">Apoteker : '. $_POST["apoteker"] .' </h5>'; 

                   ?>

                  <table class="table table-keytable" style="font-size: 12px">
                  <thead>
                  </thead>
                      <tbody>
                        <?php $no=1;
                              $query1 = $connect->query("SELECT * FROM penjualan WHERE tgl BETWEEN '$awal' AND '$akhir' AND kasir = '$kasir' ORDER BY tgl ASC ");
                              while ($p = $query1->fetch_object()) { $a = $p->id; 
                        ?>
                        
                        <tr>
                          <td rowspan="4" colspan="4"><h4>NO : <?= $no++; ?> </h4></td>
                        </tr>
                        <tr bgcolor="#DCDCDC">
                          <td colspan="1">No Faktur</td>
                          <td>: <?= $p->id ?></td>
                        </tr>
                        <tr bgcolor="#DCDCDC">
                          <td colspan="1">Pembeli</td>
                          <td>: <?= $p->customer ?></td>
                        </tr>
                        <tr bgcolor="#DCDCDC">
                          <td  colspan="1">Tgl</td>
                          <td>: <?= tgl_indo($p->tgl) ?></td>
                      </tr>
                      <tr bgcolor="#2F4F4F" style="color : white">
                        <td width="10%">Kode</td>
                        <td width="40%">Nama Obat</td>
                        <td width="15%">Harga</td>
                        <td width="10%">Qty</td>
                        <td width="10%">Diskon</td>
                        <td width="20%">Subtotal</td>
                      </tr>
                      <?php $sql = $connect->query("SELECT * FROM detail, tb_obat WHERE tb_obat.kode = detail.kode_obat AND id='$a'");
                            while ($dt = $sql->fetch_object()){ ?>
                      <tr style="color : red">
                        <td><?= $dt->kode ?></td>
                        <td><?= $dt->nama ?></td>
                        <td><?= number_format($dt->harga) ?></td>
                        <td><?= $dt->qty ?></td>
                        <td><?= $dt->diskon ?></td>
                        <td><?= number_format($dt->subtotal) ?></td>

                      </tr>

                      <?php } ?>
                  <?php $que = $connect->query("SELECT total_harga, kembali, total_bayar FROM penjualan WHERE id = '$a' AND kasir = '$kasir' ");
                          $e = $que->fetch_object();
                  ?>
                    <tr bgcolor="#DCDCDC">
                      <td colspan="4" rowspan="3"></td>
                      <td >Total Harga</td>
                      <td style="color : red"><b> : Rp. <?php echo number_format($e->total_harga) ?></b>,-</td>
                    </tr>
                    <tr bgcolor="#DCDCDC">
                      <td>Total Bayar</td>
                      <td> : Rp. <?php echo number_format($e->total_bayar) ?>,-</td>
                    </tr>
                    <tr bgcolor="#DCDCDC">
                      <td>Kembali</td>
                      <td> : Rp. <?php echo number_format($e->kembali) ?>,-</td>
                    </tr>

                    <tr>
                      <td height="40px" colspan="6" ></td>
                    </tr>
                    <tr>
                  <?php } ?>
                     <tr>
                  <?php $quer = $connect->query("SELECT SUM(total_harga) total FROM penjualan WHERE tgl BETWEEN '$awal' AND '$akhir' AND kasir = '$kasir' "); 
                          $q  = $quer->fetch_object();
                  ?>
                     <td colspan="6" align="right"><h4 style="font-size: 18px"><b style="color : black">Total Penjualan Bulan Ini : Rp. <?php echo number_format($q->total) ?>,-</b></h4></td>
                     </tr>
                  </tbody>
                </table>                  
                  <?php } ?>

              <?php } ?>

<!--                      <a href="l-jual-print.php?awal=<?php echo $tgl_awal ?>&&akhir=<?php echo $tgl_akhir ?>"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-print"> </span> Cetak Laporan</a>
 -->
              <? } ?>






      </div>


    

  </div>
</div>