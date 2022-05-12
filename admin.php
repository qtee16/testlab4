<?php
    require 'db_connect.php';
    $my_db = 'business_service';
    mysqli_select_db($connect, $my_db);
    $query = "SELECT * FROM categories";
    

    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $sql = "SELECT * FROM categories WHERE CategoryID = '$id'";
    $tmpData = mysqli_query($connect, $sql);
    $check = mysqli_fetch_assoc($tmpData);

    if ($id != '' && $title != '' && $desc != '' && is_null($check)) {
        $insert = "INSERT INTO categories VALUES ('$id', '$title', '$desc')";
        mysqli_query($connect, $insert);    
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
        .w150 {
            width: 150px;
        }
        .w300 {
            width: 300px;
        }
        .w400 {
            width: 400px;
        }
    </style>
</head>
<body>
    <h1>Category Administration</h1>
    <table>
        <tr>
            <th class="w150">CatID</th>
            <th class="w300">Title</th>
            <th class="w400">Description</th>
        </tr>
        <?php
            $data = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($data)) {
                print "<tr>";
                print '<td>'.$row['CategoryID'].'</td>';
                print '<td>'.$row['Title'].'</td>';
                print '<td>'.$row['Description'].'</td>';
            }
        ?>

        
    </table>
    <form action="admin.php" method="POST">
        <input class="w150" type="text" name="id">
        <input class="w300" type="text" name="title">
        <input class="w400" type="text" name="desc"><br>
        <input type="submit" value="Add Category">
    </form>
</body>
</html>