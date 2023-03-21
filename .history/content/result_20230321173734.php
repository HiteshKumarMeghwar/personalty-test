<?php 
    // Start Session ...............
    session_start();
    $last_inserted_user_id = $_SESSION['last_inserted_user_id'];

    // Including database connection file for connection ....................
    require_once '../database/connection.php';

    if(isset($last_inserted_user_id)){
        // query to retrieve student and their courses
        $sql = "SELECT *
            FROM questions 
            INNER JOIN questions_options ON questions.id = questions_options.question_id 
            INNER JOIN options ON questions_options.option_id = options.id
            WHERE user_id=".$last_inserted_user_id;

        // execute query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['flag'] = "true";
            while($row = $result->fetch_assoc()) {
                echo "<pre>";
                print_r($row);
            }
        } else {
            echo "0 results";
        }
    }


?>

<div class="container">
    <div class="mb-3">
        <div class="mt-5">
            <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-purple btn-h-outline-purple btn-a-outline-purple w-100 my-2 py-3 shadow-sm">
                <div class="row align-items-center">
                    Hitesh Kumar Meghwar
                </div>
            </div>
        </div>
    </div>
</div>