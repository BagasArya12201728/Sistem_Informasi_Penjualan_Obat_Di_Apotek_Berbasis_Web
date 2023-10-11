<?php 
    include '../config.php';
    session_start();

//    $user = $_SESSION['username'];

//data obat ---------------------------------------------------------------------------------------------------------------------------------------
    if ($_GET['act']=='add-obat'){
    
        $nama    = $_POST['nama'];
        $suplier = $_POST['suplier'];
        $kat     = $_POST['kategori'];
        $sat     = $_POST['satuan'];
        $beli    = $_POST['hbeli'];
        $jual    = $_POST['hjual'];
        $expire  = $_POST['expire'];
        $stok    = $_POST['stok'];

        $harga_beli    = str_replace(".", "", $beli);
        $harga_jual    = str_replace(".", "", $jual);
        $stok1         = str_replace(".", "", $stok);



        // echo "Nama : ".$nama."<br />";
        // echo "Suplier : ".$suplier. "<br />";
        // echo "Kategori : ".$kat. "<br />";
        // echo "Satuan : ".$sat. "<br />";
        // echo "Harga Beli : ".$harga_beli."<br />";
        // echo "Harga Jual : ".$harga_jual."<br />";
        // echo "Expire : ".$expire."<br />";
        // echo "Stok Barang : ".$stok1."<br />";

        $sql = $connect->query("INSERT INTO tb_obat (kode, nama, suplierid, kategori, satuan, beli, jual , expired, stok, status, edit) 
            VALUES ('','$nama','$suplier','$kat','$sat','$harga_beli','$harga_jual','$expire','$stok1','aktif','tutup')");
        if ($sql) {
            header("location:../home?p=obat&&status=sukses");
        }else
            header("location:../home?p=obat&&status=gagal");
            
    
//END data obat ---------------------------------------------------------------------------------------------------------------------------------------
    
    }elseif($_GET['act']=='up-obat'){
        $kode    = $_POST['kode'];
        $nama    = $_POST['nama'];
        $suplier = $_POST['suplier'];
        $kat     = $_POST['kategori'];
        $sat     = $_POST['satuan'];
        $beli    = $_POST['hbeli'];
        $jual    = $_POST['hjual'];
        $expire  = $_POST['expired'];
        $stok    = $_POST['stok'];
        $status  = $_POST['status'];
        $edit    = $_POST['edit'];

        $harga_beli    = str_replace(".", "", $beli);
        $harga_jual    = str_replace(".", "", $jual);
        $stok1         = str_replace(".", "", $stok);

        $level = $_SESSION['level'];

        if ($level == 'Admin') {
            $sql = $connect->query("
                UPDATE tb_obat
                SET nama        = '$nama',
                    suplierid   = '$suplier',
                    kategori    = '$kat',
                    satuan      = '$sat',
                    beli        = '$harga_beli',
                    jual        = '$harga_jual',
                    expired     = '$expire',
                    stok        = '$stok',
                    status      = '$status',
                    edit        = '$edit'
                WHERE kode      = '$kode';
            ");
        }else{
            $sql = $connect->query("
                UPDATE tb_obat
                SET nama        = '$nama',
                    suplierid   = '$suplier',
                    kategori    = '$kat',
                    satuan      = '$sat',
                    beli        = '$harga_beli',
                    jual        = '$harga_jual',
                    expired     = '$expire',
                    stok        = '$stok'
                WHERE kode      = '$kode';
            ");

        }


        if ($sql) {
            header("location:../home?p=obat&&status=sukses");
        }else
            header("location:../home?p=obat&&status=gagal");



    }elseif($_GET['act']=='del-obat'){

        $kode = $_GET['kode'];

        $sql = $connect->query("DELETE FROM tb_obat WHERE kode = '$kode'");
        if ($sql) {

          header("location:../home?p=obat&&status=sukses");


        }else

        $connect->query("UPDATE tb_obat SET status = 'tidak' WHERE kode='$kode' ");

            header("location:../home?p=obat&&status=sukses");



    }elseif($_GET['act']=='add-sup'){
    
    	// $ko = $_POST['kode'];
    	$na = $_POST['nama'];
    	$lok = $_POST['lokasi'];
    	$tel = $_POST['telp'];
    	$em = $_POST['email'];
    	$al = $_POST['alamat'];

		$connect->query("INSERT INTO suplier VALUES ('','$na','$lok','$tel','$em','$al');");
    	if ($connect) {
            header("location:../home?p=suplier&&status=sukses");
    	}else
    		// echo "<h5>Gagagl</h5>";
            header("location:../home?p=suplier&&status=gagal");

    
    
    }elseif ($_GET['act']=='up-sup') {
        $kode = $_POST['kode'];

        $na = $_POST['nama'];
        $lok = $_POST['lokasi'];
        $tel = $_POST['telp'];
        $em = $_POST['email'];
        $al = $_POST['alamat'];

        $sql = $connect->query("UPDATE suplier SET nama = '$na', kota = '$lok', telp = '$tel', email = '$em', alamat = '$al' WHERE kode = '$kode'");
        if ($sql) {
            header("location:../home?p=suplier&&status=sukses");
        }else{
            header("location:../home?p=suplier&&status=gagal");            
        }

    }elseif ($_GET['act']=='del-sup') {

        $kode = $_GET['kode'];
        
        $sql = $connect->query("DELETE FROM suplier WHERE kode = '$kode'");

        if ($sql) {
            header("location:../home?p=suplier&&status=sukses");
        }else{
            header("location:../home?p=suplier&&status=gagal");
        }
        
    }elseif($_GET['act']=='add-kategori'){
    
        $na = $_POST['nama'];
        
        $query = $connect->query("INSERT INTO kategori VALUES ('','$na');");
        if ($query) {
            header("location:../home?p=kategori&&status=sukses");

            // echo "<h5>Simpan data berhasil</h5>";
        }else
            // echo "<h5>Gagagl</h5>";
            header("location:../home?p=kategori&&status=gagal");


    }elseif ($_GET['act']=='del-kategori') {

        $kode = $_GET['kode'];

        $sql = $connect->query("DELETE FROM kategori WHERE kode = '$kode'");
        if ($sql) {
            header("location:../home?p=kategori&&status=sukses");
        }else{
            header("location:../home?p=kategori&&status=gagal");
        }
    
    }elseif ($_GET['act']=='up-kategori') {

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];

        $sql = $connect->query("UPDATE kategori SET nama = '$nama' WHERE kode = '$kode'");
        if ($sql) {
            header("location:../home?p=kategori&&status=sukses");
        }else{
            header("location:../home?p=kategori&&status=gagal");

        }

    }elseif($_GET['act']=='add-satuan'){
    
        $na = $_POST['nama'];
        
        $query = $connect->query("INSERT INTO satuan VALUES ('','$na');");
        if ($query) {
            header("location:../home?p=satuan&&status=sukses");
        }else{
            header("location:../home?p=satuan&&status=gagal");
        }
    }elseif ($_GET['act']=='del-satuan') {

        $kode = $_GET['kode'];

        $sql = $connect->query("DELETE FROM satuan WHERE kode = '$kode'");
        if ($sql) {
            header("location:../home?p=satuan&&status=sukses");
        }else{
            header("location:../home?p=satuan&&status=gagal");

        }
 
    }elseif ($_GET['act']=='up-satuan') {

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];

        $sql = $connect->query("UPDATE satuan SET nama = '$nama' WHERE kode = '$kode'");
        if ($sql) {
            header("location:../home?p=satuan&&status=sukses");
        }else{
            header("location:../home?p=satuan&&status=gagal");
        }
    
    }elseif($_GET['act']=='add-pembelian'){
    
    	echo "aksi add sup";
    
    }elseif($_GET['act']=='add-penjualan'){
    
    	echo "aksi add sup";
    
    }elseif($_GET['act']=='add-cart-penjualan'){
    
        date_default_timezone_set("Asia/Jakarta");


            // $LastID=FormatNoTrans(OtomatisID());
            $use       = $_SESSION['username'];
            $kodeobat  = $_POST['obat-kode'];
            $nama      = $_POST['kode_obat'];
            $disc      = $_POST['diskon'];
            $qty       = $_POST['qty'];

            $tanggal   = date("y-m-d");

            $f1o=$connect->query("SELECT * FROM tb_obat WHERE nama='$nama' AND kode='$kodeobat' ");
            while($data = $f1o->fetch_object())
             {
                $kode12  = $data->kode;
                $hjual   = $data->jual;
                $stok    = $data->stok;

            $que=$connect->query("SELECT subtotal, count(kode_obat) AS total, SUM(qty) AS upqty FROM temp WHERE kode_obat='$kode12'");
            while($data1=$que->fetch_object())
            {
                $total  = $data1->total;
                $upqty  = $data1->upqty;
                $h_awal = $data1->subtotal;

                $tot_qty    = $qty+$upqty;
                $qtyup      = $upqty+$qty;
                $sub        = $hjual*$qtyup;
                @$harga_dis = (($sub*$disc)/100);
                $bayar      = $sub-$harga_dis;                   
            }}


            $updatestok = $stok-$qty;

            if ($qty <= $stok) :
                if ($total==0 ) {
                    $sql = $connect->query("INSERT INTO temp(`kode_obat`,`harga`,`diskon`,`qty`,`subtotal`,nama, pot)
                    
                    VALUES ('$kode12','$hjual','$disc','$qty','$bayar', '$nama' ,'$harga_dis');");
                   
                   // $query5 = mysql_query("UPDATE tb_obat SET stok='$updatestok' WHERE kode='$kode12'");
                }else {
                    $update = $qty+$upqty;
                    $query4 = $connect->query("UPDATE temp SET qty='$update', subtotal='$bayar', diskon='$disc' WHERE kode_obat='$kode12' ");
                   // $query5 = mysql_query("UPDATE tb_obat SET stok='$updatestok' WHERE kode='$kode12'");
                //
                  // $query5 = mysql_query("UPDATE barang SET stok='$upstok' WHERE kode_barang='$kode12' ");
                }else :  
                echo "<script type='text/javascript'>alert('Stok Tidak Cukup')</script>";
                
            endif;

            echo "<script>document.location.href='../home?p=form-penjualan';</script>";

    
    }elseif ($_GET['act']=='del-cart-penjualan') {
        
        $kode = $_GET['data'];
        
        $sql  = $connect->query("DELETE FROM temp WHERE kode_obat = '$kode'"); 
        
        if ($sql) {
            header("location:../home?p=form-penjualan");
        }else
            header("location:../home?p=form-penjualan");


    }elseif ($_GET['act']=='simpan-penjualan') {

    date_default_timezone_set("Asia/Jakarta");
    $user   = $_SESSION['username'];
    $res    = $connect->query("SELECT SUM(subtotal) AS total, sum(pot) AS pot FROM temp");
    $ex     = $res->fetch_object();

        $pot        = $ex->pot;
        $kode_trans = $_POST['kode_trans'];
        $tanggal    = date("y-m-d");
        $total1     = $_POST['input_total'];
        $total      = str_replace(".", "", $total1);
        $bayar      = $_POST['input_bayar'];
        $bayar_t    = str_replace(".", "", $bayar);
        $kem        = $_POST['input_kembali'];
        $kembali    = str_replace(".", "", $kem);

    $query = $connect->query("INSERT INTO penjualan (id, customer, tgl, total_harga, total_bayar, kembali, diskon, kasir)

         VALUES ('$kode_trans','-','$tanggal','$total','$bayar_t','$kembali','$pot', '$user')");
    
    // echo $user."<br />";
    // echo $pot."<br />";
    // echo $tanggal."<br />";
    // echo $total."<br />";
    // echo $bayar_t."<br />";
    // echo $kembali."<br />";
    // echo $kode."<br />";




      $result = $connect->query("SELECT * FROM temp");
    
        while ($data = $result->fetch_object()) {
    
        // $id         = $data->id;
        $kode       = $data->kode_obat;
        $harga      = $data->harga;
        $diskon     = $data->diskon;
        $qty        = $data->qty;
        $subtotal   = $data->subtotal;
        $pot        = $data->pot;

        $simpan = $connect->query("INSERT INTO detail (id,kode_obat, harga, diskon, qty, subtotal, pot)  
            VALUES ('$kode_trans','$kode','$harga','$diskon','$qty','$subtotal','$pot')");

        $sql4 = $connect->query("SELECT * FROM tb_obat WHERE kode = '$kode'");
        while ($data1 = $sql4->fetch_object()) {
        $stok = $data1->stok;
        $ad = $stok - $qty;

        $connect->query("UPDATE tb_obat SET stok = '$ad' WHERE kode = '$kode'");      

        }

        }
    
         $connect->query("DELETE FROM temp");
     
    echo "<meta http-equiv='refresh' content='0; url=../pages/view/struk?kode=$kode_trans'>";
    
         // header("location:struk.php?kode=$LastID");

    }elseif ($_GET['act']=='stok-opname') {
        date_default_timezone_set("Asia/Jakarta");
        $date = date('Y-m-d H:i:s');
            $val  = $_POST['kode_obat'];
            $kode = intval($val);
            
            $stok       = $_POST['bil1'];
            $nyata      = $_POST['bil2'];
            $selisih    = $_POST['total'];
            $ket        = $_POST['ket'];

        $sql = $connect->query("INSERT INTO opnma(`kode_obat`,`stok`,`nyata`,`selisih`,`keterangan`,`waktu`)
            VALUES ('$kode','$stok','$nyata','$selisih','$ket','$date');");

        $update = $connect->query("UPDATE tb_obat SET stok = '$nyata' WHERE kode = '$kode'");

        // header('Location: ' . $_SERVER['HTTP_REFERER']);


    }elseif ($_GET['act']=='up-pengaturan') {
        $nama     = $_POST['nama'];
        $telp     = $_POST['telp'];
        $alamat   = $_POST['alamat'];
        $info     = $_POST['info'];
        $so       = $_POST['so'];
        $edit     = $_POST['edit'];

        echo $nama ."<br>";
        echo $telp ."<br>";
        echo $alamat ."<br>";
        echo $info ."<br>";
        echo $so ."<br>";
        echo $edit ."<br>";
        if (empty($edit)) {

        } else {
            $connect->query("UPDATE tb_obat SET edit = '$edit' ");
        }
        


        $sql = $connect->query("UPDATE data_apotek SET 
            nama    = '$nama', 
            alamat  = '$alamat',
            telp    = '$telp',
            so      = '$so',
            info    = '$info'
            
        ");
        
        if ($sql) {
            header("location:../home?p=pengaturan&&status=sukses");
        }else{
            header("location:../home?p=pengaturan&&status=gagal");
        }

        
    }

?>