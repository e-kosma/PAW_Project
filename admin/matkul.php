<?php
	$cek = cek_login($user);
	
	if(isset($_POST['input'])){ input_matkul(); }
	if(isset($_POST['edit'])){ edit_matkul(); }
	if(isset($_GET['delete'])){ 
		delete_data('matkul','kd_matkul', $_GET['id']);
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
                <th>Kode Matakuliah</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($link, "select * from matkul") or die(mysqli_error()); 
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td>
                	<center>
                        <a href="?page=matkul&id=<?php echo $data[0]; ?>">
                        	<div class="glyphicon glyphicon-edit"></div>
                        </a>
                        <a href="?page=matkul&delete=y&id=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
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
          			<h4 class="modal-title">Tambah Data Matakuliah</h4>
        		</div>
                <form action="?page=matkul" method="post" id="frm-matkul">
        		<div class="modal-body">
                    	<fieldset>
                        	<div class="form-group">
                            	<input class="form-control" placeholder="Kode Matakuliah" name="kd_matkul" type="text" autofocus maxlength="8" required>
                            </div>
                            <div class="form-group">
                            	<input class="form-control" placeholder="Nama Matakuliah" name="nm_matkul" type="text" value="" maxlength="35">
                            </div>
                           <div class="form-group" style="width:55px">
                            	<input class="form-control" placeholder="SKS" name="sks" type="text" value="" maxlength="1">
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
          			<h4 class="modal-title">Edit Data Matakuliah</h4>
        		</div>
                <form action="?page=matkul" method="post" id="frm-matkul">
        		<div class="modal-body">
                    	<fieldset>
                        <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                        	<div class="form-group">
                            	<input class="form-control" placeholder="Kode Matakuliah" name="kd_matkul" type="text" autofocus maxlength="8" value="<?php echo $_GET['id']; ?>"  required>
                            </div>
                            <div class="form-group">
                            	<input class="form-control" placeholder="Nama Matakuliah" name="nm_matkul" type="text" maxlength="35" value="<?php get_data('matkul', 'kd_matkul', $_GET['id'], 'nm_matkul'); ?>">
                            </div>
                           <div class="form-group" style="width:55px">
                            	<input class="form-control" placeholder="SKS" name="sks" type="text" value="<?php get_data('matkul', 'kd_matkul', $_GET['id'], 'sks'); ?>" maxlength="1">
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
    
    