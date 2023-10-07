<?php
include 'list_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $student_id = $_GET['id'];
   
    $query = "DELETE FROM Stud WHERE Id = $student_id";
    mysqli_query($connection, $query);

    header('Location: dash.php');
    exit;
} else {
    echo 'Invalid request.';
}

mysqli_close($connection);
?>