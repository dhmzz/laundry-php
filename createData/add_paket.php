<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Paket</title>
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
<div style="margin: 30px 200px; background-color: rgb(255, 255, 255); ">   
    <form action="proses_add_paket.php" method="post" style="padding : 80px;">
        <h2>Add Paket</h2>
        <br>
        Nama Paket :  
        <input type="text" name="jenis" value="" class="form-control" require>
        <br>
        Harga : 
        <input type="number" name="harga" value="" class="form-control" require>
        <br>
        <input type="submit" value="Add Paket" class="btn btn-primary bi bi-plus">
    </form>
</div> 
</body>
</html>