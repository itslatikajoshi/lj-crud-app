<?php
// Improved handling of dependencies and variable initialization
include "./db-conn.php";
include "./functions.php";
$getDataById = isset($_GET['id']) ? read($conn, $_GET['id']) : false;

// Use output buffering at the beginning to avoid headers already sent issue
// ob_start();

// Processing form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
    if (update($conn, $_POST, $_POST['id'])) {
        header("Location: /crud-latika");
        exit(); // Ensure no further execution after a redirect
    }
}

// Only proceed with HTML if $getDataById is not false
if ($getDataById) :
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Contact</h2>
        <form action="./update.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($getDataById['id']); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" required class="form-control" value="<?= htmlspecialchars($getDataById['name']); ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($getDataById['email']); ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?= htmlspecialchars($getDataById['phone']); ?>">
            </div>
            <input type="submit" value="Update Contact" class="btn btn-success">
        </form>
    </div>
</body>
</html>

<?php
// End if statement for HTML display
endif;

// End and flush output buffer
// ob_end_flush();
?>
