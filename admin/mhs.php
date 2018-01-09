<?php
	$cek = cek_login($user);

	if(isset($_POST['input'])){ input_mhs(); }
	if(isset($_POST['edit'])){ edit_mhs(); }
	if(isset($_GET['delete'])){
		delete_data('mhs','nim', $_GET['id']);
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
                <th>Email</th>
                <th>No Hp</th>
                <th>Password</th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($link, "select * from mhs") or die(mysqli_error());
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]; ?></td>
                <td><?php echo $data[4]; ?></td>
                <td>
                	<center>
                        <a href="?page=mhs&id=<?php echo $data[0]; ?>">
                        	<div class="glyphicon glyphicon-edit"></div>
                        </a>
                        <a href="?page=mhs&delete=y&id=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
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
          			<h4 class="modal-title">Tambah Data Mahasiswa</h4>
        		</div>
                <form action="?page=mhs" method="post" id="frm-mhs">
        		<div class="modal-body">
                    	<fieldset>
                        	<div class="form-group">
                            	<input class="form-control" placeholder="NIM" name="nim" type="text" autofocus maxlength="10" required>
                            </div>
                            <div class="form-group">
                            	<input class="form-control" placeholder="Nama Mahasiswa" name="nm_mhs" type="text" value="" maxlength="35">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Email" name="email" type="text" value="" maxlength="50">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="No Hp" name="no_hp" type="text" value="" maxlength="13">
                            </div>
                           <div class="form-group" style="width:150px">
                            	<input class="form-control" placeholder="Password" name="password" type="text" value="" maxlength="12">
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
          			<h4 class="modal-title">Edit Data Mahasiswa</h4>
        		</div>
                <form action="?page=mhs" method="post" id="frm-mhs">
        		<div class="modal-body">
                    	<fieldset>
                        <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                        	<div class="form-group">
                            	<input class="form-control" placeholder="NIM" name="nim" type="text" autofocus maxlength="10" value="<?php echo $_GET['id']; ?>"  required>
                            </div>
                            <div class="form-group">
                            	<input class="form-control" placeholder="Nama Mahasiswa" name="nm_mhs" type="text" maxlength="35" value="<?php echo get_data('mhs', 'nim', $_GET['id'], 'nm_mhs'); ?>">
                            </div>
                             <div class="form-group">
                              <input class="form-control" placeholder="Email" name="email" type="text" maxlength="50" value="<?php echo get_data('mhs', 'nim', $_GET['id'], 'email'); ?>">
                            </div>
                             <div class="form-group">
                              <input class="form-control" placeholder="No Hp" name="no_hp" type="text" maxlength="13" value="<?php echo get_data('mhs', 'nim', $_GET['id'], 'no_hp'); ?>">
                            </div>
                           <div class="form-group" style="width:150px">
                            	<input class="form-control" placeholder="Password" name="password" type="text" value="<?php echo get_data('mhs', 'nim', $_GET['id'], 'password'); ?>" maxlength="12">
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
