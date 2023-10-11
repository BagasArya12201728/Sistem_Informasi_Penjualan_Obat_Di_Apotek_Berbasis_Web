<?php

if($_SESSION['level']!="Admin" AND $_SESSION['level']!="Apoteker" ){

  // header("location:../../error/page_403.html");
echo "<META HTTP-EQUIV='Refresh'
CONTENT='0; URL=pages/error/index.html'>";
}
$date = date('ymd');
// echo "date : ". $date;

?>
<?php// var_dump("dfd"); exit();?>
  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data obat</h6>
  </div>
  <div class="card-body">
    <div class="my-2"></div>
    <form action="action/action?act=add-cart-penjualan" method="POST" name="form_penjualan">
      <div class="row">
        <div class="col-6">
          <div class="input-group">
            <?php if (isset($_GET['data'])): $data = $_GET['data']; $kodeobat = $_GET['kode']; ?>
              <input type="hidden" value="<?= $kodeobat ?>" name="obat-kode">
                <input class="form-control"  name="kode_obat" placeholder="Cari Obat Di Tombol Search" readonly="" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 12px;" value="<?= $data ?>">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 12px" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa fa-search"></span></button>
                </span>

            <?php else: ?>
                <input class="form-control"  placeholder="Cari Obat Di Tombol Search" readonly="" style="border-top-left-radius: 5px;border-bottom-left-radius: 5px; font-size: 12px;">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 12px" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa fa-search"></span></button>
                </span>
            <?php endif ?>
          </div>
        </div>
        <div class="col-2">
          <input type="number" min="0" name="qty"  required="required" class="form-control" placeholder="Qty" style="font-size: 12px">
        </div>
        <div class="col-2">
          <input type="number" min="0" name="diskon"  required="required" class="form-control" placeholder="disc"  style="font-size: 12px">
        </div>
        <div class="col-2">
          <button type="submit" class="btn btn-dark btn-sm" name="add-cart"  style="font-size: 12px"><span class="fa fa-shopping-cart "></span></button>
          <a href="" class="btn btn-success btn-sm"  style="font-size: 12px"><span class="fa fa-sync fa-spin "> </span></a>
        </div>
      </form>

      </div>
      <!-- </div> -->
    </div>
  </div>


 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Detail Penjualan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div class="my-2"></div>
      <table class="table" style="font-size: 12px;">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th style="min-width: 250px">Nama Obat</th>
            <th>Harga</th>
            <th width="1px" style=" text-align: center;">Qty</th>
            <th width="1px">Disc</th>
            <th>Subtotal</th>
            <th width="1px" align="center">Aksi</th>
          </tr>
        </thead>
          <?php
            $no=1;
            $result = $connect->query("SELECT * FROM temp");
            $nums   = $result->num_rows;
          ?>
        <tbody>
          <?php while ($data = $result->fetch_object()) {
              echo "
               <tr>
                <td align='center' style='background-color : #DCDCDC'>$no</td>
                <td>$data->nama</td>
                <td>Rp. ".number_format($data->harga).",-</td>
                <td align='center'>$data->qty</td>
                <td align='center' style='color : red; background-color : #DCDCDC'>$data->diskon%</td>
                <td>Rp. ".number_format($data->subtotal).",-</td>
                <td style='background-color : #DCDCDC; text-align : center;'><a href='action/action?act=del-cart-penjualan&&data=$data->kode_obat' class='fa fa-trash'></a></td>
              </tr>";
            $no++;
          } ?>

          <?php
            $result = $connect->query("SELECT SUM(subtotal) AS total FROM temp");
            $data   = $result->fetch_object();

          ?>

              <tr >
                <td colspan='5' style="color : red" align="center"><strong>Total Harga</strong></td>
                <td  style='color : red'><strong>Rp. <?= number_format($data->total) ?>,-</strong></td>
                <td></td>
              </tr>
              <tr>
                <td colspan="8"></td>
              </tr>
            </tbody>
          </table>
          <?php
    date_default_timezone_set("Asia/Jakarta");
          $sql = $connect->query("SELECT COUNT(id) AS count FROM Penjualan WHERE tgl = '". date('Y-m-d') ."' ");
          $dt  = $sql->fetch_object();

                $kode = date('ymhis');

              ?>
