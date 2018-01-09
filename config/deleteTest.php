<?php
	class deleteTest extends PHPUnit_Framework_TestCase
	{
		public function testDelete()
		{
			$a = "mhs";
			$b = "nim";
			$c = "1157050999";
				include "koneksi.php";
			 $query = mysqli_query($link, "delete from $a where $b = '$c'") or die (mysqli_error());
			 echo "Data Berasil Dihapus";
			}
		}
?>
