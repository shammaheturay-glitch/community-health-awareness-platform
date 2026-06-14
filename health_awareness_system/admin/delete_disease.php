<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM diseases WHERE id=$id";

if($conn->query($sql)){

    header("Location: manage_diseases.php");
    exit();

}else{

    echo "Error deleting disease.";

}
?>