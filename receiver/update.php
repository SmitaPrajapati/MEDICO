<?php
include 'db.php';
$id = $_GET['updateid']; // Added semicolon here

if (isset($_POST['submit'])) {
    // Sanitize user inputs
    $medicine = mysqli_real_escape_string($con, $_POST['name']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $rec_id = mysqli_real_escape_string($con, $_POST['rec_id']); 

    // Check if rec_id exists in the receiver table
    $check_rec_id = "SELECT r_id FROM receiver WHERE r_id = '$rec_id'";
    $result_check = mysqli_query($con, $check_rec_id);

    if (mysqli_num_rows($result_check) > 0) {
        $sql = "UPDATE `orders` SET o_id = $id, med_name ='$medicine', brand_name='$brand', Quantity='$quantity', rec_id='$rec_id' WHERE o_id=$id"; // Fixed the SQL statement
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "Data updated successfully";
            // header('location:display.php');
        } else {
            die("Error inserting data: " . mysqli_error($con));
        }
    } else {
        echo "Invalid Receiver ID";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receive Medicines</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
  <form method="post">
      <div class="form-group">
          <label>Receiver ID</label>
          <input type="number" class="form-control" placeholder="Receiver ID" name="rec_id" required>
      </div>
        <div class="form-group">
            <label>Enter medicine name</label>
            <input type="text" class="form-control" placeholder="Enter Medicine Name" name="name" required>
        </div>
        <div class="form-group">
            <label>Brand Name</label>
            <input type="text" class="form-control" placeholder="Brand Name" name="brand" required>
        </div>
        <div class="form-group">
            <label>Quantity of Medicines</label>
            <input type="number" class="form-control" placeholder="Quantity of Medicines" name="quantity" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>
</body>
</html>
