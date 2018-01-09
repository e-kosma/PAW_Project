<?php
	$cek = cek_login($user);

	if(isset($_POST['input'])){ input_ambil_kelas(); }
	if(isset($_POST['edit'])){ edit_ambil_kelas(); }
	if(isset($_GET['delete'])){
		delete_data('ambil_kelas','id', $_GET['id']);
		}
?>

<div class="panel-heading">Data Matakuliah
    <ul class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#myModal"><div class="glyphicon glyphicon-plus"></div></a></ul>
</div>
<br>
<!-- ---------------------------------------------------------------view--------------------------------- -->
<div class="panel-body">
	<div style="width:98%; margin:auto">

          <table id="tabel1" class="table">
            <thead>
              <tr>
                <th>NIM</th>
								<th>Nama Mahasiswa</th>
                <th>Kelas</th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($link, "select * from v_ambil_kelas") or die(mysqli_error());
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
								<td><?php echo $data[3]." - ".$data[4]; ?></td>
                <td>
                	<center>
                        <a href="?page=ambil_kelas&id=<?php echo $data[0]; ?>">
                        	<div class="glyphicon glyphicon-edit"></div>
                        </a>
                        <a href="?page=ambil_kelas&delete=y&id=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
                        	<div class="glyphicon glyphicon-erase"></div>
                        </a>
                    </center>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

	</div>
</div>

<!-- ---------------------------------------------------INSERT --------------------------------------------------- -->
<div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog modal-sm">

      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Tambah Data Ambil Kelas</h4>
        		</div>
                <form action="?page=ambil_kelas" method="post" id="frm-ambil_kelas">
        		<div class="modal-body">
                    	<fieldset>
                        	<div class="form-group">
															<select class="form-control" name="nim" required>
																<option value="" disabled selected>--- Pilih NIM ---</option>
																<?php
																		$no = 1;
								                    $query = mysqli_query($link, "select * from mhs") or die(mysqli_error());
								                    while($data = mysqli_fetch_row($query)){
								                ?>
                                    <option value="<?php echo $data[0]; ?>"><?php echo $data[0]." - ".$data[1]; ?></option>
																<?php
															     }
																?>
															</select>
                            </div>
                            <div class="form-group">
															<select class="form-control" name="kd_kelas" required>
																<option value="" disabled selected>--- Pilih KELAS ---</option>
																<?php
																		$no = 1;
								                    $query = mysqli_query($link, "select * from v_kelas") or die(mysqli_error());
								                    while($data = mysqli_fetch_row($query)){
								                ?>
                                    <option value="<?php echo $data[0]; ?>"><?php echo $data[6]." - ".$data[1]; ?></option>
																<?php
															     }
																?>
															</select>
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


<!-- --------------------------------------------------- EDIT --------------------------------------------------- -->
<div class="modal fade" id="myEdit" role="dialog">
    	<div class="modal-dialog modal-sm">

      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Edit Data Ambil Kelas</h4>
        		</div>
                <form action="?page=ambil_kelas" method="post" id="frm-ambil_kelas">
        		<div class="modal-body">
                    	<fieldset>
                        <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">

														<?php
															$nim = get_data('ambil_kelas', 'id', $_GET['id'], 'nim');
															$kd_kelas = get_data('ambil_kelas', 'id', $_GET['id'], 'kd_kelas');
														?>

														<div class="form-group">
																<select class="form-control" name="nim" required>
																	<option value="" disabled selected>--- Pilih NIM ---</option>
																	<?php
									                    $query = mysqli_query($link, "select * from mhs") or die(mysqli_error());
									                    while($data = mysqli_fetch_row($query)){
									                ?>
	                                    <option <?php if($nim == $data[0]){ echo "selected";} ?> value="<?php echo $data[0]; ?>"><?php echo $data[0]." - ".$data[1]; ?></option>
																	<?php
																     }
																	?>
																</select>
	                            </div>

	                            <div class="form-group">
																<select class="form-control" name="kd_kelas" required>
																	<option value="" disabled selected>--- Pilih KELAS ---</option>
																	<?php
																			$no = 1;
									                    $query = mysqli_query($link, "select * from v_kelas") or die(mysqli_error());
									                    while($data = mysqli_fetch_row($query)){
									                ?>
	                                    <option <?php if($kd_kelas == $data[0]){ echo "selected";} ?> value="<?php echo $data[0]; ?>"><?php echo $data[6]." - ".$data[1]; ?></option>
																	<?php
																     }
																	?>
																</select>
	                            </div>
                       </fieldset>
        		</div>
        		<div class="modal-footer">
         			<input type="submit" class="btn btn-default" name="edit" value="Simpan">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
                </form>
      		</div>

    	</div>
	</div>
