<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Laporan Penjualan</h5>
  </div><br>
  <div class="card-body" >
      <!-- <h5><b>Filter Sesuai Priode : </b></h5> -->
      <form action="#"  method="POST">    
      <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Mulai <span class="required" ></span></label>
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group">
              <?php $date  = date('Y-m-01'); ?>
              <?php if (isset($_POST['cari'])) { ?>
              <input type="date" value="<?php echo $_POST['awal'] ?>" class="form-control" name="awal" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
              <span class="input-group-btn">
                <div  class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px"><span class="fa fa-calendar"></span>
                </div>
              </span>
              <?php }else { ?>
              <input type="date" value="<?php echo $date ?>" class="form-control" name="awal" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;">
              <span class="input-group-btn">
                <div  class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px"><span class="fa fa-calendar"></span>
                </div>
              </span>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name"> Tanggal Akhir <span class="required" ></span></label>
              <?php 
                $calender = CAL_GREGORIAN;
                $bulan = date('m');
                $thn   = date('Y');
                $total =  cal_days_in_month($calender, $bulan, $thn);


                $date1 = date('Y-m-'.$total);

               ?>
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group">

              <?php if (isset($_POST['cari'])) { ?>
              <input type="date" class="form-control" value="<?php echo $_POST['akhir'] ?>" name="akhir" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;"> 
              <span class="input-group-btn">
                <div  class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px"><span class="fa fa-calendar">
              <?php }else { ?>
              <input type="date" class="form-control" value="<?php echo $date1 ?>" name="akhir" style="border-top-left-radius :  5px; border-bottom-left-radius :  5px; font-size: 14px;"> 
              <span class="input-group-btn">
                <div  class="btn btn-primary" style="border-bottom-right-radius : 5px; border-bottom-left-radius : 0px;border-top-left-radius : 0px; font-size: 14px"><span class="fa fa-calendar">
                <?php } ?>
                </div> 
                <button type="submit" name='cari' class="btn btn-danger btn-sm" name="" style="font-size: 16px"><span class="fa fa-search"> Cari Data</span></button></span></span><span>
              </span> 
          </div>
          </div>
        </div>
      </div>
      </div>
      <hr>
      
      </form>
       <?php if (isset($_POST['cari'])) { $awal = $_POST['awal']; $akhir = $_POST['akhir'];
                echo'
                   <h4 class="text-center">Laporan Statistik Penjualan</h4>
                   <h5 class="text-center" style="font-size:14px">'. tgl_indo($_POST["awal"]) .' - '. tgl_indo($_POST['akhir']) .' </h5>'; 
        ?>
        <?php 
        $nama    = $connect->query("SELECT nama FROM statis_lap WHERE tgl BETWEEN '$awal' AND '$akhir' "); 
        $jumlah  = $connect->query("SELECT jumlah FROM statis_lap WHERE tgl BETWEEN '$awal' AND '$akhir' "); 
        ?>

        <div class="container">
            <canvas id="myChart" height="120"></canvas>
        </div>


        <table class="table" id="datatable" style="font-size: 12px">
          <thead>
            <tr>
              <th width="2%"> No </th>
              <th width="9%"> Kode Obat </th>
              <th width="50%"> Nama Obat </th>
              <th width="12%">Jumlah Transaksi</th>
              <th width="10%">Jumlah Terjual</th>
            </tr>
          </thead>
          <tbody>
          <?php 

            $no=1;
            $sql = $connect->query("SELECT * FROM statis_lap WHERE tgl BETWEEN '$awal' AND '$akhir' ORDER BY jumlah DESC");
            while ($dt = $sql->fetch_object()) { 
              echo '     
                <tr>
                  <td align="center">'.$no++.'</td> 
                  <td>'.$dt->kode.'</td> 
                  <td>'.$dt->nama.'</td> 
                  <td align="center">'.$dt->total_terjual.'</td> 
                  <td align="center">'.$dt->jumlah.'</td> 
                </tr>';
          } ?>
          </tbody>

            

        </table>


      <?php } ?>





      </div>

  </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = $nama->fetch_object()) { echo '"' . $b->nama . '",';}?>],
                    datasets: [{
                            label: 'Total Penjualan',
                            data: [<?php while ($p = $jumlah->fetch_object()) { echo '"' . $p->jumlah . '",';}?>],
                            backgroundColor:
                                'rgba(255, 99, 132, 0.2)',
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                },
                                gridLines: {
                                  color: "rgb(234, 236, 244)",
                                  zeroLineColor: "rgb(234, 236, 244)",
                                  drawBorder: false,
                                  borderDash: [2],
                                  zeroLineBorderDash: [2]
                                }
                              }]
                            },            
                            legend: {
                              display: false
                            }

                         }
             });
        </script>
