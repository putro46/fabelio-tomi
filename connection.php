<?php
$host="ipobfcpvprjpmdo9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username="z5mg9yrkdvgian3z"; 
$password="n0w0qjx8j9lhrpwq"; 
$dbname="q0byv37q7jy899k9"; 

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
