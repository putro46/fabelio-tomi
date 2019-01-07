<?php
$host="localhost";
$username="root"; 
$password="123456"; 
$dbname="fabelio"; 

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
