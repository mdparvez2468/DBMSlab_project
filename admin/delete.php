<?php
$id = $_REQUEST['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbmslab_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM buses WHERE bus_no=".$id;

if ($conn->query($sql) === TRUE) {
    header('location:index.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
