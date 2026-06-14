<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM diseases WHERE id=$id");

$row = $result->fetch_assoc();

if(isset($_POST['update'])){

    $name = $_POST['disease_name'];
    $causes = $_POST['causes'];
    $symptoms = $_POST['symptoms'];
    $prevention = $_POST['prevention'];
    $treatment = $_POST['treatment'];

    $sql = "UPDATE diseases SET

        disease_name='$name',
        causes='$causes',
        symptoms='$symptoms',
        prevention='$prevention',
        treatment='$treatment'

        WHERE id=$id";

    if($conn->query($sql)){
        echo "Disease Updated Successfully!";
    }

}
?>

<h2>Edit Disease</h2>

<form method="POST">

Disease Name:<br>
<input type="text"
name="disease_name"
value="<?php echo $row['disease_name']; ?>">

<br><br>

Causes:<br>
<textarea name="causes" rows="4" cols="50"><?php echo $row['causes']; ?></textarea>

<br><br>

Symptoms:<br>
<textarea name="symptoms" rows="4" cols="50"><?php echo $row['symptoms']; ?></textarea>

<br><br>

Prevention:<br>
<textarea name="prevention" rows="4" cols="50"><?php echo $row['prevention']; ?></textarea>

<br><br>

Treatment:<br>
<textarea name="treatment" rows="4" cols="50"><?php echo $row['treatment']; ?></textarea>

<br><br>

<button type="submit" name="update">
    Update Disease
</button>

</form>