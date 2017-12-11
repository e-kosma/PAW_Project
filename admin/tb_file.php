<?php
	$cek = cek_login($user);
	
	if(isset($_POST['input'])){ input_tb_file(); }
	if(isset($_POST['edit'])){ edit_tb_file(); }
	if(isset($_GET['delete'])){ 
		delete_data('tb_file','kd_file', $_GET['id']);
		}
?>

<div class="panel-heading">Data File
    <ul class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#myModal"><div class="glyphicon glyphicon-plus"></div></a></ul>
</div>
<br>
<!-- ---------------------------------------------------------------view--------------------------------- -->
<div class="panel-body">
	<div style="width:98%; margin:auto"> 
    
          <table id="tabel1" class="table">
            <thead>
              <tr>
                <th>Kode File</th>
                <th>Nama File</th>
                <th>Deskripsi</th>
                <th>Tanggal Upload</th>
                <th>Jam Upload</th>
                <th>Id Upload</th>
                <th>Kode Kelas</th>
                <th>Jenis</th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($link, "select * from tb_file") or die(mysqli_error()); 
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]; ?></td>
                <td><?php echo $data[4]; ?></td>
                <td><?php echo $data[5]; ?></td>
                <td><?php echo $data[6]; ?></td>
                <td><?php echo $data[7]; ?></td>
                <td>
                	<center>
                        <a href="?page=tb_file&id=<?php echo $data[0]; ?>">
                        	<div class="glyphicon glyphicon-edit"></div>
                        </a>
                        <a href="?page=tb_file&delete=y&id=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
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
          			<h4 class="modal-title">Tambah Data File</h4>
        		</div>
                <form action="?page=tb_file" method="post" id="frm-tb_file">
        		<div class="modal-body">
                    	<fieldset>
                        	<div class="form-group">
                            	<input class="form-control" placeholder="Kode File" name="kd_file" type="text" autofocus maxlength="11" required>
                            </div>
                            <div class="form-group">
                            	<input class="form-control" placeholder="Nama File" name="nm_file" type="text" value="" maxlength="100">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Deskripsi" name="deskripsi" type="text" value="" maxlength="15">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Tanggal Upload" name="tgl_upload" type="text" value="" maxlength="100">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Jam Upload" name="jam_upload" type="text" value="" maxlength="100">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Id Upload" name="id_upload" type="text" value="" maxlength="18">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Kode Kelas" name="kd_kelas" type="text" value="" maxlength="18">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Jenis" name="jenis" type="text" value="" maxlength="6">
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
          			<h4 class="modal-title">Edit Data File</h4>
        		</div>
                <form action="?page=tb_file" method="post" id="frm-tb_file">
        		<div class="modal-body">
                    	<fieldset>
                        <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                        	<div class="form-group">
                            	<input class="form-control" placeholder="Nama File" name="nm_file" type="text" autofocus maxlength="11" value="<?php echo $_GET['id']; ?>"  required>
                            </div>
                            <div class="form-group">
                            	<input class="form-control" placeholder="Deskripsi" name="deskripsi" type="text" maxlength="100" value="<?php get_data('tb_file', 'kd_file', $_GET['id'], 'nm_file'); ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Tanggal Upload" name="tgl_upload" type="text" maxlength="100" value="<?php get_data('tb_file', 'tgl_upload', $_GET['id'], 'tgl_upload'); ?>">
                            </div>
                             <div class="form-group">
                              <input class="form-control" placeholder="Id Upload" name="id_upload" type="text" maxlength="18" value="<?php get_data('tb_file', 'id_upload', $_GET['id'], 'id_upload'); ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Kode Upload" name="kd_upload" type="text" maxlength="8" value="<?php get_data('tb_file', 'kd_upload', $_GET['id'], 'kd_upload'); ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Jenis" name="jenis" type="text" maxlength="6" value="<?php get_data('tb_file', 'jenis', $_GET['id'], 'jenis'); ?>">
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
    
    