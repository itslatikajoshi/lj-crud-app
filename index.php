<?php
include "./db-conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Please fill below details </h2>
  <!--
    NOTES: By default form method is GET
Array
(
    [fullname] => Latika
    [email] => itslatika@gmail.com
    [phone] => 876543345
)

-->
  <form action="create.php" method="POST">
    <!-- 	name	email	phone	reg_date -->
    <label for="">Name</label> <input type="text" name="fullname" value="Latika" /> <br /><br />
    <label for="">Email</label> <input type="email" name="email" value="itslatika@gmail.com" /> <br /><br />
    <label for="">Phone</label> <input type="tel" name="phone" value="876543345" /> <br /><br />
    <button type="submit">Submit</button>
  </form>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Reg</th>
      <th>Action</th>
    </tr>

    <?php
    $sql = "SELECT * FROM `contacts` ORDER BY reg_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row

      //   print_r($row);die();
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["phone"] . "</td>
        <td>" . $row["reg_date"] . "</td>
        <td>" .
          "<a href='./update.php'>Update </a> " .
          "<a href='./delete.php'>Delete </a>
        </td>
        </tr>";
      }
    } else {
      echo "0 results";
    }
    ?>
  </table>
</body>

</html>