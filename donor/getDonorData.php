<?php
session_start(); // Start the session

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donor_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}

if (isset($_SESSION['user_id'])) {
    $donorId = intval($_SESSION['user_id']); // Get donor ID from session

    $sql = "SELECT d_id, d_fname, d_lname, d_email, d_phone FROM donor WHERE d_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $donorId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $donor = $result->fetch_assoc();
            echo json_encode($donor);
        } else {
            echo json_encode(["error" => "Donor not found"]);
        }
    } else {
        echo json_encode(["error" => "Failed to execute query"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "No donor ID provided"]);
}

$conn->close();
?>
