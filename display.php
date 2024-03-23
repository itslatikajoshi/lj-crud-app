<?php
include "./db-conn.php";
include "./functions.php";
include "./login.php";
include "./header.php";


?>


<div class="container mt-5">
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">WELCOME <?php echo $_SESSION['username']; ?></a>
    <form class="form-inline">

      <a href="./logout.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</a>
    </form>
  </nav>
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
          <?php
          if (isset($_GET["error"])) : ?>
            <div class="lj-errors">
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET["error"]; ?>
              </div>
            </div>
          <?php
          endif; ?>
          <form action="create.php" class="lj-submit-form" method="POST">
            <!-- 	name	email	phone	-->
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="fullname" value="" required />
            </div>
            <div class="form-group mt-3">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" value="" required />
            </div>
            <div class="form-group mt-3">
              <label for="">Phone</label>
              <input type="tel" class="form-control lj-phone" id="lj-phone" name="phone" value="" required />
            </div>

            <button type="submit" class="btn btn-primary mt-3 lj-submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <table class="table table-light border display" id="lj-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
<tbody>

        <?php
        // function call so that data can be displayed
        // read($conn); 

        $sql = "SELECT * FROM `contacts` ORDER BY id DESC";
        $result = $conn->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
          // output data of each row
          //   print_r($row);die();
          while ($row = $result->fetch_assoc()) {

            echo  "<tr>" . "<td>" . $count . "</td>" . "<td>" . $row["name"] . "</td>" . "<td>" . $row["email"] . "</td>" . "<td>" . $row["phone"] . "</td>" . "<td>" . "<a class='btn btn-secondary' href='./update.php?id=" . $row["id"] . "'> Update </a> " . "<a class='btn btn-danger cl-delete' href='./delete.php?id=" . $row["id"] . "'>Delete </a>" . "</td>" . "</tr>";

            $count++;
          }
        } else {
          echo "<tr><td colspan='5' class='text-center'>No result found</td></tr>";
          // echo "0 results";
        }

        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include "./footer.php"; ?>