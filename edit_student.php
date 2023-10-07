<?php
include 'list_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $query = "SELECT * FROM Stud WHERE Id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $student_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $student = mysqli_fetch_assoc($result)) {
       

echo '<div class=dashboard-container>';
        
        echo '<form action="update_student.php" method="post">';
echo '<h2>Edit Student</h2>';
        echo '<input type="hidden" name="id" value="' . $student['Id'] . '">';

        echo '<label for="name">Name:</label>';
        echo '<input type="text" id="name" name="name" value="' . $student['Name'] . '" required>';
        echo '<br>';
        echo '<label for="age">Age:</label>';
        echo '<input type="number" id="age" name="age" value="' . $student['Age'] . '" required>';
									echo '<br>';
        echo '<button type="submit">Update Student</button>';

echo '<br><br>';
									 echo '<button type="button" onclick="window.location=\'dash.php\'">Return</button>';

        echo '</form>';
echo '</div>';
    } else {
        echo 'Student not found.';
    }

    mysqli_stmt_close($stmt);
} else {
    echo 'Invalid request.';
}

mysqli_close($connection);
?>

</body>
</html>
