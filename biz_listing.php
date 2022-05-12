<?php
    require 'db_connect.php';
    $my_db = 'business_service';
    mysqli_select_db($connect, $my_db);
    $sql = "SELECT * FROM categories";

    function searchData($title, $connect) {
        $getData = "SELECT * from businesses, biz_categories, categories where businesses.BusinessID= biz_categories.BusinessID and categories.CategoryID= biz_categories.CategoryID and categories.Title ='$title'";
        // $getData = "SELECT * FROM businesses b, categories c, biz_categories bc WHERE b.BusinessID = bc.BusinessID and c.CategoryID = bc.CategoryID and c.Title = '$title'";

        $data = mysqli_query($connect, $getData);

        while ($row = mysqli_fetch_assoc($data)) {
            echo $row['Name'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>
    <h1>Business Listings</h1>
    <table>
        <tr>
            <th>Click on a category to find business listings:</th>
        </tr>
        <?php
            $data = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($data)) {
                print '<tr>';
                print '<td onclick="'.searchData($row['Title'], $connect).'">'.$row['Title'].'</td>';
            }
        ?>
    </table>
</body>
</html>