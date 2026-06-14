<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$result = $conn->query("SELECT * FROM health_tips");

?>

<h2>Manage Health Tips</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['title']; ?></td>

    <td>

        <a href="edit_tip.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete_tip.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure?');">
            Delete
        </a>

    </td>

</tr>

<?php } ?>

</table>