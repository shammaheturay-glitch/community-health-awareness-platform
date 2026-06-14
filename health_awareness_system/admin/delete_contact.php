<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$id = $_GET['id'];

$conn->query("DELETE FROM emergency_contacts WHERE id=$id");

header("Location: manage_contacts.php");
exit();

?>