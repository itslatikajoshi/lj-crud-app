<?php
include "./db-conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD app</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-4">
        <!--
            NOTES: By default form method is GET
            Array
            (
            [fullname] => Latika
            [email] => itslatika@gmail.com
            [phone] => 876543345
            )
            -->
        <div class="card">
          <div class="card-header">
            Please fill below details
          </div>
          <div class="card-body">
            <form action="create.php" method="POST">
              <!-- 	name	email	phone	reg_date -->
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="fullname" value="Latika" />
              </div>
              <div class="form-group mt-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="itslatikajoshi@gmail.com" />
              </div>
              <div class="form-group mt-3">
                <label for="">Phone</label>
                <input type="tel" class="form-control" name="phone" value="8556909577" />
              </div>

              <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <table class="table table-light border">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>

          <?php
          $sql = "SELECT * FROM `contacts` ORDER BY id DESC";
          $result = $conn->query($sql);
          $count = 1;
          if ($result->num_rows > 0) {
            // output data of each row

            //   print_r($row);die();
            while ($row = $result->fetch_assoc()) {

              echo "<tr>
        <td>" . $count . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["phone"] . "</td>
        <td>" .
                "<a class='btn btn-secondary' href='./update.php'>Update </a> " .
                "<a class='btn btn-danger cl-delete' href='./delete.php?id=" . $row["id"] . "'>Delete </a>
        </td>
        </tr>";
              $count++;
            }
          } else {
            echo "<tr><td colspan='5' class='text-center'>No result found</td></tr>";
            // echo "0 results";
          }
          ?>
        </table>
      </div>
    </div>





  </div>

  <script src="./script.js"></script>
</body>

</html>