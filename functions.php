<?php
function create()
{

}
function read($conn, $id)
{
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
                "<a class='btn btn-secondary' href='./update.php?id=" . $row["id"] . "'>Update </a> " .
                "<a class='btn btn-danger cl-delete' href='./delete.php?id=" . $row["id"] . "'>Delete </a>
  </td>
  </tr>";
            $count++;
        }
    } else {
        echo "<tr><td colspan='5' class='text-center'>No result found</td></tr>";
        // echo "0 results";
    }
}
function update()
{

}
function delete()
{

}


?>