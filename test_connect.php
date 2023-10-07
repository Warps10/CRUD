<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "Test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Your mysqli_query() calls go here
$result = mysqli_query($conn, "SELECT * FROM Stud");

// ...

// Close the connection when done
$conn->close();
?>