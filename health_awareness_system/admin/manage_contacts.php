<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$result = $conn->query("SELECT * FROM emergency_contacts");

?>

<h2>Manage Emergency Contacts</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Hospital Name</th>
    <th>Phone Number</th>
    <th>Location</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['hospital_name']; ?></td>

    <td><?php echo $row['phone_number']; ?></td>

    <td><?php echo $row['location']; ?></td>

    <td>

        <a href="edit_contact.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete_contact.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure?');">
            Delete
        </a>

    </td>

</tr>

<?php } ?>

</table>