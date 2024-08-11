<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $age = $_POST['age'];

    $sql = "UPDATE students SET NAME='$name', EMAIL='$email', ADDRESS='$address', AGE='$age' WHERE ID='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM students WHERE ID='$id'";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Student</title>
</head>
<body class="bg-secondary bg-image" style="background-image: url('images/background.jpg'); background-repeat: no-repeat; background-size: cover;">
    <!--<h2>Update Student</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" value="<?php echo $student['NAME']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $student['EMAIL']; ?>" required><br><br>
        Address: <textarea name="address" required><?php echo $student['ADDRESS']; ?></textarea><br><br>
        Age: <input type="number" name="age" value="<?php echo $student['AGE']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Home</a>-->


    <div class="card rounded m-auto mt-5 d-block" style="width: 40rem;">
        <h2 class="mt-4 text-center">Update Student</h2>
        <form class="p-5"  method="post" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $student['NAME']; ?>" aria-describedby="NameHelp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $student['EMAIL']; ?>" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"><?php echo $student['ADDRESS']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control" name="age" id="age" value="<?php echo $student['AGE']; ?>" aria-describedby="AgeHelp" required>
            </div>
            <div class="row">
                <div class="col-6"><button type="submit" class="btn btn-success">Update</button></div>
                <div class="col-6 text-end"><a class="btn btn-success" href="index.php">Back to Home</a></div>
            </div>
        </form>
    </div>
</body>
</html>
