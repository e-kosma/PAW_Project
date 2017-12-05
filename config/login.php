<?php
	
	function login($a,$b){
		session_start();
		include("koneksi.php");
		
//---------------------CEK MHS --------------------------------------------
		$sql = mysqli_query($link,"select * from mhs where nim='$a' and password='$b'");
		$data = mysqli_fetch_assoc($sql);
		$count = mysqli_num_rows($sql);
		if($count >0){
			$_SESSION['user'] = "HASHMHS";
			$_SESSION['id'] = $a;
			$_SESSION['name'] = $data['nm_mhs'];
			header("location: mhs/");
		}else{
			
//--------------------- CEK Dosen ----------------------------------------------			
			$sql = mysqli_query($link,"select * from dosen where nip='$a' and password='$b'");
			$data = mysqli_fetch_assoc($sql);
			$count = mysqli_num_rows($sql);
			if($count >0){
				$_SESSION['user'] = "HASHDOSEN";
				$_SESSION['id'] = $a;
				$_SESSION['name'] = $data['nm_dosen'];
				header("location: dosen/");
			}else{
				
//--------------------- CEK Admin ----------------------------------------------	
				$sql = mysqli_query($link,"select * from admin where username='$a' and password='$b'");
				$data = mysqli_fetch_assoc($sql);
				$count = mysqli_num_rows($sql);
				if($count >0){
					$_SESSION['user'] = "HASHADMIN";
					$_SESSION['name'] = $data['username'];
					header("location: admin/");
				}else{
					echo "<h5><font color='red'>Username atau Password salah</font></h5>";
				}
				
			}
			
		}
	}
	
	function cek_user(){
		session_start();
		if(isset($_SESSION['user'])){
			if($_SESSION['user']=="HASHMHS"){
				header("location: mhs/");
			}else if($_SESSION['user']=="HASHDOSEN"){
				header("location: dosen/");
			}else if($_SESSION['user']=="HASHADMIN"){
				header("location: admin/");
			}else{
				header("location: logout.php");
			}
		}else{
			
		}
	}
	
	function cek_login($a){
		session_start();
		if(!isset($_SESSION['user'])){
			header("location: ../");
		}else if($_SESSION['user'] != $a){
			header("location: ../");
		}
	}
?>