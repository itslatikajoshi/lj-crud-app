<?php
// Improved handling of dependencies and variable initialization
include "./db-conn.php";
include "./functions.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `contacts` WHERE id = $id ORDER BY id DESC";

    $result = $conn->query($sql);
    $data = [];
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $data[] = $row;
        }
        $getDataById = $data[0];
    }
}


// Processing form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {


    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "UPDATE contacts SET name = ? ,email = ? ,phone = ?  WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $phone, $id);

    if ($stmt->execute()) {
        // Redirect back to the contacts list or another appropriate page
        header("Location: /crud-latika");
        return  true;
        exit();
    } else {
        return "Error updating contact: " . $conn->error;
    }
    $stmt->close();
}

// Only proceed with HTML if $getDataById is not false
if ($getDataById) :
    include "./header.php";
?>


    <div class="container mt-5">
        <h2>Edit Contact</h2>
        <form action="./update.php" class="lj-submit-form" method="post">
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
                <input type="text" id="lj-phone" name="phone" class="form-control" value="<?= htmlspecialchars($getDataById['phone']); ?>">
            </div>
            <input type="submit" value="Update Contact" class="btn btn-success">
        </form>
    </div>

<?php
    include "./footer.php";
// End if statement for HTML display
endif;
?>