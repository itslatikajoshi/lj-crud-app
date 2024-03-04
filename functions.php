<?php
function create()
{
}


function read($conn, $id = null)
{
    $where = $id != null ? " WHERE id = $id " : " ";
    $sql = "SELECT * FROM `contacts` $where ORDER BY id DESC";
    $result = $conn->query($sql);
    $count = 1;
    $html = "";
    $data = [];
    if ($result->num_rows > 0) {
        // output data of each row
        //   print_r($row);die();
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;
            if ($id != null) {
            } else {
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
            }
            $count++;
        }
        if ($id != null) {
            return $data[0];
        } else {
            echo $html;
        }
    } else {
        echo "<tr><td colspan='5' class='text-center'>No result found</td></tr>";
        // echo "0 results";
    }
}



function update($conn, $data, $id)
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "UPDATE contacts SET name = ? ,email = ? ,phone = ?  WHERE id = ?";
    // modified version of update query
    // ? is a placeholder for the new value of the specified column.
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $phone, $id);

    if ($stmt->execute()) {
        // Redirect back to the contacts list or another appropriate page
        // header("Location: /crud-latika");
        return  true;
        exit();
    } else {
        return "Error updating contact: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}


function delete()
{
}
