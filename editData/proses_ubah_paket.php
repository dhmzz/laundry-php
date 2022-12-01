<?php 
    include "koneksi.php";
    $id_paket = $_POST['id_paket'];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];

    $update = mysqli_query($koneksi,"update paket set jenis='".$jenis."',harga='".$harga."' where id_paket='".$id_paket."'");
    if ($update) {
        echo "<script>alert('Berhasil');location.href='../paket.php';</script>";

    }
    else {
        echo "<script>alert('Gagal');location.href='../member.php';</script>";
    }
?>