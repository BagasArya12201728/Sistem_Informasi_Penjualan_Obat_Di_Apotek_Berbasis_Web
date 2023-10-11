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

include 'config.php';
// $bulan       = mysqli_query($koneksi, "SELECT bulan FROM penjualan WHERE tahun='2016' order by id asc");
$bulan = $connect->query("SELECT MONTH(tgl) AS bulan FROM penjualan GROUP BY MONTH(tgl)"); 
$penghasilan = $connect->query("SELECT SUM(total_harga) AS total_penjualan FROM penjualan GROUP BY MONTH(tgl)"); ?>



<html>
    <head>
        <title>Belajarphp.net - ChartJS</title>
        
        <script src="js/Chart.bundle.js"></script>


        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = $bulan->fetch_object()) { echo '"' . bulan($b->bulan) . '",';}?>],
                    datasets: [{
                            label: 'Statistik Penjualan',
                            data: [<?php while ($p = $penghasilan->fetch_object()) { echo '"' . $p->total_penjualan . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>