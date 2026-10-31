<?php
$conn = new mysqli("localhost", "root", "", "crimecase_system");

if ($conn->connect_error) {
    die("Connection failed");
}
?>