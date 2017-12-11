<?php
	$cek = cek_login($user);

	if(isset($_POST['input'])){ input_kelas(); }
	if(isset($_POST['edit'])){ edit_kelas(); }
	if(isset($_GET['delete'])){
		delete_data('kelas','kd_kelas', $_GET['id']);
		}
?>

<div class="panel-heading">Data Kelas
    <ul class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#myModal"><div class="glyphicon glyphicon-plus"></div></a></ul>
</div>
<br>
<!-- ---------------------------------------------------------------view--------------------------------- -->
<div class="panel-body">
	<div style="width:98%; margin:auto">

          <table id="tabel1" class="table">
            <thead>
              <tr>
                <th>No</th>
								<th>Nama Matkul</th>
                <th>Nama Kelas</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Nama Dosen</th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
										$no = 1;
                    $sql = mysqli_query($link, "select * from kelas") or die(mysqli_error());
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr>
								<td><?php echo $no; ?></td>
                <td><?php echo get_data("matkul","kd_matkul",$data[6],"nm_matkul"); ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]; ?></td>
                <td><?php echo $data[4]; ?></td>
                <td><?php echo get_data("dosen","nip",$data[5],"nm_dosen"); ?></td>
                <td>
                	<center>
                        <a href="?page=kelas&id=<?php echo $data[0]; ?>">
                        	<div class="glyphicon glyphicon-edit"></div>
                        </a>
                        <a href="?page=kelas&delete=y&id=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
                        	<div class="glyphicon glyphicon-erase"></div>
                        </a>
                    </center>
                </td>
              </tr>
              <?php $no++; } ?>
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
          			<h4 class="modal-title">Tambah Data Kelas</h4>
        		</div>
                <form action="?page=kelas" method="post" id="frm-kelas">
        		<div class="modal-body">
                    	<fieldset>
														<div class="form-group">
															<select class="form-control" name="kd_matkul" required>
															 	<option value="" selected disabled>-- Pilih Matakuliah --</option>
																<?php
																		$sql = mysqli_query($link, "select * from matkul") or die(mysqli_error());
																		while($data = mysqli_fetch_row($sql)){
																				echo "<option value='$data[0]'>$data[1] - $data[0]</option>";
																		}
																 ?>
															</select>
														</div>
                            <div class="form-group" style="width:140px">
															<select class="form-control" name="nm_kelas" required>
															  <option value="" selected disabled>-- Pilih Kelas --</option>
															 	<option value="A">A</option>
															  <option value="B">B</option>
															  <option value="C">C</option>
															  <option value="D">D</option>
																<option value="E">E</option>
																<option value="F">F</option>
																<option value="G">G</option>
																<option value="H">H</option>
															</select>
                            </div>
														<div class="form-group">
															<select class="form-control" name="nip" required>
																<option value="" selected disabled>-- Pilih Dosen --</option>
																<?php
																		$sql = mysqli_query($link, "select * from dosen") or die(mysqli_error());
																		while($data = mysqli_fetch_row($sql)){
																				echo "<option value='$data[0]'>$data[1] - $data[0]</option>";
																		}
																 ?>
															</select>
														</div>
														<div class="form-group">
															<select class="form-control" name="kd_ruang" required>
																<option value="" selected disabled>-- Pilih Ruangan --</option>
																<?php
																		$sql = mysqli_query($link, "select * from ruang") or die(mysqli_error());
																		while($data = mysqli_fetch_row($sql)){
																				echo "<option value='$data[0]'>$data[1]</option>";
																		}
																 ?>
															</select>
														</div>
                           	<div class="form-group" style="width:140px">
															 <select class="form-control" name="hari" required>
																 <option value="" selected disabled>-- Pilih Hari --</option>
																 <option value="Senin">Senin</option>
																 <option value="Selasa">Selasa</option>
																 <option value="Rabu">Rabu</option>
																 <option value="Kamis">Kamis</option>
																 <option value="Jumat">Jumat</option>
															 </select>
                            </div>
                            <div class="form-group" style="width:130px">
															<div class="input-group">
														    <span class="input-group-addon">Jam Masuk</span>
														    <input type="time" class="form-control" name="jam_masuk">
														  </div>
                            </div>
                            <div class="form-group" style="width:130px">
															<div class="input-group">
																<span class="input-group-addon">Jam Keluar</span>
																<input type="time" class="form-control" name="jam_keluar">
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


