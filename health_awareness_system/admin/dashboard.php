<?php
session_start();

if(!isset($_SESSION['admin'])){

    header("Location: login.php");
    exit();

}
include '../includes/header.php';
?>

<h1>Admin Dashboard</h1>

<p>Welcome <?php echo $_SESSION['admin']; ?></p>

<h2>Administrator Dashboard</h2>

<a class="dashboard-link"
   href="add_disease.php">
   ➕ Add Disease
</a>

<a class="dashboard-link" href="manage_diseases.php">
    📋 Manage Diseases
</a>


<a class="dashboard-link" href="../diseases.php">
    👀 View Diseases
</a>

<a class="dashboard-link" href="add_tip.php">
    💡 Add Health Tip
</a>

<a class="dashboard-link" href="manage_tips.php">
    📝 Manage Health Tips
</a>

<a class="dashboard-link" href="add_contact.php">
    🚑 Add Emergency Contact
</a>

<a class="dashboard-link" href="manage_contacts.php">
    📞 Manage Emergency Contacts
</a>

<?php include '../includes/footer.php'; ?>