<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

if(isset($_POST['save'])){

    $hospital_name = $_POST['hospital_name'];
    $phone_number = $_POST['phone_number'];
    $location = $_POST['location'];

    $sql = "INSERT INTO emergency_contacts
            (hospital_name, phone_number, location)

            VALUES

            ('$hospital_name','$phone_number','$location')";

    if($conn->query($sql)){

        $message = "Contact Added Successfully!";

    }else{

        $message = "Error: " . $conn->error;

    }
}
?>

<h2>Add Emergency Contact</h2>

<?php
if(isset($message)){
    echo $message;
}
?>

<form method="POST">

Hospital Name:<br>
<input type="text" name="hospital_name" required>

<br><br>

Phone Number:<br>
<input type="text" name="phone_number" required>

<br><br>

Location:<br>
<input type="text" name="location" required>

<br><br>

<button type="submit" name="save">
    Save Contact
</button>

</form>