<?php 
  
    session_start();

    //jika tidak ada session/session kosong, maka user akan di arahkan ke halaman login
    if (empty($_SESSION['username'])) {
        header("Location: ../../index.php");
    }
    require_once 'config.php';
    $query = mysqli_query($db, "SELECT *FROM data_pegawai");
    $aktif = 'pegawai';
    $no = 1;
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manajamen HRD || Data Pegawai</title>
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

  <!-- CSS Datatables -->
  <link rel="stylesheet" href="../../Assets/resources/datatables/datatables.min.css">
  <link rel="stylesheet" href="../../Assets/resources/fonts/stylesheet.css">
  <link rel="stylesheet" href="../../Assets/resources/css/bootstrap.min.css">
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
    <a href="../index.php" class="brand-link">
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
              <li class="breadcrumb-item active">Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
    <section class="content">

  <div class="col-md">
    <div class="title">
         <a href="../index.php">
           <button class="btn btn-primary" style="float: right; margin-bottom: 20px">
           Kembali
         </button>
         </a>
        </div>
          <div class="table-responsive">

        <table id="table_id" class="dataTable table table-bordered" width="100%">
            <thead style="text-align: center;">
                <tr>
                    <th width="50px">No</th>
                    <th width="100px">Foto</th>
                    <th>Nama </th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Bagian Pekerjaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php while($row = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><img src="../images/pegawai/<?= $row['foto'] ?>" alt="" width="100%" class="img-thumbnail"></td>
                <td><a href="detail_pegawai.php?id=<?= $row['id'] ?>"><?= $row['nama'] ?></a></td>
                <td><?= $row['no_hp'] ?></td>
                <td><?= $row['jk'] ?></td>
                <td><?= $row['bagian'] ?></td>
                <td width="140">
                      <a href="ubah.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Ubah</a>
                      <a href="hapus_data.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                    </td>
              </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    
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


  <!-- DataTables -->
  <script src="../../Assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../Assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../Assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../Assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../Assets/resources/datatables/datatables.min.js"></script>
  <script src="../../Assets/resources/datatables/datatable.js"></script>
</body>
</html>
