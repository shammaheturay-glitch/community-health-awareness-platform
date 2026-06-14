<?php
session_start();
include 'includes/header.php';
include 'includes/db.php';

$result = $conn->query("SELECT * FROM quiz_questions");

?>

<h2>Health Quiz</h2>

<form method="POST">

<?php while($row = $result->fetch_assoc()){ ?>

<hr>

<p>
    <strong><?php echo $row['question']; ?></strong>
</p>

<input type="radio"
       name="question_<?php echo $row['id']; ?>"
       value="A"> <?php echo $row['option_a']; ?>

<br>

<input type="radio"
       name="question_<?php echo $row['id']; ?>"
       value="B"> <?php echo $row['option_b']; ?>

<br>

<input type="radio"
       name="question_<?php echo $row['id']; ?>"
       value="C"> <?php echo $row['option_c']; ?>

<br>

<input type="radio"
       name="question_<?php echo $row['id']; ?>"
       value="D"> <?php echo $row['option_d']; ?>

<br><br>

<?php } ?>

<button type="submit" name="submit_quiz">
    Submit Quiz
</button>

</form>

<?php

if(isset($_POST['submit_quiz'])){

    $score = 0;

    $questions = $conn->query("SELECT * FROM quiz_questions");

    while($q = $questions->fetch_assoc()){

        $user_answer =
        $_POST['question_'.$q['id']] ?? '';

        if($user_answer == $q['correct_answer']){

            $score++;

        }
    }

    echo "<h3>Your Score: $score</h3>";
    if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    $conn->query("
        INSERT INTO quiz_results(user_id, score)
        VALUES('$user_id', '$score')
    ");
}
}

include 'includes/footer.php';

?>