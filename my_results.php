<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: user_login.php");
    exit();
}

include 'includes/db.php';

$user_id = $_SESSION['user_id'];

$result = $conn->query("
    SELECT * FROM quiz_results
    WHERE user_id='$user_id'
    ORDER BY date_taken DESC
");

?>

<h2>My Quiz Results</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Score</th>
    <th>Date Taken</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>

    <td><?php echo $row['score']; ?></td>

    <td><?php echo $row['date_taken']; ?></td>

</tr>

<?php } ?>

</table>