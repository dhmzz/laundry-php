<?php 
    include "koneksi.php";
    $harga = $_POST["harga"];
    $jenis = $_POST["jenis"];

    $input = mysqli_query($koneksi,"insert into paket(jenis,harga) values ('".$jenis."','".$harga."')") or die(mysqli_error($koneksi));
    if ($input) {
        echo "<script>alert('berhasil');location.href='../paket.php';</script>";
    }
    else {
        // echo "<script>alert('Gagal');location.href='add_member.php';</script>";
        echo "gagal";  
    }
?>