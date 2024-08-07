<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "receiver_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ngo_name = $_POST['ngo_name'];
$medicine_name = $_POST['medicine_name'];
$b_name = $_POST['b_name'];
$ngo_add = $_POST['ngo_add'];
$ngo_loc = $_POST['ngo_loc'];
$ngo_phone = $_POST['ngo_phone'];
$ngo_email = $_POST['ngo_email'];

$sql = "INSERT INTO ngo (ngo_name, medicine_name, b_name, ngo_add, ngo_loc, ngo_phone, ngo_email)
VALUES ('$ngo_name', '$medicine_name', '$b_name', '$ngo_add', '$ngo_loc', '$ngo_phone', '$ngo_email')";

if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Submission Success</title>
        <link rel='stylesheet' type='text/css' href='n.css'>
    </head>
    <body>
        <div class='success-message'>
            <h2>Details submitted successfully</h2>
        </div>
    </body>
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
