<?php
	class uploadTest extends PHPUnit_Framework_TestCase
	{
		public function testUpload()
		{
			include "fungsi.php";
			include "koneksi.php";
			$_POST['desc'] = "ini deskripsi file";
			$_GET['id'] = 1;
			$_FILES['file_upload']['tmp_name'] = "nyoba.docx";
			$_FILES['file_upload']['name'] = "nyoba";


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
		}
?>
