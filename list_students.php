<?php
// Connect to the database
include 'list_connection.php';

// Fetch and display the student list
$query = "SELECT * FROM Stud";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['Id'] . '</td>';
    echo '<td>' . $row['Name'] . '</td>';
    echo '<td>' . $row['Age'] . '</td>';
    echo '<td><a href="edit_student.php?id=' . $row['Id'] . '">Edit</a> | <a href="delete_student.php?id=' . $row['Id'] . '">Delete</a></td>';
    echo '</tr>';
}

// Close the database connection
mysqli_close($connection);
?>