<!-- <h5 style="line-height: 0px; color : red;">Terbilang : <?= terbilang($data->total)?></h5> -->



<!-- <select id="select2" class="form-control">
  <option>indo</option>
  <option>malay</option>
</select>
 -->

          <div style="float: right; line-height: 1px">
            <form action="action/action.php?act=simpan-penjualan" class="form-horizontal form-label-left" method="post" style="font-size: 14px">

              <div class="form-group">
                <label class="control-label col-md-9 col-sm-3 col-xs-12" for="first-name"> Grand Total <span class="required"></span></label>
                  <div class="col-md-12">
                    <input type="text" name="input_total" id="input-total" required="required" class="form-control" style="color : red; font-size: 12px" readonly value=" "/>
                    <input type="hidden" name="kode_trans"  readonly value="<?php echo "$kode".$dt->count+1; ?>"/>

                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-9"> Bayar<span class="required"></span></label>
                  <div class="col-md-12" id="input">
                    <input type="text" name="input_bayar" autocomplete="off" id="input-bayar" required="required" class="form-control" style="color : red; font-size: 12px" />
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-9 col-sm-3 col-xs-12" for="first-name"> Kembali <span class="required"></span></label>
                  <div class="col-md-12">
                    <input type="text" name="input_kembali" id="input-kembali" required="required" class="form-control" readonly style="color : red; font-size: 12px"/>

                  </div>
              </div>

              <div class="control-label col-md-12 col-sm-3 col-xs-12" >
                <input class="btn btn-primary btn-sm" type="submit" name="nama" value="Simpan transaksi">
                <a href="transaksi.php"  class="btn btn-dark btn-sm"><span class=""></span>Kembali</a>
              </div>
            </form>

 <script>
 // memformat angka ribuan
function formatAngka(angka) {
 if (typeof(angka) != 'string') angka = angka.toString();
 var reg = new RegExp('([0-9]+)([0-9]{3})');
 while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
 return angka;
}

// nilai total ditulis langsung, bisa dari hasil perhitungan lain
var total = <?= $data->total ?>,
 bayar = 0;
 kembali = 0;

// masukkan angka total dari variabel
$('#input-total').val(formatAngka(total));

// tambah event keypress untuk input bayar
$('#input-bayar').on('keypress', function(e) {
 var c = e.keyCode || e.charCode;
 switch (c) {
  case 8: case 9: case 27: case 13: return;
  case 65:
   if (e.ctrlKey === true) return;
 }
 if (c < 48 || c > 57) e.preventDefault();
}).on('keyup', function() {
 var inp = $(this).val().replace(/\./g, '');

 // set nilai ke variabel bayar
 bayar = new Number(inp);
 $(this).val(formatAngka(inp));

 // set kembalian, validasi
 if (bayar > total) kembali = bayar - total;
 if (total > bayar) kembali = 0;
 $('#input-kembali').val(formatAngka(kembali));
});
</script>




<!--
    <script type="text/javascript">
      var totalNumber = 0;
$('[name="bil1"]').bind('keyup keypress', function () {
    var nilai = parseInt($(this).val());
     var bil2 = parseInt($('[name="bil2"]').val());
        if (!isNaN(nilai) && !isNaN(bil2)) {
        totalNumber = nilai + bil2;
        $('[name="total"]').val(totalNumber);
    }
})

$('[name="bil2"]').bind('keyup keypress', function () {
    var nilai = parseInt($(this).val());
    var bil1 = parseInt($('[name="bil1"]').val());
        if (!isNaN(nilai) && !isNaN(bil1)) {
        totalNumber = nilai + bil1;
        $('[name="total"]').val(totalNumber);
    }
})


    </script>
 -->

        </div>
      </div>
    </div>
  </div>



  <!----------------------------------------------------------------------------------------------------------------- -->

<!-- modal view data obat ------------------------------------------------------------------------------------------- -->
     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="font-size: 10px">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-body">
                      <table id="list-jual" class="table" width="100%" >
                        <thead>
                          <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Suplier</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Edit</th>
                            <th>Stok</th>
                          </tr>
                        </thead>
                     <tbody>

                    </tbody>
                  </table>
                      </div>
                    </div>
                  </div>
                  </div>
<!-- end view data obat --------------------------------------------------------------------------------------------- -->
