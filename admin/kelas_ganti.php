<?php
  $cek = cek_login($user);
  
  if(isset($_POST['input'])){ input_kelas_ganti(); }
  if(isset($_POST['edit'])){ edit_kelas_ganti(); }
  if(isset($_GET['delete'])){ 
    delete_data('kelas_ganti','kd_kelas_kelas', $_GET['id']);
    }
?>

<div class="panel-heading">Data Kelas Ganti
    <ul class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#myModal"><div class="glyphicon glyphicon-plus"></div></a></ul>
</div>
<br>
<!-- ---------------------------------------------------------------view--------------------------------- -->
<div class="panel-body">
  <div style="width:98%; margin:auto"> 
    
          <table id="tabel1" class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>NIM</th>
                <th>Kode Ruang</th>
                <th>Deskripsi</th>
                <th width="80px"><center><div class="fa fa-gear fa-fw"></div></center></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($link, "select * from kelas_ganti") or die(mysqli_error()); 
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
                <td>
                  <center>
                        <a href="?page=kelas_ganti&id=<?php echo $data[0]; ?>">
                          <div class="glyphicon glyphicon-edit"></div>
                        </a>
                        <a href="?page=kelas_ganti&delete=y&id=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin Akan Menghapus ?')">
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
                <h4 class="modal-title">Tambah Data Kelas Ganti</h4>
            </div>
                <form action="?page=kelas" method="post" id="frm-kelas">
            <div class="modal-body">
                      <fieldset>
                            <div class="form-group">
                              <input class="form-control" placeholder="Tanggal" name="tanggal" type="text" autofocus maxlength="8" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" plceholder="Jam Mulai" name="jam_mulao" type="text" value="" maxlength="35">
                            </div>
                           <div class="form-group" style="width:55px">
                              <input class="form-control" placeholder="Jam Selesai" name="jam_selesai" type="text" value="" maxlength="7">
                            </div>
                            <div class="form-group">
                              <input class="form-control" plceholder="NIM" name="nim" type="text" value="">
                            </div>
                             <div class="form-group">
                              <input class="form-control" plceholder="Kode Ruang" name="kd_ruang" type="text" value="" maxlenght="11">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Deskripsi" name="deskripsi" type="text" autofocus maxlength="8" required>
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
                <h4 class="modal-title">Edit Data Kelas Ganti</h4>
            </div>
                <form action="?page=kelas_ganti" method="post" id="frm-kelas_ganti">
            <div class="modal-body">
                      <fieldset>
                        <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                          <div class="form-group">
                              <input class="form-control" placeholder="Tanggal" name="tanggal" type="text" autofocus maxlength="8" value="<?php echo $_GET['id']; ?>"  required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Jam Mulai" name="jam_mulai" type="text" maxlength="35" value="<?php get_data('kelas_ganti', 'jam_mulai', $_GET['id'], 'jam_mulai'); ?>">
                            </div>
                           <div class="form-group" style="width:55px">
                              <input class="form-control" placeholder="Jam Selesai" name="jam_selesai" type="text" value="<?php get_data('kelas_ganti', 'jam_selesai', $_GET['id'], ''); ?>" maxlength="1">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="NIM" name="nim" type="text" autofocus maxlength="10" value="<?php echo $_GET['id']; ?>"  required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Kode Ruang" name="kd_ruang" type="text" autofocus maxlength="11" value="<?php echo $_GET['id']; ?>"  required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Deskripsi" name="deskripsi" type="text" autofocus maxlength="18" value="<?php echo $_GET['id']; ?>"  required>
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
    
    