<?php 
    // Start Session ...............
    session_start();
    $last_inserted_user_id = $_SESSION['last_inserted_user_id'];

    // Including database connection file for connection ....................
    require_once '../database/connection.php';

    // query to retrieve student and their courses
    $sql = "SELECT *
        FROM questions 
        INNER JOIN questions_options ON questions.id = questions_options.question_id 
        INNER JOIN options ON questions_options.option_id = options.id
        WHERE user_id=".$last_inserted_user_id;

    // execute query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<pre>";
            print_r($row);
        }
    } else {
        echo "0 results";
    }


?>