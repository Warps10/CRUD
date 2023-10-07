<?php
include 'list_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $student_id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    $query = "UPDATE Stud SET Name=?, Age=? WHERE Id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sii', $name, $age, $student_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
       
        header('Location: dash.php');
        exit;
    } else {
        echo 'Update failed: ' . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
} else {
    echo 'Invalid request.';
}

mysqli_close($connection);
?>