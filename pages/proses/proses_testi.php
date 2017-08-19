<?php error_reporting(0);
include "../../config/config.php";
include "../../libs/funct/library_function.php";
//setting tanggal dan format waktu indonesia
date_default_timezone_set('Asia/Jakarta');
$sekarang   = new DateTime();
$menit      = $sekarang -> getOffset() / 60; 
$tanda      = ($menit < 0 ? -1 : 1);
$menit      = abs($menit);
$jam        = floor($menit / 60);
$menit      -= $jam * 60;
$offset     = sprintf('%+d:%02d', $tanda * $jam, $menit);
mysqli_query($con,"SET time_zone = '$offset'");

$act = $_GET['act'];
if ($act == 'addconsultasi') {
	$nama_testi    	  = isset($_POST['nama_testi']) ? trim(htmlentities($_POST['nama_testi'])):'';
	$email         	  = isset($_POST['email']) ? trim(htmlentities($_POST['email'])):'';
	$keluhan_testi 	  = $_POST['keluhan_testi'];
	$filter 		  = cleanSanitazeXss($keluhan_testi);
	$no_telp_testi    = isset($_POST['no_telp_testi']) ? trim(htmlentities($_POST['no_telp_testi'])):'';
	$captcha 	      = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';
	
	$secret_key = '6LfsgCcTAAAAAFRvSHjsiV2AE_-jWrh8GKLLJX2k'; 
	$error = 'Gagal mengirim form Konsultasi : periksa kembali nama_testi, email, keluhan_testi no_telp_testi dan captcha';
	if ($nama_testi !='' && $email !='' && $keluhan_testi !='' && $no_telp_testi !='') {
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secret_key) . '&response=' . $captcha;   		
		$recaptcha = file_get_contents($url);
	    $recaptcha = json_decode($recaptcha, true);
	    //check if the input captcha by user has been valid or not
	    if (!$recaptcha ==['success']) {
	    	echo "<script>alert('Maaf captcha tidak boleh kosong !!')</script>";
	    	echo "<script>history.go(-1)</script>";
	    }else{
	    	//if the input capctha by user has been true
			$tgl_kosultasi = date("Y-m-d H:i:s");
			$addkonsul ="INSERT INTO testimoni (nama_testi, email, keluhan_testi, no_telp_testi, tgl_testi) 
					     VALUES ('$nama_testi', '$email','$_POST[keluhan_testi]', '$no_telp_testi', '$tgl_kosultasi')";
			$sucess = mysqli_query($con,$addkonsul);
			if ($sucess) {
				echo "<script>alert('Konsultasi berhasil ditambah !!');</script>";
				echo "<meta http-equiv=refresh content=0;url=$url_base"."../../index.php?pg=consultasi>";
			}else{
				echo "<script>alert('Konsultasi gagal ditambah !!');</script>";
				echo "<meta http-equiv=refresh content=0;url=$url_base"."../../index.php?pg=consultasi>";
			}
	    }
	    //when this input is false
	}else{
		echo "<script>alert('Maaf captcha harus diisi jika proses ingin dilanjutkan !!');</script>";
		echo "<meta http-equiv=refresh content=0;url=$url_base"."../../index.php?pg=consultasi>";
		
	}
}

?>