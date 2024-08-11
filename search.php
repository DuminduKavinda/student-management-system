<?php
include 'db.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // SQL query to search students by name, email, or address
    $sql = "SELECT * FROM students WHERE NAME LIKE '%$query%' OR EMAIL LIKE '%$query%' OR ADDRESS LIKE '%$query%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Age</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['ID'] . "</td>
                    <td>" . $row['NAME'] . "</td>
                    <td>" . $row['EMAIL'] . "</td>
                    <td>" . $row['ADDRESS'] . "</td>
                    <td>" . $row['AGE'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No students found.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>