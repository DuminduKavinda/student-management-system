<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE ID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Student deleted successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
header("Location: index.php");
exit;
?>
