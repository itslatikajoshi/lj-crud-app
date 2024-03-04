<?php
function create()
{

}
function read($conn, $id)
{
    $sql = "SELECT * FROM `contacts` ORDER BY id DESC";
    $result = $conn->query($sql);
    $count = 1;
    $html = "";
    if ($result->num_rows > 0) {
        // output data of each row

        //   print_r($row);die();
        while ($row = $result->fetch_assoc()) {
            $html .= "<tr>";
            $html .= "<td>" . $count . "</td>";
            $html .= "<td>" . $row["name"] . "</td>";
            $html .= "<td>" . $row["email"] . "</td>";
            $html .= "<td>" . $row["phone"] . "</td>";
            $html .= "<td>";
            $html .= "<a class='btn btn-secondary' href='./update.php?id=" . $row["id"] . "'>Update </a> ";
            $html .= "<a class='btn btn-danger cl-delete' href='./delete.php?id=" . $row["id"] . "'>Delete </a>";
            $html .= "</td>";
            $html .= "</tr>";
            echo $html;
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