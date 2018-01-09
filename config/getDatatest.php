<?php
	class getDatatest extends PHPUnit_Framework_TestCase
	{
		public function testGetdata()
		{
			$a = "mhs";
			$b = "nim";
			$c = "1157050129";
			$d = "nm_mhs";
				 include "koneksi.php";
				 $query = mysqli_query($link, "select * from $a where $b = '$c'") or die (mysqli_error());
				 $data = mysqli_fetch_array($query);
				 return $data[$d];
			}
		}
?>
