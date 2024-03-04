<?php
include "./db-conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <h2>Edit Contact</h2>
    <form action="./update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" required class="form-control" value="<?php //echo $row['name']; ?>">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="<?php //echo $row['email']; ?>">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone:</label>
        <input type="text" id="phone" name="phone" class="form-control" value="<?php //echo $row['phone']; ?>">
      </div>
      <input type="submit" value="Update Contact" class="btn btn-success">
    </form>
  </div>
</body>

</html>
<?php
// $id = $_POST['id'];
// $name = $_POST['name'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
$select = "SELECT name,email,phone FROM contacts where id =?";
// $sql = "UPDATE contacts SET name = ? ,email = ? ,phone = ?  WHERE id = ?";
// // modified version of update query
// // ? is a placeholder for the new value of the specified column.
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("sssi", $name, $email, $phone, $id);

// if ($stmt->execute()) {
//   // Redirect back to the contacts list or another appropriate page
//   // header("Location: /crud-latika");
//   exit();
// } else {
//   echo "Error updating contact: " . $conn->error;
// }
// $stmt->close();
// $conn->close();

?>