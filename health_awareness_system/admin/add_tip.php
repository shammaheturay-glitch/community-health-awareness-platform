<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

if(isset($_POST['save'])){

    $title = $_POST['title'];
    $tip = $_POST['tip'];

    $sql = "INSERT INTO health_tips(title, content)
            VALUES('$title', '$tip')";

    if($conn->query($sql)){

        $message = "Health Tip Added Successfully!";

    }else{

        $message = "Error: " . $conn->error;

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Health Tip</title>
</head>
<body>

<h2>Add Health Tip</h2>

<?php
if(isset($message)){
    echo "<p>$message</p>";
}
?>

<form method="POST">

    <label>Title:</label>
    <br>
    <input type="text" name="title" required>

    <br><br>

    <label>Tip:</label>
    <br>
    <textarea name="tip" rows="5" cols="50" required></textarea>

    <br><br>

    <button type="submit" name="save">
        Save Tip
    </button>

</form>

</body>
</html>