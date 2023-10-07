<?php
include 'list_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $age = isset($_POST['age']) ? intval($_POST['age']) : 0; // Assuming 'age' is an integer

    // Using prepared statement to prevent SQL injection
    $query = "INSERT INTO Stud (Name, Age) VALUES (?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'si', $name, $age);
        mysqli_stmt_execute($stmt);

        // Check if the query was successful
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            mysqli_stmt_close($stmt);
            mysqli_close($connection);

            // Redirect back to the student listing page
            header('Location: dash.php');
            exit;
        } else {
            echo 'Error: Failed to insert data.';
        }
    } else {
        echo 'Error: Failed to prepare statement.';
    }
} else {
    echo 'Invalid request.';
}

mysqli_close($connection);
?>