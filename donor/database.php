<?php

$con = new mysqli("localhost", "root", "", "donor_register");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>