<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylelaporan.css">
    <?php include "koneksi.php" ?>
</head>
<body>
    <!-- Header tabel -->
    <?php 
        $laporan = $_POST['laporan'];
        $qry_transaksi = mysqli_query($koneksi,"SELECT a.*, b.nama, SUM(c.harga) as total FROM transaksi a JOIN member b ON a.id_member=b.id_member JOIN detail_transaksi c ON a.id_transaksi=c.id_transaksi WHERE a.id_transaksi = '".$laporan."' GROUP BY a.id_transaksi ORDER by id_transaksi DESC");
        $data_transaksi=mysqli_fetch_array($qry_transaksi)      
    ?>  
    <table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
        <thead>
        <tr>
            <td colspan="6" width="485" id="caption">LAUNDY GTG</td>
        </tr>
        <tr>
            <td colspan="2">Nama Pelanggan</td>
            <td class="left kop"><?=$data_transaksi['nama']?></td>
            <td></td>
            <td>Tanggal</td>
            <td class="left kop"><?=$data_transaksi['tgl']?></td>
        </tr>
        <tr>
            <td colspan="2">No Transaksi</td>
            <td class="left kop"><?=$data_transaksi['id_transaksi']?></td>
            <td></td>
            <td>Perihal</td>
            <td class="left kop">Tagihan laundry</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>
    <!-- Akhir tabel -->
    <!-- Awal tabel body -->
       
        <tbody>
            <tr>
                <th>No</th>
                <th>JENIS</th>
                <th>JUMLAH</th>
                <th>TOTAL</th>
                <th colspan="2">KETERANGAN</th>
            </tr>
            
                <?php 
                $qry_nota = mysqli_query($koneksi,"SELECT a.*,b.*,c.id_paket,jenis FROM transaksi a INNER JOIN detail_transaksi b on a.id_transaksi = b.id_transaksi INNER JOIN paket c ON b.id_paket = c.id_paket WHERE a.id_transaksi = '".$laporan."'");
                while ($dt_nota = mysqli_fetch_array($qry_nota)) {
                $i = 1;    
                ?>
                <tr>
                    <td align="right">
                    <?php 
                        echo $i;
                        $i++;
                    ?></td>
                    <td><?=$dt_nota['jenis']?></td>
                    <td align="right"><?=$dt_nota['qty']?></td>
                    <td>Rp <?=$dt_nota['harga']?></td>
                    <td colspan="2"><?=$dt_nota['status']?></td>
                </tr>    
                <?php    
                }             
                $qry_total = mysqli_query($koneksi,"SELECT SUM(harga) AS total FROM detail_transaksi WHERE id_transaksi = '".$laporan."'");
                $dt_total=mysqli_fetch_array($qry_total);
                ?>
            <tr>
                <th colspan="3">TOTAL</th>
                <td>Rp<?=$dt_total['total']?></td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    <!-- Akhir tabel body -->
    <tfoot>
        <br><br>
          <tr class="ttd">
            <th colspan="2">Customer</th>
            <th colspan="2">Diterima</th>
            <th colspan="2">Mengetahui</th>
          </tr>
          <tr>
            <td colspan="2">LAUNDRY</td>
            <td colspan="2"><?=$data_transaksi['nama']?></td>
            <?php 
                $qry_user = mysqli_query($koneksi,"SELECT a.id_transaksi,b.* FROM transaksi a INNER JOIN user b on a.id_user = b.id_user");
                $dt_user = mysqli_fetch_array($qry_user);
            ?>
            <td colspan="2"><?=$dt_user['nama']?></td>             
          </tr>
          <br><br>
          <tr>
              <td colspan="2"> 
              </td>
              <td colspan="2">
              </td>
              <td colspan="2">
                <a class="btn btn-dark" href="#" onclick="window.print();" role="button">Cetak Laporan</a>
              </td>
          </tr>
    </tfoot>
</body>
</html>