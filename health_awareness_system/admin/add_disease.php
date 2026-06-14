<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

if(isset($_POST['save'])){

    $name = $_POST['disease_name'];
    $causes = $_POST['causes'];
    $symptoms = $_POST['symptoms'];
    $prevention = $_POST['prevention'];
    $treatment = $_POST['treatment'];

    $sql = "INSERT INTO diseases
    (disease_name, causes, symptoms, prevention, treatment)

    VALUES

    ('$name','$causes','$symptoms','$prevention','$treatment')";

    if($conn->query($sql)){
        $message = "Disease added successfully!";
    }else{
        $message = "Error adding disease.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Disease</title>
</head>
<body>

<h2>Add Disease</h2>

<?php
if(isset($message)){
    echo "<p>$message</p>";
}
?>

<form method="POST">

Disease Name:<br>
<input type="text" name="disease_name" required>

<br><br>

Causes:<br>
<textarea name="causes" rows="4" cols="50"></textarea>

<br><br>

Symptoms:<br>
<textarea name="symptoms" rows="4" cols="50"></textarea>

<br><br>

Prevention:<br>
<textarea name="prevention" rows="4" cols="50"></textarea>

<br><br>

Treatment:<br>
<textarea name="treatment" rows="4" cols="50"></textarea>

<br><br>

<button type="submit" name="save">
    Save Disease
</button>

</form>

</body>
</html>