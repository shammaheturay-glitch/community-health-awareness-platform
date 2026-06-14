<?php

include 'includes/db.php';

if(isset($_POST['register'])){

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(full_name, email, password)

            VALUES('$full_name','$email','$password')";

    if($conn->query($sql)){

        echo "Registration Successful!";

    }else{

        echo "Error: " . $conn->error;
    }
}
?>

<h2>User Registration</h2>

<form method="POST">

Full Name:<br>
<input type="text" name="full_name" required>

<br><br>

Email:<br>
<input type="email" name="email" required>

<br><br>

Password:<br>
<input type="password" name="password" required>

<br><br>

<button type="submit" name="register">
    Register
</button>

</form>