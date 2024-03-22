<?php 
    #IF XAMPP PORT IS 3307 CHANGE TO $conn = mysqli_connect('localhost','root','','istoria_db', '3308') or die ('connection failed');
    date_default_timezone_set('Asia/Manila');
    $conn = mysqli_connect('localhost','root','','Istoria_db', '3307') or die ('connection failed');
?>