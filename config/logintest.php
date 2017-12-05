<?php
	class logintest extends PHPUnit_Framework_TestCase
	{
		public function testLogin()
		{
			
		$a="1157050057";
		$b="password";
		include("koneksi.php");
//---------------------CEK MHS --------------------------------------------
		$sql = mysqli_query($link,"select * from mhs where nim='$a' and password='$b'");
		$data = mysqli_fetch_assoc($sql);
		$count = mysqli_num_rows($sql);
		if($count >0){
			$_SESSION['user'] = "HASHMHS";
			$_SESSION['id'] = $a;
			$_SESSION['name'] = $data['nm_mhs'];
			$this->assertEquals(1157050057,$_SESSION['id']);
			echo "Berhasil Login : Mahasiswa";
			//header("location: mhs/");
		}else{
			
//--------------------- CEK Dosen ----------------------------------------------			
			$sql = mysqli_query($link,"select * from dosen where nip='$a' and password='$b'");
			$data = mysqli_fetch_assoc($sql);
			$count = mysqli_num_rows($sql);
			if($count >0){
				$_SESSION['user'] = "HASHDOSEN";
				$_SESSION['id'] = $a;
				$_SESSION['name'] = $data['nm_dosen'];
				$this->assertEquals(123456789012345678,$_SESSION['id']);
				echo "Berhasil Login : Dosen";
				//header("location: dosen/");
			}else{
				
//--------------------- CEK Admin ----------------------------------------------	
				$sql = mysqli_query($link,"select * from admin where username='$a' and password='$b'");
				$data = mysqli_fetch_assoc($sql);
				$count = mysqli_num_rows($sql);
				if($count >0){
					$_SESSION['user'] = "HASHADMIN";
					$_SESSION['name'] = $data['username'];
					$this->assertEquals("admin",$_SESSION['id']);
					echo "Berhasil Login : Admin";
					//header("location: admin/");
				}else{
					echo "<h5><font color='red'>Username atau Password salah</font></h5>";
				}
				
			}
			
		}
	
		}
	}
?>