<?php

	function alert_box($a){
		echo "<script language='javascript'>";
		echo "alert('$a')";
		echo "</script>";
	}

	function input_matkul(){
		include "koneksi.php";
		$sql = "insert into matkul values('$_POST[kd_matkul]', '$_POST[nm_matkul]', '$_POST[sks]')";
		
		$query = $link->query($sql);
        
		if($query){
			echo "<script language='javascript'>";
			echo "alert('Data Berhasil Ditambahkan!!')";
			echo "</script>";
		}else{
			echo "<script language='javascript'>";
			echo "alert('Data Gagal Ditambahkan!!')";
			echo "</script>";
		}
	}
	
	
	function edit_matkul(){
		include "koneksi.php";
		$sql = "update matkul set kd_matkul = '$_POST[kd_matkul]', nm_matkul = '$_POST[nm_matkul]', sks = '$_POST[sks]' where kd_matkul = '$_POST[id]'";
		
		$query = $link->query($sql);
        
		if($query){
			echo "<script language='javascript'>";
			echo "alert('Data Berhasil Diupdate !!')";
			echo "</script>";
		}else{
			echo "<script language='javascript'>";
			echo "alert('Data Gagal Diupdate !!')";
			echo "</script>";
		}
	}
	
	
	function get_data($a,$b,$c,$d){
		 include "koneksi.php";
		 $query = mysqli_query($link, "select * from $a where $b = '$c'") or die (mysqli_error());
		 $data = mysqli_fetch_array($query);
		 echo $data[$d];
	}
	
	function delete_data($a,$b,$c){
		include "koneksi.php";
		$query = mysqli_query($link, "delete from $a where $b = '$c'") or die (mysqli_error());
		alert_box("Data Berasil Dihapus");
	}
	
	function cek_fungsi(){
		echo "berhasil";	
	}
	
	function upload_file(){
		include "koneksi.php";
		$lokasi_file = $_FILES['file_upload']['tmp_name'];
		$nama_file   = $_FILES['file_upload']['name'];

		$folder = "../asset/files/$nama_file";
		
		date_default_timezone_set('Asia/Jakarta');
		$jam=date("H:i:s");
		$tgl_upload = date("Ymd");
	
		if (move_uploaded_file($lokasi_file,"$folder")){
		 
		 $query = "insert into tb_file values ('', '$nama_file', '$_POST[desc]', '$tgl_upload', '$jam', '$_SESSION[id]', '$_GET[id]', 'materi')";
		  $sql = $link->query($query);
		  	if($sql){
				alert_box("File Berhasil di Upload");
			}
		}else{
		  alert_box( "File gagal di upload");
		}	
	}
	
	function download_file(){
		
		$folder = "../asset/files/";
		if (!file_exists($folder.$_GET['file'])) {
			alert_box("Anda tidak diperbolehkan mendownload file ini.");
			
		}else{
		?><meta http-equiv="Refresh" content="0; URL=<?php echo $folder.$_GET['file']; ?>"><?php
		}
	}
	
?>