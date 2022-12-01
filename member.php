<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LAUNDRY</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <?php include "kunci.php"?>
</head>
<body>
    <?php include "koneksi.php" ?>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="icon.png" alt="">
                <span class="d-none d-lg-block">LAUNDRY</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="padding: 0">
                        <li>
                            <a class="dropdown-item d-flex align-items-center"href="logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="home.php">
          <i class="bi bi-grid"></i>
          <span>Transaksi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="member.php">
        <i class="bi bi-person-bounding-box"></i>
          <span>Member</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin.php">
          <i class="bi bi-person"></i>
          <span>Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="paket.php">
        <i class="bi bi-box"></i>
          <span>Paket</span>
        </a>
      </li>
    </ul>
    </aside>
    <!-- akhir navbar -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Member</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Laundry</a></li>
                    <li class="breadcrumb-item active">Member</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Member</h5>
                            <table>
                                <thead>
                                <tr>
                                    <th style="width : 95%">
                                        <form action="member.php" method ="POST">           
                                        <input  type="text" name="cari" class="form-control" placeholder="Masukkan Keyword Pencarian id/nama member">      
                                    </th>
                                    <th style="width : 5%">
                                        <a type="button" class="btn btn-primary" href="./createData/add_member.php">Add Member</a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "koneksi.php";
                                    if (isset($_POST["cari"])) {
                                        //jika ada keyword pencarian
                                        $cari=$_POST["cari"];
                                        $qry_member=mysqli_query($koneksi,  "select * from member where id_member like'%$cari%' or nama like '%$cari%' or alamat like '%$cari%'");
                                    }else {
                                        //jika tidak ada, tampil semua
                                        $qry_member=mysqli_query($koneksi,"select * from member");
                                    }
                                    ?>
                                </tbody>
                                </table>
                            </form>
                            <br>
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">id Member</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">No Telp</th>                        
                                        </tr>
                                    </thead>
                                    <div>           
                                    </div>
                                    <tbody>
                                        <?php
                                            include "koneksi.php";
                                            while($data_member=mysqli_fetch_array($qry_member)){?>
                                                <div>
                                                <tr>
                                                    <td><?php echo $data_member["id_member"];?></td>
                                                    <td><?php echo $data_member["nama"];?></td>
                                                    <td><?php echo $data_member["alamat"];?></td>
                                                    <td><?php echo $data_member["jenis_kelamin"];?></td>
                                                    <td><?php echo $data_member["tlp"];?></td>
                                                    <td>
                                                    <a href="./editData/ubah_member.php?id_member=<?php echo $data_member['id_member']?>" class="btn btn-success">Ubah</a>
                                                    <a href="./deleteData/hapus_member.php ?id_member=<?php echo $data_member['id_member']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                                                    </td>             
                                                </tr>
                                                </div>
                                                </div>
                                            <?php
                                            }
                                        ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>