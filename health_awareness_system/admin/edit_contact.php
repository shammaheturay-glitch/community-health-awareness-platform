<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM emergency_contacts WHERE id=$id");

$row = $result->fetch_assoc();

if(isset($_POST['update'])){

    $hospital_name = $_POST['hospital_name'];
    $phone_number = $_POST['phone_number'];
    $location = $_POST['location'];

    $sql = "UPDATE emergency_contacts SET

            hospital_name='$hospital_name',
            phone_number='$phone_number',
            location='$location'

            WHERE id=$id";

    if($conn->query($sql)){

        echo "Contact Updated Successfully!";

        $result = $conn->query("SELECT * FROM emergency_contacts WHERE id=$id");
        $row = $result->fetch_assoc();
    }
}
?>

<h2>Edit Emergency Contact</h2>

<form method="POST">

Hospital Name:<br>
<input type="text"
       name="hospital_name"
       value="<?php echo $row['hospital_name']; ?>">

<br><br>

Phone Number:<br>
<input type="text"
       name="phone_number"
       value="<?php echo $row['phone_number']; ?>">

<br><br>

Location:<br>
<input type="text"
       name="location"
       value="<?php echo $row['location']; ?>">

<br><br>

<button type="submit" name="update">
    Update Contact
</button>

</form>