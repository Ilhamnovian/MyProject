<?php
class oke{
	function daftar($username,$password){
		$pengacak="f3bry4n";
		$password=md5(md5($pengacak).$password.md5($pengacak));
		$sql="INSERT INTO user VALUES('NULL','$username','$password')";
		$query=mysql_query($sql)or die(mysql_error());
		
		$sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
		$query=mysql_query($sql);
		while($record=mysql_fetch_assoc($query)){
			$hasil[]=$record;
		}
		
		if(!empty($hasil)){
			$konfirmasi="berhasil";
		}else{
			$konfirmasi="gagal";
		}
		
		return $konfirmasi;
	}
	function login($username,$password){
		$pengacak="f3bry4n";
		$password=md5(md5($pengacak).$password.md5($pengacak));
		
		$sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
		$query=mysql_query($sql);
		while($record=mysql_fetch_assoc($query)){
			$hasil[]=$record;
			$_SESSION['oke_username']=$record['username'];
		}
		
		if(!empty($hasil)){
			$konfirmasi="berhasil";
		}else{
			$konfirmasi="gagal";
		}
		
		return $konfirmasi;
	}
}
?>