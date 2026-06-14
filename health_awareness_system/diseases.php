<?php
include 'includes/header.php';
include 'includes/db.php';
$search = "";

if(isset($_GET['search'])){

    $search = $_GET['search'];
echo "you searched for:" . $search;
    $result = $conn->query(
        "SELECT * FROM diseases
         WHERE disease_name LIKE '%$search%'"
    );

}else{

    $result = $conn->query(
        "SELECT * FROM diseases"
    );
}
?>

<h2>Disease Awareness</h2>
<form method="GET">

    <input type="text"
           name="search"
           placeholder="Search Disease"
           value="<?php echo $search; ?>">

    <button type="submit">
        Search
    </button>

</form>

<br>
<?php
if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

        echo "<div class='card'>";

        echo "<h3>" . $row['disease_name'] . "</h3>";

        echo "<strong>Causes:</strong>";
        echo "<p>" . $row['causes'] . "</p>";

        echo "<strong>Symptoms:</strong>";
        echo "<p>" . $row['symptoms'] . "</p>";

        echo "<strong>Prevention:</strong>";
        echo "<p>" . $row['prevention'] . "</p>";

        echo "<strong>Treatment:</strong>";
        echo "<p>" . $row['treatment'] . "</p>";
        echo "</div>";

    }

}else{

    echo "<p>No disease information available.</p>";

}

?>

<?php
include 'includes/footer.php';
?>