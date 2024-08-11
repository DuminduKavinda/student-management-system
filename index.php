<?php
include 'db.php';

// **Search functionality**
$query = '';
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM students WHERE NAME LIKE '%$query%' OR EMAIL LIKE '%$query%' OR ADDRESS LIKE '%$query%' OR ID LIKE '%$query%'";
} else {
    $sql = "SELECT * FROM students";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary bg-image" style="background-image: url('images/background.jpg'); background-repeat: no-repeat; background-size: cover;"> 
    <div class="mx-5 my-5 ">
        <h2 class="text-center text-white">Students List</h2>
        <a href="create.php" class="btn btn-success">Add New Student</a><br><br>
        <!-- **Search Form** -->
        <form method="get" action="index.php" class="text-white">
            <div class="d-flex align-items-center">
                Search: 
                <input type="text" class="form-control w-25 mx-2" name="query" 
                    value="<?php echo isset($query) ? htmlspecialchars($query) : ''; ?>" required>
                <input type="submit" class="btn btn-success" value="Search">
            </div>
        </form>

        <br>
        <table class="table table-light table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Age</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['NAME']; ?></td>
                        <td><?php echo $row['EMAIL']; ?></td>
                        <td><?php echo $row['ADDRESS']; ?></td>
                        <td><?php echo $row['AGE']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['ID']; ?>" class="btn btn-success">Edit</a>
                            <a href="delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6">No students found</td></tr>
            <?php endif; ?>
        </table>
    </div>

    
</body>
</html>

<?php
$conn->close();
?>
