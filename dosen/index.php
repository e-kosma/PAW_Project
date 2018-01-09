<?php
	error_reporting(0);
	session_start();
	$user = "HASHDOSEN";
	include "../config/login.php";
	include "../config/fungsi.php";
	include "../config/koneksi.php";
	cek_login($user);

	if(isset($_GET['page']))
    	$page=$_GET['page'];
	else
		$page="pengumuman";

		if(isset($_POST['input_tugas'])){ input_tugas(); }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel Admin</title>
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../asset/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
      <div class="wrapper">
        <div class="navbar-header">
          <a class="navbar-brand" href="/e-kosma/">E-KOSMA</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        	<div class="navbar-brand" style="font-size:14px">Selamat Datang! <?php echo $_SESSION['name']; ?></div>
          	<li class="dropdown">
          	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
            	<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
            	<!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                <li class="divider"></li> -->
                <li><a href="../config/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
           </ul>
           <!-- /.dropdown-user -->
         </li>
        </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3">


            <div class="panel-group" id="accordion">
            	<!--<div class="panel panel-default">
                  <div class="panel-heading">
                  	<h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsezero"><span class="glyphicon glyphicon-folder-close">
                            </span>Pengumuman</a>
                    </h4>
                  </div>
                  <div id="collapsezero" class="panel-collapse collapse">
                        <div class="panel-body">
                        	<div class="container">
                            	Isi Pengumuman
                            </div>
                        </div>
                  </div>
            	</div> -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span>Materi Kuliah</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">

                                <?php
									$sql = mysqli_query($link, "select kelas.kd_kelas, kelas.nm_kelas, matkul.nm_matkul from kelas,matkul,dosen where kelas.nip = '$_SESSION[id]' and kelas.kd_matkul = matkul.kd_matkul");
									$count = mysqli_num_rows($sql);
									if($count>0){
										while($data = mysqli_fetch_assoc($sql)){
								 ?>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <a href="?page=materi&id=<?php echo $data['kd_kelas']; ?>"><?php echo $data['nm_matkul']." - ".$data['nm_kelas']; ?></a>
                                    </td>
                                </tr>
                                <?php
										}

									}else{
								?>

                                <tr>
                                    <td>
                                        <h6 style="text-align:center">Tidak ada kelas yang diambil</h6>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span>Tugas</a>
														<ul class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#modalTugas"><div class="glyphicon glyphicon-plus"></div></a></ul>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
															<?php
								$sql = mysqli_query($link, "select kelas.kd_kelas, kelas.nm_kelas, matkul.nm_matkul from kelas,matkul,dosen where kelas.nip = '$_SESSION[id]' and kelas.kd_matkul = matkul.kd_matkul");
								$count = mysqli_num_rows($sql);
								if($count>0){
									while($data = mysqli_fetch_assoc($sql)){
							 ?>
															<tr>
																	<td>
																			<span class="glyphicon glyphicon-chevron-right"></span>
																			<a href="?page=tugas&id=<?php echo $data['kd_kelas']; ?>"><?php echo $data['nm_matkul']." - ".$data['nm_kelas']; ?></a>
																	</td>
															</tr>
															<?php
									}

								}else{
							?>

															<tr>
																	<td>
																			<h6 style="text-align:center">Tidak ada tugas</h6>
																	</td>
															</tr>
															<?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Kelas Ganti</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="#"><div class="glyphicon glyphicon-chevron-right"></div></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-9">
            <div class="panel panel-default">


				   <?php

                            if($page=="materi")
                                include "materi.php";
                            else if($page=="dosen")
                                include "dosen.php";
														else if($page=="tugas")
		                            include "tugas.php";
							else if($page=="pengumuman")
								include "welcome.php";
                   ?>

            </div>
        </div>
    </div>
</div>


<!------------------------------INSERT TUGAS------------------------------------------------->
<div class="modal fade" id="modalTugas" role="dialog">
    	<div class="modal-dialog modal-sm">

      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Tambah Data Tugas</h4>
        		</div>
                <form action="index.php" method="post" id="frm-ambil_kelas">
        		<div class="modal-body">
                    	<fieldset>
                        	<div class="form-group">
															<select class="form-control" name="kd_kelas" required>
																<option value="" disabled selected>--- Pilih Kelas ---</option>
																<?php
																		$no = 1;
								                    $query = mysqli_query($link, "select * from v_kelas where nm_dosen = '$_SESSION[name]'") or die(mysqli_error());
								                    while($data = mysqli_fetch_row($query)){
								                ?>
                                    <option value="<?php echo $data[0]; ?>"><?php echo $data[6]." - ".$data[1]; ?></option>
																<?php
															     }
																?>
															</select>
                            </div>
                            <div class="form-group">
															<input class="form-control" type="text" name="nm_tugas" required placeholder="Nama Tugas">
                            </div>
														<div class="form-group">
															<textarea class="form-control" name="deskripsi" placeholder="Deskripsi">
															</textarea>
														</div>
															Tanggal Pengumpulan :
														<div class="form-group" style="width:160px">
															<input  class="form-control" type="date" name="date_line" required>
                            </div>
															Jam :
														<div class="form-group" style="width:160px">
															<input class="form-control" type="time" name="jam" required>
                            </div>
                       </fieldset>
        		</div>
        		<div class="modal-footer">
         			<input type="submit" class="btn btn-default" name="input_tugas" value="Tambah">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
                </form>
      		</div>

    	</div>
	</div>


<!-- ------------------------------------------------------------------------ -->
	<script src="../asset/js/jquery.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/dataTables/jquery.dataTables.js"></script>
    <script src="../asset/js/dataTables/dataTables.bootstrap.js"></script>


	 <?php
     	if(isset($_GET['id']) && !isset($_GET['page'])){
			echo "<script>
				$('#myEdit').modal('show');
			</script>";
		}
	 ?>

	 <?php
     	if(isset($_GET['id']) && isset($_GET['page']) && isset($_GET['tgs'])){
			echo "<script>
				$('#showTgs').modal('show');
			</script>";
		}
	 ?>

     <script type="text/javascript">
    	$(function() {
        	$('#tabel1').dataTable();
        });
	</script>

</body>
</html>
