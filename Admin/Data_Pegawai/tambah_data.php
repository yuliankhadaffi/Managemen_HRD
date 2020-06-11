<?php 
  session_start();

    //jika tidak ada session/session kosong, maka user akan di arahkan ke halaman login
    if (empty($_SESSION['username'])) {
       header("Location: ../../index.php");
    }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manajamen HRD || Tambah Data</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../Assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="../../Assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
  <link rel="stylesheet" href="../../Assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../Assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../Assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../Assets/plugins/summernote/summernote-bs4.css">
</head>
<body class="hold-transition sidebar-mini pace-primary">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-default navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">     
      
     <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu nav-item">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              Hi, <?php echo $_SESSION['nama']; ?>
            </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Human Resources Development
                  <small>Manajemen HRD</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
               <a href="#">
                <button class="btn btn-primary btn-flat" style="float: left;">Profile</button>
              </a>

              <a href="#" data-toggle="modal" data-target="#logoutModal">
                <button class="btn btn-danger btn-flat" style="float: right;">Keluar</button>
              </a>
              </li>
            </ul>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../Assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
       <span class="brand-text font-weight-light">HRD System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../Assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="../index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard               
              </p>
            </a>
         <hr>
          
          
          <li class="nav-item">
            <a href="data_pegawai.php?data=master" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Data Pegawai
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="tambah_data.php?data=master" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
                Tambah Data
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../User/index.php?data=user" class="nav-link">
              <i class="nav-icon fa fa-plus"></i>
              <p>
                Manajemen User
              </p>
            </a>
          </li>
          
         
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php include '../page/waktu.php';?>
              <li class="breadcrumb-item"></li>
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

       <!-- Main content -->
    <section class="content">
  <div class="col-md" style="margin-top: -40px">
        <div class="title mb-3">
         <a href="../index.php">
           <button class="btn btn-primary" style="float: right; margin-bottom: 20px">
           Kembali
         </button>
         </a>
        </div>

        <div class="card-body">
            <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">

              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama lengkap anda" autocomplete="off" autofocus  required="required" name="nama">
              </div>
              <div class="form-group">
                <label for="umur">Umur Anda</label>
                <input type="number" class="form-control" id="umur" placeholder="Umur Anda" autocomplete="off" required name="umur">
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control">
                      <option value="Laki - Laki">Laki Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" class="form-control" id="no_hp" placeholder="no hp" autocomplete="off" required="required" name="no_hp">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" placeholder="tempat lahir" autocomplete="off" required="required" name="tempat_lahir">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" placeholder="tanggal lahir" autocomplete="off" required="required" name="tgl_lahir">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                   <div class="form-group">
                    <label for="jamkerja">Jam Kerja</label>
                    <input type="text" class="form-control" id="jamkerja" required name="jamkerja" placeholder="Enter Here!" autocomplete="off">
                  </div>

                 

                  <div class="form-group">
                    <label for="Pangkat">Sallary (Gaji)</label>
                    <input type="text" class="form-control" id="gaji" required="required" name="gaji" placeholder="Masukan besaran gaji pegawai" autocomplete="off">
                  </div>

                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="Golongan">Bagian Pekerjaan</label>
                    <select name="bagian" id="golongan" class="form-control">
                      <option value="Bagian Pemasaran">Bagian Pemasaran</option>
                      <option value="Bagian Gudang">Bagian Gudang</option>
                      <option value="Bagian Tatakelola">Bagian Tatakelola</option>
                      </select>
                  </div>

                 <!-- jaba -->
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file" id="foto" autocomplete="off" required="required" name="foto">
                    <p style="color: red;"><i>Size photo kurang dari 1MB</i></p>
                  </div>

                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="masukan secara lengkap alamat anda"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah</button>
                <button type="reset" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
                <a href="pegawai.php?data=pegawai" class="btn btn-sm btn-secondary">Kembali</a>
              </div>
            </form>
          </div>

      
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong><?php echo "Copyright @" .(int)date('Y') ." Administrator"; ?> </strong> All rights reserved.
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


 <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar dari laman ini,?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan tombol "Keluar" untuk mengakhiri laman ini</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="../logout.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>

<!-- js pace -->
  <!-- jQuery -->
  <script src="../../Assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- pace-progress -->
  <script src="../../Assets/plugins/pace-progress/pace.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../Assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../Assets/dist/js/demo.js"></script>
<!-- end js -->
</body>
</html>
