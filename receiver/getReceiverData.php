<?php
session_start(); // Start the session

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "receiver_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}

if (isset($_SESSION['user_id'])) {
    $receiverId = intval($_SESSION['user_id']); // Get receiver ID from session

    $sql = "SELECT r_id, r_fname, r_lname, r_email, r_phone FROM receiver WHERE r_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $receiverId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $receiver = $result->fetch_assoc();
            echo json_encode($receiver);
        } else {
            echo json_encode(["error" => "Receiver not found"]);
        }
    } else {
        echo json_encode(["error" => "Failed to execute query"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "No receiver ID provided"]);
}

$conn->close();
?>
