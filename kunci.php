<?php 
    session_start();
    if(!$_SESSION['status_login']){
      header('location: index.php');
    }
    else {
    }
?>