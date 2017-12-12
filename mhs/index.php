<?php
	error_reporting(0);
	session_start();
	$user = "HASHMHS";
	include "../config/login.php";
	include "../config/fungsi.php";
	include "../config/koneksi.php";
	cek_login($user);

	if(isset($_GET['page']))
    	$page=$_GET['page'];
	else
		$page="pengumuman";
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
            	<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                <li class="divider"></li>
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
            	<div class="panel panel-default">
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
            	</div>

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
									$sql = mysqli_query($link, "select * from tb_view_kelas where nim = '$_SESSION[id]'");
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
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <!-- <a href="#"><div class="glyphicon glyphicon-chevron-right"></div></a> -->
																				<h6 style="text-align:center">Selamat! tidak ada tugas</h6>
                                    </td>
                                </tr>
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
																			<!-- <a href="#"><div class="glyphicon glyphicon-chevron-right"></div></a> -->
																			<h6 style="text-align:center">tidak ada kelas ganti</h6>
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
							else if($page=="pengumuman")
								include "../config/welcome.php";
                   ?>

            </div>
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

     <script type="text/javascript">
    	$(function() {
        	$('#tabel1').dataTable();
        });
	</script>

</body>
</html>
