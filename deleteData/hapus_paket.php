<?php 
// echo $_GET['id_paket'];
    if($_GET['id_paket']){
        include "koneksi.php";
        $qry_hapus = mysqli_query($koneksi,"DELETE FROM paket where id_paket = '".$_GET['id_paket']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus data');location.href='../paket.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data');location.href='../paket.php';</script>";
        }
    }
?>