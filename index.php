<?php
include "./db-conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8">
                <img src="https://miro.medium.com/v2/resize:fit:720/format:webp/1*2eBdh0vLZjUyCDF6x1EqvQ.png" alt="CRUD image">
            </div>
            <div class="col-sm-4">
                <form action="display.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php
                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Get username and password from the form
                        $username = $_POST['email'];
                        $password = $_POST['password'];

                        // Query the database for the user
                        $sql = "SELECT * FROM credentials WHERE email='$username' AND password='$password'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // User found, login successful
                            echo "Login successful!";
                            // You can redirect the user to another page or perform other actions here
                        } else {
                            // User not found or password incorrect
                            echo "Invalid username or password.";
                        }
                    }
                    // Close the database connection
                    $conn->close();
                    ?>
                </form>
            </div>
        </div>

    </div>

</body>

</html>