<?php
	$cek = cek_login($user);

	if(isset($_POST['upload'])){ upload_file(); }
	if(isset($_GET['file'])){ download_file(); }
	if(isset($_GET['delete'])){
		delete_data('tb_file','kd_file', $_GET['delete']);
		}
?>

<div class="panel-heading">Tugas
	<?php
		echo get_data('v_kelas','kd_kelas',$_GET['id'],'nm_matkul');
		echo " - ";
		echo get_data('v_kelas','kd_kelas',$_GET['id'],'nm_kelas');
	?>
    <ul class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#myModal"><div class="glyphicon glyphicon-cloud-upload"></div></a></ul>
</div>
<br>
<!-- ---------------------------------------------------------------view--------------------------------- -->
<div class="panel-body">
	<div style="width:98%; margin:auto">

          <table id="tabel1" class="table">
            <thead>
              <tr>
                <th width="35px"><center>No</center></th>
                <th><center>Nama Tugas</center></th>
								<th><center>Deskrisi</center></th>
                <th><center>Batas Akhir</center></th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
					$no = 1;
                    $sql = mysqli_query($link, "select * from tugas where kd_kelas = '$_GET[kls]'") or die(mysqli_error());
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr align="center">
                <td><?php echo $no; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[4]." ".$data[5]; ?></td>
                <td>
                	<center>
                        <a href="?page=tugas&id=<?php echo $_GET['id']; ?>&tgs=<?php echo $data[0]; ?>">
                        	<div class="glyphicon glyphicon-list"></div>
                        </a>
                    </center>
                </td>
              </tr>
              <?php $no++; } ?>
            </tbody>
          </table>

	</div>
</div>



<!-- ---------------------------------------------------Show TGS --------------------------------------------------- -->
<div class="modal fade" id="showTgs" role="dialog">
    	<div class="modal-dialog modal-lm">

      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">List Upload Tugas</h4>
        		</div>
                <form action="?page=ambil_kelas" method="post" id="frm-ambil_kelas">
        		<div class="modal-body">
                    	<fieldset>
												<div class="panel-body">
													<div style="width:98%; margin:auto">

																	<table id="tabel1" class="table">
																		<thead>
																			<tr>
																				<th width="35px"><center>No</center></th>
																				<th><center>NIM</center></th>
																				<th><center>Upload at</center></th>
																				<th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
																			</tr>
																		</thead>
																		<tbody>
																				<?php
																	$no = 1;
																						$sql = mysqli_query($link, "select * from tb_file where jenis = '$_GET[tgs]'") or die(mysqli_error());
																						while($data = mysqli_fetch_row($sql)){
																				?>
																			<tr align="center">
																				<td><?php echo $no; ?></td>
																				<td><?php echo $data[5]; ?></td>
																				<td><?php echo $data[3]." ".$data[4] ?></td>
																				<td>
																					<center>
																								<a href="?page=materi&id=<?php echo $_GET['id']; ?>&file=<?php echo $data[1]; ?>">
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
                       </fieldset>
        		</div>
        		<div class="modal-footer">
         			<input type="submit" class="btn btn-default" name="input" value="Tambah">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
                </form>
      		</div>

    	</div>
	</div>
