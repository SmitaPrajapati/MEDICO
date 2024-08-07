<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit;
}

$rec_id = $_SESSION['user_id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receive Medicines</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="display.css">
</head>
<body>
<div class="container">
    <button class="btn btn-primary my-5"><a href="order.php" class="text-light">Order Medicine</a></button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Medicine Name</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>  
        <tbody>
        <?php
        $sql = "SELECT * FROM `orders` WHERE rec_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $rec_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['o_id'];
                $name = $row['med_name'];
                $brand = $row['brand_name'];
                $quantity = $row['Quantity'];
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$brand.'</td>
                <td>'.$quantity.'</td>
                <td>
                <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                </td>
                </tr>';
            }
        }

        $stmt->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
