<?php

include 'includes/header.php';
include 'includes/db.php';

$result = $conn->query("SELECT * FROM health_tips");

echo "<h2>Health Tips</h2>";

while($row = $result->fetch_assoc()){

    echo "<hr>";

    echo "<h3>".$row['title']."</h3>";

    echo "<p>".$row['content']."</p>";

}

include 'includes/footer.php';

?>