<?php 
    session_start();
    if($_SESSION['status_login']!=true){
      header('location: home.php');
    }
?>
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
                            <a class="dropdown-item d-flex align-items-center" href="logout.php ">
                                <i class="bi bi-box-arrow-right"></i>
                                <span href="logout.php">Sign Out</span>
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
            <h1>Transaksi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Laundry</a></li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Transaksi <a class="bi bi-plus-circle" href="./createData/add_transaksi.php"></a></h5>                                
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">No Transaksi</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status Laundry</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Tanggal Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qry_transaksi = mysqli_query($koneksi,"SELECT a.*, b.nama, SUM(c.harga) as total FROM transaksi a JOIN member b ON a.id_member=b.id_member JOIN detail_transaksi c ON a.id_transaksi=c.id_transaksi GROUP BY a.id_transaksi ORDER by id_transaksi DESC");
                                    while($data_transaksi=mysqli_fetch_array($qry_transaksi)){
                                        $qry_detail_transaksi = mysqli_query($koneksi,"SELECT a.*, b.jenis FROM detail_transaksi a JOIN paket b ON a.id_paket=b.id_paket WHERE a.id_transaksi = '".$data_transaksi['id_transaksi']."'");
                                        $detail = '<table border="0" style="border-collapse: collapse;">';
                                        while($data_detail_transaksi=mysqli_fetch_array($qry_detail_transaksi)){
                                            $detail .= '
                                            <tr>
                                            <td>'.$data_detail_transaksi['jenis'].'</td>
                                            <td>('.$data_detail_transaksi['qty'].')</td>
                                            <td>'.$data_detail_transaksi['harga'].'</td>
                                            </tr>
                                            ';
                                        }
                                        $detail .= '</table>'; 
                                        ?>    
                                        <tr>
                                            <td><?=$data_transaksi['tgl']?></td>
                                            <td><?=$data_transaksi['id_transaksi']?></td>
                                            <td><?=$data_transaksi['nama']?></td>
                                            <td><?=$detail?></td>
                                            <td>Rp <?=$data_transaksi['total']?></td>  
                                            <td>
                                            <form action="./editData/ubah_status.php" method="post">
                                                <input type="hidden" name="id_transaksi" value="<?=$data_transaksi['id_transaksi']?>">
                                                <select name="status" class="form-select">
                                                    <option value=""disabled selected><?=$data_transaksi['status']?></option>
                                                    <option value="baru">Baru</option>
                                                    <option value="proses">Proses</option>
                                                    <option value="selesai">Selesai</option>
                                                    <option value="diambil">DIambil</option>
                                                </select>
                                                <input type="submit" value="OK" class="btn btn-primary">
                                            </form>                  
                                            </td>                   
                                            <td>
                                                <form action="ubah_status_bayar" method="get">
                                                    <div name="dibayar" class="form-select">
                                                        <option value="" selected><?=$data_transaksi['dibayar']?></option>
                                                    </div>
                                                    <a type="submit" value="" name="status" class="btn btn-success" href="./editData/ubah_bayar.php?id_transaksi=<?php echo $data_transaksi['id_transaksi']?>">
                                                        Bayar
                                                    </a>
                                                </form>                   
                                            </td> 
                                            <td><?=$data_transaksi['tgl_bayar']?></td>
                                            <td>                                        
                                            <form action="laporan.php" method="POST">
                                                <input onclick="window.print();" type="hidden" name="laporan" value="<?=$data_transaksi['id_transaksi']?>">
                                                <input type="submit" value="Lihat laporan"> 
                                            </form>                  
                                            </td>
                                        </tr>               
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