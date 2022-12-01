<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Paket</title>
</head>
<body>
    <?php
    include "koneksi.php";
    $qry_get_paket=mysqli_query($koneksi,"select * from paket where id_paket = '".$_GET["id_paket"]."'");
    $dt_paket=mysqli_fetch_array($qry_get_paket);
    ?> 
    <div style="margin: 30px 200px; background-color: rgb(255, 255, 255); box-shadow: black 2px 5px; box-shadow: #838383 0px -8px 20px; border-radius: 0px;">   
    <form action="proses_ubah_paket.php" method="post" style="padding : 80px;">
        <h2>Edit Paket</h2>
        <input type="hidden" name="id_paket" id="" value="<?=$dt_paket['id_paket']?>">
        <br>
        Nama Paket :  
        <input type="text" name="jenis" value="<?php echo $dt_paket['jenis'] ?>" class="form-control" require>
        <br>
        Harga : 
        <input type="number" name="harga" value="<?php echo $dt_paket['harga'] ?>" class="form-control" require>
        <br>
        <input type="submit" value="Add Paket">
    </form>
</div> 
</body>
</html>