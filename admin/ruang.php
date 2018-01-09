<?php
	$cek = cek_login($user);

	if(isset($_POST['input'])){ input_ruang(); }
	if(isset($_POST['edit'])){ edit_ruang(); }
	if(isset($_GET['delete'])){
		delete_data('ruang','kd_ruang', $_GET['id']);
		}
?>

<div class="panel-heading">Data Ruang
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
								<th>Kode Ruang</th>
                <th>Nama Ruang</th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
										$no=1;
                    $sql = mysqli_query($link, "select * from ruang") or die(mysqli_error());
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr>
                <td><?php echo $no; ?></td>
								<td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>

                <td>
                	<center>
                        <a href="?page=ruang&id=<?php echo $data[0]; ?>">
                        	<div class="glyphicon glyphicon-edit"></div>
                        </a>
                        <a href="?page=ruang&delete=y&id=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
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
          			<h4 class="modal-title">Tambah Data Ruangan</h4>
        		</div>
                <form action="?page=ruang" method="post" id="frm-kelas">
        		<div class="modal-body">
                    	<fieldset>
                        	  <div class="form-group">
                            	<input class="form-control" placeholder="Kode Ruang" name="kd_ruang" type="text" maxlength="11" readonly>
                            </div>
                            <div class="form-group">
                            	<input class="form-control" placeholder="Nama Ruang" name="nm_ruang" type="text" maxlength="10" autofocus required>
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
          			<h4 class="modal-title">Edit Data Ruang</h4>
        		</div>
                <form action="?page=ruang" method="post" id="frm-ruang">
        		<div class="modal-body">
                    	<fieldset>
                        <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                        	<div class="form-group">
                            	<input class="form-control" placeholder="Kode Ruang" name="kd_ruang" type="text" autofocus maxlength="11" value="<?php echo $_GET['id']; ?>"  required readonly>
                            </div>
                            <div class="form-group">
                            	<input class="form-control" placeholder="Nama Ruang" name="nm_ruang" type="text" maxlength="10" value="<?php echo get_data('ruang', 'kd_ruang', $_GET['id'], 'nm_ruang'); ?>">
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
