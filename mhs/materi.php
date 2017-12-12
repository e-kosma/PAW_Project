<?php
	$cek = cek_login($user);

	if(isset($_GET['file'])){ download_file(); }
?>

<div class="panel-heading">Materi Kuliah
	<?php
		echo get_data('tb_view_kelas','kd_kelas',$_GET['id'],'nm_matkul');
		echo " - ";
		echo get_data('tb_view_kelas','kd_kelas',$_GET['id'],'nm_kelas'); 
	?>
</div>
<br>
<!-- ---------------------------------------------------------------view--------------------------------- -->
<div class="panel-body">
	<div style="width:98%; margin:auto">

          <table id="tabel1" class="table">
            <thead>
              <tr>
                <th width="35px"><center>No</center></th>
                <th><center>Nama File</center></th>
                <th><center>Deskripsi</center></th>
                <th><center>Upload at</center></th>
                <th width="35px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
					$no = 1;
                    $sql = mysqli_query($link, "select * from tb_file where kd_kelas = '$_GET[id]' and jenis = 'materi'") or die(mysqli_error());
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr align="center">
                <td><?php echo $no; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]." ".$data[4] ?></td>
                <td>
                	<center>
                        <a href="?page=materi&file=<?php echo $data[1]; ?>">
                        	<div class="glyphicon glyphicon-download-alt"></div>
                        </a>
                    </center>
                </td>
              </tr>
              <?php $no++; } ?>
            </tbody>
          </table>

	</div>
</div>
