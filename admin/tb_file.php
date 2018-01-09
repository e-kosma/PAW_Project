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
                <th>No</th>
                <th>Nama File</th>
                <th>Deskripsi</th>
                <th>Tanggal Upload</th>
                <th>Id Upload</th>
                <th>Kode Kelas</th>
                <th>Jenis</th>
                <th width="40px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
										$no =1;
                    $sql = mysqli_query($link, "select * from tb_file") or die(mysqli_error());
                    while($data = mysqli_fetch_row($sql)){
                ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
                <td><?php echo $data[3]." ".$data[4]; ?></td>
								<td><?php echo $data[5]; ?></td>
                <td><?php echo $data[6]; ?></td>
                <td><?php echo $data[7]; ?></td>
                <td>
                	<center>
                        <a href="?page=tb_file&delete=y&id=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
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
