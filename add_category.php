<?php
    require 'db_connect.php';
    $my_db = 'business_service';
    mysqli_select_db($connect, $my_db);
    $query = "SELECT * FROM categories";
    

    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $insert = "INSERT INTO categories VALUES ('$id', '$title', '$desc')";
    mysqli_query($connect, $insert);
?>
