<?php 
    session_start();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'webster';
    $con = mysqli_connect($servername,$username,$password, $dbname);
    
    
      echo "<script>window.open('login.php','_self');</script>";
     session_destroy();
?>