<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$result = $conn->query("SELECT * FROM diseases");
?>

<h2>Manage Diseases</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Disease</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['disease_name']; ?></td>
    <td>
    <a href="edit_disease.php?id=<?php echo $row['id']; ?>">
        Edit
    </a>

    |

    <a href="delete_disease.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Are you sure you want to delete this disease?');">
        Delete
    </a>
</td>
</tr>

<?php } ?>

</table>