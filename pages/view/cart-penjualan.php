
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Detail Penjualan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div class="my-2"></div>
      <table class="data" style="font-size: 12px;">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th style="min-width: 250px">Nama Obat</th>
            <th>Harga</th>
            <th style=" text-align: center;">Qty</th>
            <th width="1px">Disc</th>
            <th>Subtotal</th>
            <th>Aksi</th>
          </tr>
        </thead>
          <?php
            $no=1;
            $result = $connect->query("SELECT * FROM temp");
            $nums   = $result->num_rows;

          ?>
        <tbody>
          <?php while ($data = $result->fetch_object()) {
            if ($nums > 0 ) {
              echo "
               <tr>
                <td align='center'>$no</td>
                <td>$data->nama</td>
                <td>Rp. ".number_format($data->harga).",-</td>
                <td align='center'>$data->qty</td>
                <td align='center' style='color : red'>$data->diskon%</td>
                <td>Rp. ".number_format($data->subtotal).",-</td>
                <td><a href='action/action?act=del-cart-penjualan&&data=$data->kode_obat' class='fa fa-trash'></a></td>
              </tr>";
            }else{
              echo "kosong";
            }


            $no++;

          } ?>


        </tbody>
      </table>

      </div>
    </div>
  </div>
