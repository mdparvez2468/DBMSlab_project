<?php

$no = $_POST['no'];
$from = $_POST['from'];
$to = $_POST['to'];
$schedule = $_POST['schedule'];
$fare = $_POST['fare'];
$type = $_POST['type'];
$seats = $_POST['seats'];

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

$sql = "INSERT INTO buses (bus_no, starting_counter, end_counter, starting_time, fare, coach_type, seats)
VALUES ('$no', '$from', '$to', '$schedule', '$fare', '$type', '$seats')";

if ($conn->query($sql) === TRUE) {
    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