<!-- --------------------------------------------------- EDIT --------------------------------------------------- -->
<div class="modal fade" id="myEdit" role="dialog">
    	<div class="modal-dialog modal-sm">

      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Edit Data Kelas</h4>
        		</div>
                <form action="?page=kelas" method="post" id="frm-kelas">
        		<div class="modal-body">
                    	<fieldset>
                        <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
												<div class="form-group">
													<select class="form-control" name="kd_matkul" required>
															<option value="" disabled>-- Pilih Matakuliah --</option>
															<?php
																	$sql = mysqli_query($link, "select * from matkul") or die(mysqli_error());
																	while($data = mysqli_fetch_row($sql)){
																			if($data[0]==get_data("kelas","kd_kelas",$_GET['id'],"kd_matkul"))
																				echo "<option value='$data[0]' selected>$data[1] - $data[0]</option>";
																			else
																				echo "<option value='$data[0]'>$data[1] - $data[0]</option>";
																	}
															 ?>
													</select>
												</div>
												<div class="form-group" style="width:140px">
													<select class="form-control" name="nm_kelas" required>
														<option value="" disabled>-- Pilih Kelas --</option>
														<option value="A" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"nm_kelas")=="A") echo "selected" ?>>A</option>
														<option value="B" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"nm_kelas")=="B") echo "selected" ?>>B</option>
														<option value="C" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"nm_kelas")=="C") echo "selected" ?>>C</option>
														<option value="D" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"nm_kelas")=="D") echo "selected" ?>>D</option>
														<option value="E" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"nm_kelas")=="E") echo "selected" ?>>E</option>
														<option value="F" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"nm_kelas")=="F") echo "selected" ?>>F</option>
														<option value="G" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"nm_kelas")=="G") echo "selected" ?>>G</option>
														<option value="H" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"nm_kelas")=="H") echo "selected" ?>>H</option>
													</select>
												</div>
												<div class="form-group">
													<select class="form-control" name="nip" required>

														<option value="" disabled>-- Pilih Dosen --</option>
														<?php
																$sql = mysqli_query($link, "select * from dosen") or die(mysqli_error());
																while($data = mysqli_fetch_row($sql)){
																		if($data[0]==get_data("kelas","kd_kelas",$_GET['id'],"nip"))
																				echo "<option value='$data[0]' selected>$data[1] - $data[0]</option>";
																		else
																				echo "<option value='$data[0]'>$data[1] - $data[0]</option>";
																}
														 ?>
													</select>
												</div>
												<div class="form-group">
													<select class="form-control" name="kd_ruang" required>
														<option value="" disabled>-- Pilih Ruangan --</option>
														<?php
																$sql = mysqli_query($link, "select * from ruang") or die(mysqli_error());
																while($data = mysqli_fetch_row($sql)){
																		if($data[0]==get_data("kelas","kd_kelas",$_GET['id'],"kd_ruang"))
																				echo "<option value='$data[0]' selected>$data[1]</option>";
																		else
																				echo "<option value='$data[0]'>$data[1]</option>";
																}
														 ?>
													</select>
												</div>
												<div class="form-group" style="width:140px">
													 <select class="form-control" name="hari" required>
														 <option value="" selected disabled>-- Pilih Hari --</option>
														 <option value="Senin" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"hari")=="Senin") echo "selected" ?>>Senin</option>
														 <option value="Selasa" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"hari")=="Selasa") echo "selected" ?>>Selasa</option>
														 <option value="Rabu" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"hari")=="Rabu") echo "selected" ?>>Rabu</option>
														 <option value="Kamis" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"hari")=="Kamis") echo "selected" ?>>Kamis</option>
														 <option value="Jumat" <?php if(get_data("kelas","kd_kelas",$_GET['id'],"hari")=="Jumat") echo "selected" ?>>Jumat</option>
													 </select>
												</div>
												<div class="form-group" style="width:130px">
													<div class="input-group">
														<span class="input-group-addon">Jam Masuk</span>
														<input type="time" class="form-control" name="jam_masuk" value="<?php echo get_data("kelas","kd_kelas",$_GET['id'],"jam_masuk"); ?>">
													</div>
												</div>
												<div class="form-group" style="width:130px">
													<div class="input-group">
														<span class="input-group-addon">Jam Keluar</span>
														<input type="time" class="form-control" name="jam_keluar" value="<?php echo get_data("kelas","kd_kelas",$_GET['id'],"jam_keluar"); ?>">
													</div>
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
