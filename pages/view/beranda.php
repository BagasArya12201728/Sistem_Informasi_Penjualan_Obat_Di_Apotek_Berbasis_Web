<?php
// FUNGSI BULAN DALAM BAHASA INDONESIA
function bulan($bln){
$bulan = $bln;
Switch ($bulan){
 case 1 : $bulan="Januari";
 Break;
 case 2 : $bulan="Februari";
 Break;
 case 3 : $bulan="Maret";
 Break;
 case 4 : $bulan="April";
 Break;
 case 5 : $bulan="Mei";
 Break;
 case 6 : $bulan="Juni";
 Break;
 case 7 : $bulan="Juli";
 Break;
 case 8 : $bulan="Agustus";
 Break;
 case 9 : $bulan="September";
 Break;
 case 10 : $bulan="Oktober";
 Break;
 case 11 : $bulan="November";
 Break;
 case 12 : $bulan="Desember";
 Break;
 }
return $bulan;
}

//CARA MEMANGGIL FUNGSI BULAN

// $bulan = bulan(date("m"));
// echo $bulan;
?>
<?php

$user = $_SESSION['username'];
// echo $user;
$thn = date('Y');
$bln = date('m');

if ($_SESSION['level']=='Admin') {

$bulan = $connect->query("SELECT MONTH(tgl) AS bulan FROM  penjualan WHERE YEAR(tgl)='$thn'  GROUP BY MONTH(tgl)"); 
$penghasilan = $connect->query("SELECT SUM(total_harga) AS total_penjualan FROM  penjualan WHERE YEAR(tgl)='$thn' GROUP BY MONTH(tgl)"); 

}else{

$bulan = $connect->query("SELECT MONTH(tgl) AS bulan FROM  penjualan WHERE kasir='$user' AND YEAR(tgl)='$thn' GROUP BY MONTH(tgl)"); 
$penghasilan = $connect->query("SELECT SUM(total_harga) AS total_penjualan FROM  penjualan WHERE kasir='$user' AND YEAR(tgl)='$thn' GROUP BY MONTH(tgl)");  

} ?>
<!-- // $bulan       = mysqli_query($koneksi, "SELECT bulan FROM penjualan WHERE tahun='2016' order by id asc"); -->
<!-- // $bulan = $connect->query("SELECT MONTH(tgl) AS bulan FROM  penjualan WHERE kasir='".$_SESSION['username']."' AND tgl LIKE '%2019%' GROUP BY MONTH(tgl)");  -->

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary  mb-3">Penjualan Anda Hari Ini</div>
                      <?php if ($_SESSION['level']=='Admin') {
                         $sql = $connect->query("SELECT SUM(total_harga) AS total FROM penjualan WHERE tgl=CURDATE()");
                      } else {
                         $sql = $connect->query("SELECT SUM(total_harga) AS total FROM penjualan WHERE kasir = '$user' AND tgl=CURDATE()");
                      }
                            $dt  = $sql->fetch_object(); { echo ' 
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. '.number_format($dt->total).' </div>'; } ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary mb-3">Penjualan Anda Bulan Ini</div>
                      <?php 
                        if ($_SESSION['level']=='Admin') {
                      $sql = $connect->query("SELECT CONCAT(YEAR(tgl),'/',MONTH(tgl)) AS tahun_bulan, SUM(total_harga) AS total FROM penjualan WHERE CONCAT(YEAR(tgl),'/',MONTH(tgl))=CONCAT(YEAR(NOW()),'/',MONTH(NOW())) GROUP BY YEAR(tgl),MONTH(tgl)");

                        } else {
                          # code...
                      $sql = $connect->query("SELECT CONCAT(YEAR(tgl),'/',MONTH(tgl)) AS tahun_bulan, SUM(total_harga) AS total FROM penjualan WHERE CONCAT(YEAR(tgl),'/',MONTH(tgl))=CONCAT(YEAR(NOW()),'/',MONTH(NOW())) AND kasir = '$user' GROUP BY YEAR(tgl),MONTH(tgl)");
                        }
                        

                        $data = $sql->fetch_object();
                      
                      { echo '
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. '.number_format($dt->total).'</div>'; } ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary mb-3">Kadaluarsa Bulan Ini</div>
                      <?php $tgl = date('m'); $thn = date('Y'); 
                            $sql  = $connect->query("SELECT COUNT(kode) AS total FROM tb_obat WHERE MONTH(expired) = '$tgl' AND YEAR(expired)='$thn' ");
                            $data = $sql->fetch_object(); { echo '
                      <div class="h5 mb-0 font-weight-bold text-gray-800">'. number_format($data->total).' Data</div>'; } ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning mb-3">Total Suplier</div>
                      <?php $sql = $connect->query("SELECT COUNT(kode) AS total FROM suplier"); 
                            $data = $sql->fetch_object(); { echo '
                      <div class="h5 mb-0 font-weight-bold text-gray-800">'.$data->total.' Suplier</div>'; } ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik Pendapatan Anda</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                  <canvas id="myChart"></canvas>
                  </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
            animationEnabled: true,
  exportEnabled: true,
  // theme: "light1", // "light1", "light2", "dark1", "dark2"


                type: 'line',
                data: {
                    labels: [<?php while ($b = $bulan->fetch_object()) { echo '"' . bulan($b->bulan) . '",';}?>],
                    datasets: [{
                    label: "Total Penjualan",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
    
              data: [<?php while ($p = $penghasilan->fetch_object()) { echo '"' . $p->total_penjualan . '",';}?>],
                            // backgroundColor: [
                            //     // 'rgba(255, 206, 86, 0.2)',
                            //     'rgba(75, 192, 192, 0.2)',
                            //     // 'rgba(153, 102, 255, 0.2)',
                            //     // 'rgba(255, 159, 64, 0.2)',
                            //     // 'rgba(255, 99, 132, 0.2)',
                            //     // 'rgba(54, 162, 235, 0.2)',
                            //     // 'rgba(255, 206, 86, 0.2)',
                            //     // 'rgba(75, 192, 192, 0.2)',
                            //     // 'rgba(153, 102, 255, 0.2)',
                            //     // 'rgba(255, 159, 64, 0.2)'
                            // ],
                            // borderColor: [
                            //     'rgba(255,99,132,1)',
                            //     'rgba(54, 162, 235, 1)',
                            //     'rgba(255, 206, 86, 1)',
                            //     'rgba(75, 192, 192, 1)',
                            //     'rgba(153, 102, 255, 1)',
                            //     'rgba(255, 159, 64, 1)',
                            //     'rgba(255, 99, 132, 0.2)',
                            //     'rgba(54, 162, 235, 0.2)',
                            //     'rgba(255, 206, 86, 0.2)',
                            //     'rgba(75, 192, 192, 0.2)',
                            //     'rgba(153, 102, 255, 0.2)',
                            //     'rgba(255, 159, 64, 0.2)'
                            // ],
                            // borderWidth: 1
                        }]
                },
            //     options: {
            //         scales: {
            //             yAxes: [{
            //                     ticks: {
            //                         beginAtZero: true
            //                     }
            //                 }]
            //         }
            //     }
            // });

              options: {
                maintainAspectRatio: false,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0,
                    display: false
                  }
                },

            scales: {
              // yAxes: [{
              //   ticks: {
              //               // maxTicksLimit: 5,
              //     padding: 10,
              //     // beginAtZero: true
              //   },

              //   time: {
              //     unit: 'date'
              //   },
              //   gridLines: {
              //     display: false,
              //     drawBorder: false,


              //     color: "rgb(234, 236, 244)",
              //     zeroLineColor: "rgb(234, 236, 244)",
              //     drawBorder: false,
              //     borderDash: [2],
              //     zeroLineBorderDash: [2]
              //   },
              //   ticks: {
              //     maxTicksLimit: 7
              //   }
              xAxes: [{
                time: {
                  unit: 'date'
                },
                ticks: {
                            // maxTicksLimit: 5,
                  padding: 10,
                  // beginAtZero: true
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
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
            }
          }
        });

        </script>

                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body  -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>

                  </div>
                </div>
              </div>
            </div>
          <script type="text/javascript">
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: ["Direct", "Referral", "Social"],
                datasets: [{
                  data: [55, 30, 15],
                  backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                  hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
              },
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: false
                },
                cutoutPercentage: 80,
              },
            });

          </script>

            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik Pendapatan Anda</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="bar-chart">
                  <canvas id="chart-penjualan"></canvas>
                  </div>
                </div>
                </div>
              </div>



          </div>



          <!-- //Content Row --> 

<?php 
    $nama  = $connect->query("SELECT namaob FROM grafik ");
    $count = $connect->query("SELECT jumlah_jual FROM grafik");
?>

        <script>
            var ctx = document.getElementById("chart-penjualan");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = $nama->fetch_object()) { echo '"' . bulan($b->namaob) . '",';}?>],
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",

                    datasets: [{
                            label: 'Total Penjualan',
                            data: [<?php while ($p = $count->fetch_object()) { echo '"' . $p->jumlah_jual . '",';}?>],
                            backgroundColor: 'rgba(111, 0, 255)',
                            borderColor: 'rgba(255,99,132,1)',
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
