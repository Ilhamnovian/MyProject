<?php
session_start();
require"../koneksi/index.php";
require"data.php";
$data = new oke();
$x=$_REQUEST['x'];
switch($x){
	case "daftar":
		require"../tampilan/atas.php";
		require"daftar.php";
	break;
	case "login":
		require"../tampilan/atas.php";
		require"login.php";
	break;
	case "mendaftar":
		extract($_POST);// otomatis generate variable
		$konfirmasi=$data->daftar($username,$password);
		require"../tampilan/atas.php";
		if($konfirmasi=="berhasil"){
			echo"berhasil !";
		}else{
			echo"gagal mendaftar !";
			require"daftar.php";	
		}
	break;
	case "masuk":
		extract($_POST);// otomatis generate variable
		$konfirmasi=$data->login($username,$password);
		require"../tampilan/atas.php";
		if($konfirmasi=="berhasil"){
			echo"berhasil !";
		}else{
			echo"gagal login !";
			require"login.php";	
		}
	break;
	case "logout":
		unset($_SESSION['oke_username']);
		session_destroy();
		require"../tampilan/atas.php";
		require"login.php";	
	break;
	case "insert":
		require"../tampilan/atas.php";
		echo "Insert";
	break;
	case "tampil":
		require"../tampilan/atas.php";
		echo "Tampil";
	break;
	case "search":
		require"../tampilan/atas.php";
		echo "Search";
	break;
	default:
		require"../tampilan/atas.php";
		require"login.php";
	break;
}
require"../tampilan/bawah.php";
?>