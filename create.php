<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (NAME, EMAIL, ADDRESS, AGE) VALUES ('$name', '$email', '$address', '$age')";

    if ($conn->query($sql) === TRUE) {
        echo "New student created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary bg-image" style="background-image: url('images/background.jpg'); background-repeat: no-repeat; background-size: cover;">
    
    <!--<form method="post" action="create.php">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Address: <textarea name="address" required></textarea><br><br>
        Age: <input type="number" name="age" required><br><br>
        <input type="submit" value="Create">
    </form>-->
    
    <div class="card rounded m-auto mt-5 d-block" style="width: 40rem;">
        <h2 class="mt-4 text-center">Add A New Student</h2>
        <form class="p-5"  method="post" action="create.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="NameHelp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control" name="age" id="age" aria-describedby="AgeHelp" required>
            </div>
            <div class="row">
                <div class="col-6"><button type="submit" class="btn btn-success">Create</button></div>
                <div class="col-6 text-end"><a class="btn btn-success" href="index.php">Back to Home</a></div>
            </div>
        </form>
    </div>
</body>
</html>