     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lap Stok Obat</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive"><br>
                <h4 style="font-size: 24px; font-weight: bold;  text-align: center;"><strong>Laporan Stok</strong></h4>
                <?php $date = date('Y-m-d'); ?>
                <h5 style="font-size: 18px; font-weight: bold;  text-align: center;">Priode : <?php echo tanggal_indo($date, true); ?></h5>
                <br>


                <?php $result = $connect->query("SELECT * FROM tb_obat ORDER BY stok ASC limit 1000"); ?>

                <table class="table" id="tablestok"  width="100%" cellspacing="0" style="font-size: 12px">
                  <thead>
                    <tr>
                      <th width="2%">No</th>
                      <th width="9%">Kode</th>
                      <th width="40%">Nama</th>
                      <th width="12%">Kategori</th>
                      <th width="10%">Satuan</th>
                      <th width="10%">Stok</th>
                      <!-- <th width="20%">Status</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; while ($data = $result->fetch_object()) {

                      echo '
                        <tr>
                          <td>'.$no++.'</td>
                          <td>'.$data->kode.'</td>
                          <td>'.$data->nama.'</td>
                          <td>'.$data->kategori.'</td>
                          <td>'.$data->satuan.'</td>
                          <td>'.$data->stok.'</td>
                        </tr>
                      ';

                    } ?>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
