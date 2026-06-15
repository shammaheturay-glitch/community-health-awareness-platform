<?php

session_start();

include 'includes/db.php';

if(isset($_POST['login'])){
echo "Login button detected";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = $conn->query($sql);
    echo "Records Found:" .
    $result->num_rows;

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];

        header("Location: user_dashboard.php");
        exit();

    }else{

        echo "Invalid Email or Password";
    }
}
?>

<h2>User Login</h2>

<form method="POST">

Email:<br>
<input type="email" name="email" required>

<br><br>

Password:<br>
<input type="password" name="password" required>

<br><br>

<button type="submit" name="login">
    Login
</button>

</form>