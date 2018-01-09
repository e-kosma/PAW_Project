<?php
	error_reporting(0);
	session_start();
	$user = "HASHADMIN";
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
          <a class="navbar-brand" href="/e-kosma">E-KOSMA</a>
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
                            </span>Master Data</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="?page=matkul">Matakuliah</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="?page=kelas">Kelas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="?page=ruang">Ruangan</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="?page=dosen">Dosen</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="?page=mhs">Mahasiswa</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="?page=admin">Admin</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="?page=ambil_kelas">Ambil Kelas</a>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="#">Kelas Ganti</a>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-chevron-right"></span><a href="?page=file">File</a>
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

                            if($page=="matkul")
                                include "matkul.php";
                            else if($page=="kelas")
                                include "kelas.php";
														else if($page=="ruang")
		                            include "ruang.php";
														else if($page=="dosen")
				                        include "dosen.php";
														else if($page=="mhs")
						                     include "mhs.php";
														else if($page=="admin")
		 						                 include "admin.php";
														else if($page=="ambil_kelas")
		 		 						             include "ambil_kelas.php";
														else if($page=="file")
																 include "tb_file.php";
														else if($page=="pengumuman")
																include "welcome.php";
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
     	if(isset($_GET['id']) && !isset($_GET['delete'])){
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
