<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: user_login.php");
    exit();
}
include 'includes/header.php';
?>

<h2>Welcome <?php echo $_SESSION['user_name']; ?></h2>



<a class="dashboard-link" href="health_tips.php">
    💡 Health Tips
</a>

<a class="dashboard-link" href="emergency_contacts.php">
    🚑 Emergency Contacts
</a>

<a class="dashboard-link" href="quiz.php">
    📝 Take Quiz
</a>

<a class="dashboard-link" href="my_results.php">
    📊 My Quiz Results
</a>

<a class="dashboard-link" href="logout.php">
    🚪 Logout
</a>

<?php include 'includes/footer.php'; ?>