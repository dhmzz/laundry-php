<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
       body {
       background-image: url('../Login.jpg');
       background-repeat: no-repeat;
       background-size: cover;
    }
    </style>
</head>
<body>
    <!-- id member,tgl,batas waktu,tgl bayar,status,id user -->
    <div style="margin: 30px 200px; background-color: rgb(255, 255, 255); ">   
    <form action="proses_add_transaksi.php" method="post" style="padding : 80px;">
        <h2>Add Transaksi</h2>
        <br>    
        <label for="id_member" class="form-label">Pelanggan :</label>
        <select name="id_member" class="form-control">
            <?php 
            include "koneksi.php";
            $qry_member=mysqli_query($koneksi,"select * from member");
            while($data_member=mysqli_fetch_array($qry_member)){
                echo '<option value="'.$data_member['id_member'].'">'.$data_member['nama'].'</option>';    
            }
            ?>
        </select>
        <br>
        Batas Waktu :  
        <input type="date" name="batas_waktu" value="" class="form-control" require>
        <br>
        <br>
        <table class="table">
            <tr>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Qty</th>
            </tr>
            <?php 
                include "koneksi.php";
                $qry_paket=mysqli_query($koneksi,"select * from paket");
                while($data_paket=mysqli_fetch_array($qry_paket)){
                    echo '<tr>
                        <td> 
                            <input type="checkbox" id="'.$data_paket['id_paket'].'" name="'.$data_paket['id_paket'].'" value="'.$data_paket['id_paket'].'">
                            <label for="'.$data_paket['id_paket'].'"> '.$data_paket['jenis'].'</label></td>
                        <td>
                            <input type="number" name="harga_'.$data_paket['id_paket'].'" value="'.$data_paket['harga'].'" readonly>
                        </td>
                        <td>
                            <input type="number" name="qty_'.$data_paket['id_paket'].'" value="">
                        </td>
                    </tr>';    
                }
            ?>
        </table>
        <input type="submit" value="ADD TRANSAKSI" class="btn btn-primary">
    </form>
</div> 
</body>
</html>