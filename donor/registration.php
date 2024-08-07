<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];
    $phone = $_POST["phone"];

    $errors = array();
    
    if (empty($first_name) || empty($last_name) || empty($address) || empty($email) || empty($password) || empty($passwordRepeat) || empty($phone)) {
        $errors[] = "Please fill in all fields.";
    }

    if ($password !== $passwordRepeat) {
        $errors[] = "Passwords do not match.";
    }

    // Check if phone number already exists
    $stmt = $con->prepare("SELECT d_id FROM donor WHERE d_phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $errors[] = "Phone number already exists.";
    }

    $stmt->close();

    if (empty($errors)) {
        $stmt = $con->prepare("INSERT INTO donor (d_fname, d_lname, d_address, d_email, d_password, d_phone) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $first_name, $last_name, $address, $email, $password, $phone);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Successfully Registered');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error in registration');</script>";
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<script type='text/javascript'>alert('$error');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Donor's Registration</h1>
    <div class="container">
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" name="phone" placeholder="Phone number">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
            <p>Already Registered <a href="dlogin.php">Login Here</a></p>
        </div>
    </div>
</body>
</html>
