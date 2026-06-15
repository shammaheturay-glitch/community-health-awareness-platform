<?php

include 'includes/header.php';
include 'includes/db.php';

$result = $conn->query("SELECT * FROM emergency_contacts");

?>

<h2>Emergency Contacts</h2>

<?php while($row = $result->fetch_assoc()){ ?>

<hr>

<h3><?php echo $row['hospital_name']; ?></h3>

<p>
    <strong>Phone Number:</strong>
    <?php echo $row['phone_number']; ?>
</p>

<p>
    <strong>Location:</strong>
    <?php echo $row['location']; ?>
</p>

<?php } ?>

<?php include 'includes/footer.php'; ?>