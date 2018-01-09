<?php
	$cek = cek_login($user);

	if(isset($_POST['upload'])){ upload_file(); }
	if(isset($_GET['file'])){ download_file(); }
	if(isset($_GET['delete'])){
		delete_data('tb_file','kd_file', $_GET['delete']);
		}
?>

<div class="panel-heading">Materi Kuliah
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
                <th><center>Nama File</center></th>
                <th><center>Deskripsi</center></th>
                <th><center>Upload at</center></th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
					$no = 1;
                    $sql = mysqli_query($link, "select * from tb_file where kd_kelas = '$_GET[id]' and id_upload = '$_SESSION[id]'") or die(mysqli_error());
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr align="center">
                <td><?php echo $no; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]." ".$data[4] ?></td>
                <td>
                	<center>
                        <a href="?page=materi&id=<?php echo $_GET['id']; ?>&file=<?php echo $data[1]; ?>">
                        	<div class="glyphicon glyphicon-download-alt"></div>
                        </a>
                        <a href="?page=materi&id=<?php echo $_GET['id']; ?>&delete=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
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

<!-- --------------------------------------------------- UPLOAD --------------------------------------------------- -->
<div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog modal-sm">

      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Upload File</h4>
        		</div>
                <form enctype="multipart/form-data" action="?page=materi&id=<?php echo $_GET['id'] ?>" method="post">
        		<div class="modal-body">
                    	<fieldset>
                        	<div class="form-group">
                            	<textarea class="form-control" name="desc" placeholder="Desckripsi File"></textarea>
                            </div>
                           <div class="form-group">
                            	<input name="file_upload" type="file">
                            </div>
                       </fieldset>
        		</div>
        		<div class="modal-footer">
         			<input type="submit" class="btn btn-default" name="upload" value="Upload">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
                </form>
      		</div>

    	</div>
	</div>
