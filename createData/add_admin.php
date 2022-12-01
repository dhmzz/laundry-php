<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
    <form action="proses_add_admin.php" method="post" style="padding : 80px;"">
        <h2>Add Admin</h2>
        <br>
        Nama :  
        <input type="text" name="nama" value="" class="form-control" require>
        <br>
        Username :  
        <input type="text" name="username" value="" class="form-control" require>
        <br>
        Password : 
        <textarea name="password" class="form-control" width="200" required></textarea>
        <br>
        Role :
        <br> 
        <input class="form-check-input mt-0" type="radio" name="role" value="admin" class="btn btn-primary" require >
        <label for="admin">Admin</label><br>
        <input class="form-check-input mt-0" type="radio" name="role" value="kasir" class="btn btn-primary" require>
        <label for="kasir">Kasir</label>
        <br><br>
        <input type="submit" value="Add Member" class="btn btn-primary">
    </form>
</div> 
</body>
</html>