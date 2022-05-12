<?php
    require 'db_connect.php';
    $my_db = 'business_service';
    mysqli_select_db($connect, $my_db);
    $bname = $_POST['bname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $url = $_POST['url'];
    $insert = "INSERT INTO businesses VALUES (null, '$bname', '$address', '$city', '$phone', '$url')";
    mysqli_query($connect, $insert);

    $last_id = $connect->insert_id;

    $arrTitle = $_POST['title'];
    foreach ($arrTitle as $title) {
        $getTitle = "SELECT * FROM categories WHERE Title = '$title'";
        $data = mysqli_query($connect, $getTitle);
        $row = mysqli_fetch_assoc($data);
        $cat_id = $row['CategoryID'];
        $insertBiz = "INSERT INTO biz_categories(BusinessID, CategoryID) VALUES ('$last_id', '$cat_id')";
        mysqli_query($connect, $insertBiz);
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <script>window.location.href = "add_biz.php";</script>
    </body>
</html>