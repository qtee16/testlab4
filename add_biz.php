<?php
    require 'db_connect.php';
    $my_db = 'business_service';
    mysqli_select_db($connect, $my_db);
    $sql = "SELECT * FROM categories";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display: inline-block;
            min-width: 120px;
        }
        .w300 {
            width: 300px;
        }
        .ml-50 {
            margin-left: 50px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Business Registration</h1>
    <form action="process.php" method='POST'>
        <table>
            <tr>
                <td>
                    <p>Click on one, or control-click on multiple categories:</p>
                    <select name="title[]" multiple>
                        <?php
                            $i = 1;
                            $getdata = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($getdata)) {
                                print '<option value="'.$row['Title'].'">'.$row['Title'].'</option>';
                                $i++;
                            }
                        ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Add Business">
                </td>
                <td class="ml-50">
                    <label for="">Business Name:</label>
                    <input class="w300" type="text" name="bname"><br><br>
                    <label for="">Address:</label>
                    <input class="w300" type="text" name="address"><br><br>
                    <label for="">City:</label>
                    <input class="w300" type="text" name="city"><br><br>
                    <label for="">Telephone:</label>
                    <input class="w300" type="text" name="phone"><br><br>
                    <label for="">URL:</label>
                    <input class="w300" type="text" name="url"><br><br>
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>