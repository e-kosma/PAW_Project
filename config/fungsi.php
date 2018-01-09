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
			alert_box("Data Berhasil Ditambahkan !!");
		}else{
			alert_box("Data Gagal Ditambahkan !!");
		}
	}

	function input_kelas(){
		include "koneksi.php";
		$sql = "insert into kelas values('', '$_POST[nm_kelas]', '$_POST[hari]', '$_POST[jam_masuk]', '$_POST[jam_keluar]', '$_POST[nip]', '$_POST[kd_matkul]', '$_POST[kd_ruang]')";
		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Ditambahkan !!");
		}else{
			alert_box("Data Gagal Diupdate !!");
		}
	}


	function input_ruang(){
		include "koneksi.php";
		$sql = "insert into ruang values('', '$_POST[nm_ruang]')";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Ditambahkan !!");
		}else{
			alert_box("Data Gagal Ditambahkan !!");
		}
	}


	function input_dosen(){
		include "koneksi.php";
		$sql = "insert into dosen values('$_POST[nip]', '$_POST[nm_dosen]', '$_POST[no_hp]', '$_POST[email]', '$_POST[password]')";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Ditambahkan !!");
		}else{
			alert_box("Data Gagal Ditambahkan !!");
		}
	}


	function input_mhs(){
		include "koneksi.php";
		$sql = "insert into mhs values('$_POST[nim]', '$_POST[nm_mhs]', '$_POST[email]', '$_POST[no_hp]', '$_POST[password]')";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Ditambahkan !!");
		}else{
			alert_box("Data Gagal Ditambahkan !!");
		}
	}

	function input_ambil_kelas(){
		include "koneksi.php";
		$sql = "insert into ambil_kelas values('','$_POST[nim]', '$_POST[kd_kelas]')";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Ditambahkan !!");
		}else{
			alert_box("Data Gagal Ditambahkan !!");
		}
	}

	function input_tugas(){
		include "koneksi.php";
		$sql = "insert into tugas values('','$_POST[nm_tugas]', '$_POST[kd_kelas]', '$_POST[date_line]', '$_POST[jam]')";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Ditambahkan !!");
		}else{
			alert_box("Data Gagal Ditambahkan !!");
		}
	}


	function edit_matkul(){
		include "koneksi.php";
		$sql = "update matkul set kd_matkul = '$_POST[kd_matkul]', nm_matkul = '$_POST[nm_matkul]', sks = '$_POST[sks]' where kd_matkul = '$_POST[id]'";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Diupdate !!");
		}else{
			alert_box("Data Gagal Diupdate !!");
		}
	}


	function edit_kelas(){
		include "koneksi.php";
		$sql = "update kelas set nm_kelas = '$_POST[nm_kelas]', hari = '$_POST[hari]', jam_masuk = '$_POST[jam_masuk]', jam_keluar = '$_POST[jam_keluar]', nip = '$_POST[nip]', kd_matkul = '$_POST[kd_matkul]', kd_ruang = '$_POST[kd_ruang]' where kd_kelas = '$_POST[id]'";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Diupdate !!");
		}else{
			alert_box("Data Gagal Diupdate !!");
		}
	}


	function edit_ruang(){
		include "koneksi.php";
		$sql = "update ruang set nm_ruang = '$_POST[nm_ruang]' where kd_ruang = '$_POST[id]'";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Diupdate !!");
		}else{
			alert_box("Data Gagal Diupdate !!");
		}
	}

	function edit_dosen(){
		include "koneksi.php";
		$sql = "update dosen set nip = '$_POST[nip]', nm_dosen = '$_POST[nm_dosen]', no_hp = '$_POST[no_hp]', email = '$_POST[email]', password = '$_POST[password]' where nip = '$_POST[id]'";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Diupdate !!");
		}else{
			alert_box("Data Gagal Diupdate !!");
		}
	}


	function edit_mhs(){
		include "koneksi.php";
		$sql = "update mhs set nim = '$_POST[nim]', nm_mhs = '$_POST[nm_mhs]', no_hp = '$_POST[no_hp]', email = '$_POST[email]', password = '$_POST[password]' where nim = '$_POST[id]'";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Diupdate !!");
		}else{
			alert_box("Data Gagal Diupdate !!");
		}
	}

	function edit_ambil_kelas(){
		include "koneksi.php";
		$sql = "update ambil_kelas set nim = '$_POST[nim]', kd_kelas = '$_POST[kd_kelas]' where id = '$_POST[id]'";

		$query = $link->query($sql);

		if($query){
			alert_box("Data Berhasil Diupdate !!");
		}else{
			alert_box("Data Gagal Diupdate !!");
		}
	}


	function get_data($a,$b,$c,$d){
		 include "koneksi.php";
		 $query = mysqli_query($link, "select * from $a where $b = '$c'") or die (mysqli_error());
		 $data = mysqli_fetch_array($query);
		 return $data[$d];
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


	function upload_tugas(){
		include "koneksi.php";
		$lokasi_file = $_FILES['file_upload']['tmp_name'];
		$nama_file   = $_FILES['file_upload']['name'];

		$folder = "../asset/files/$nama_file";

		date_default_timezone_set('Asia/Jakarta');
		$jam=date("H:i:s");
		$tgl_upload = date("Ymd");

		if (move_uploaded_file($lokasi_file,"$folder")){

		 $query = "insert into tb_file values ('', '$nama_file', '$_POST[desc]', '$tgl_upload', '$jam', '$_SESSION[id]', '$_POST[kls]', '$_POST[id]')";
		  $sql = $link->query($query);
		  	if($sql){
				alert_box("File Berhasil di Upload");
			}else{
				mysql_error();
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
