<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM health_tips WHERE id=$id");

$row = $result->fetch_assoc();

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE health_tips SET

            title='$title',
            content='$content'

            WHERE id=$id";

    if($conn->query($sql)){

        echo "Health Tip Updated Successfully!";

        $result = $conn->query("SELECT * FROM health_tips WHERE id=$id");
        $row = $result->fetch_assoc();
    }
}
?>

<h2>Edit Health Tip</h2>

<form method="POST">

Title:<br>
<input type="text"
       name="title"
       value="<?php echo $row['title']; ?>">

<br><br>

Content:<br>
<textarea name="content"
          rows="5"
          cols="50"><?php echo $row['content']; ?></textarea>

<br><br>

<button type="submit" name="update">
    Update Tip
</button>

</form>