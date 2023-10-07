<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>
			<div class=dashboard-container>
    <h2>Welcome, <?php echo $_COOKIE['username']; ?>!</h2>

   <a href="logout.php">Logout</a>
				
			<h2>Student List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
             				<th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'list_students.php'; ?>
        </tbody>
    </table>
				<br>
    <h3>Add New Student</h3>
    <form action="add_student.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <button type="submit">Add Student</button>
    </form>

   </div>
</body>
</html>