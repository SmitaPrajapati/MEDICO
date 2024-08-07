<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost"; // Change if your server is different
$username = "root";
$password = "";
$dbname = "donor_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $medicineName = $_POST['medicineName'];
    $manufacturedBy = $_POST['manufacturedBy'];
    $mfgDate = $_POST['mfgDate'];
    $expiryDate = $_POST['expiryDate'];

    $sql = "INSERT INTO medicine (m_name, m_mfg, m_dmfg, m_exp) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $medicineName, $manufacturedBy, $mfgDate, $expiryDate);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Submitted successfully"]);
    } else {
        echo json_encode(["message" => "Failed to submit"]);
    }

    $stmt->close();
}
$conn->close();
?>
