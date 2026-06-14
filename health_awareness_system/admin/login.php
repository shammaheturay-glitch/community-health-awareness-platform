<?php
session_start();

include '../includes/db.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins 
            WHERE username='$username'
            AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows == 1){

        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");
        exit();

    }else{

        $error = "Invalid Username or Password";

    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>

<?php
if(isset($error)){
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

    Username:
    <input type="text" name="username" required>

    <br><br>

    Password:
    <input type="password" name="password" required>

    <br><br>

    <button type="submit" name="login">
        Login
    </button>

</form>

</body>
</html>