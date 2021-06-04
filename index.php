<?php
include "config.php";
$nama = $_SESSION['nama'];
$_SESSION['lock'] = "unlock";
if ($_SESSION['tipe'] == 1) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon.png" type="image/ico" />

    <title> Sistem Informasi Akademik UMP </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <center>
                &nbsp; <a href="index.php" class="fa fa-mortar-board fa-2x" style="color:#fff;"><span>
                    <font size="4.95" color="white" face="Helvetica Neue"><br>APLIKASI REKAPITULASI PERKULIAHAN</font>
                  </span></a>
              </center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <br>
              <br>
              <div class="profile_pic">
                <img src="assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$_SESSION['nama']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-desktop"></i> Data Mahasiswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil_mhs">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah_mhs">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Data Kelas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil_kls">Tampil Kelas</a></li>
                      <li><a href="index.php?page=tambah_kls">Tambah Kelas</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a style="width: 100%;" data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <!-- <li class="nav-item dropdown open" >
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/image.jpg" alt="">Fauzan Hilmi
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="#"> Profile</a>
                      <a class="dropdown-item"  href="#">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    <a class="dropdown-item"  href="#"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div> 
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">
          <?php
          $queries = array();
          parse_str($_SERVER['QUERY_STRING'], $queries);
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
          switch ($queries['page']) {
            case 'tampil_mhs':
              # code...
              include 'tampilmhs.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'tambah_mhs':
              # code...
              include 'tambahmhs.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'tambah_pertemuan':
              # code...
              include 'tambahpertemuan.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'edit_mhs':
              # code...
              include 'editmhs.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'edit_kls':
              # code...
              include 'editkls.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'tampil_kls':
              # code...
              include 'tampilkls.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'tambah_kls':
              # code...
              include 'tambahkls.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'detailkelas':
              # code...
              include 'detailkelas.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'pertemuankelas':
              # code...
              include 'pertemuankelas.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'hapuspengampu':
              # code...
              include 'hapuspengampu.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'hapusmhs':
              # code...
              include 'hapusmhs.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'hapuskls':
              # code...
              include 'hapuskls.php';
              $_SESSION['lock'] = "lock";
              break;
            default:
              #code...
              include 'home.php';
              $_SESSION['lock'] = "lock";
              break;
          }
          ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright @ 2021 Aplikasi Presensi Mahasiswa : Kelompok Berlima
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>
  </body>

  </html>
<?php
} else if ($_SESSION['tipe'] == 2) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon.png" type="image/ico" />

    <title> Sistem Informasi Akademik UMP </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <center>
                &nbsp; <a href="index.php" class="fa fa-mortar-board fa-2x" style="color:#fff;"><span>
                    <font size="4.95" color="white" face="Helvetica Neue"><br>APLIKASI REKAPITULASI PERKULIAHAN</font>
                  </span></a>
              </center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <br>
              <br>
              <div class="profile_pic">
                <img src="assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><h2><?=$_SESSION['nama']?></h2></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                  </li>
                  <li><a href="index.php?page=daftarkelas"><i class="fa fa-home"></i> Daftar Kelas <span class="fa fa-chevron"></span></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a style="width: 100%;" data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
              <ul class=" navbar-right">
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">
          <?php
          $queries = array();
          parse_str($_SERVER['QUERY_STRING'], $queries);
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
          switch ($queries['page']) {
            case 'daftarkelas':
              # code...
              include 'daftarkelas.php';
              $_SESSION['lock'] = "lock";
              break;
            case 'detailkls':
              # code...
              include 'detailkls.php';
              $_SESSION['lock'] = "lock";
              break;
            default:
              #code...
              include 'home.php';
              $_SESSION['lock'] = "lock";
              break;
          }
          ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright @ 2021 Aplikasi Presensi Mahasiswa : Kelompok Berlima
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>
  </body>

  </html>
<?php
} else {
?>
  <script>
    document.location.href = "login.php";
  </script>
<?php
}
?>