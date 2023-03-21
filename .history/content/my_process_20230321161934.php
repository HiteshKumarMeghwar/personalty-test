<?php
    // Including database connection file for connection ....................
    require_once '../database/connection.php';

    if(isset($_POST['submit'])){
        for($i = 1; $i <= 4; $i++){
            $question_id = $_POST["test_id-".$i];

            if(isset($_POST['name']) && $_POST['name'] != "")
            {
                if(!isset($_POST["option-".$question_id]) ){
                    $message = "Please Check All Test Options";
                    header('location:../index.php');
                }else{
                    $question_option = $_POST["option-".$question_id];
                    $option_id = 0;
                    if($question_option == "agree"){
                        $option_id = 1;
                    }
                    elseif($question_option == "strongly_agree"){
                        $option_id = 2;
                    }
                    elseif($question_option == "disagree"){
                        $option_id = 4;
                    }
                    elseif($question_option == "strongly_disagree"){
                        $option_id = 5;
                    }
                    elseif($question_option == "neither"){
                        $option_id = 3;
                    }
                    // Define INSERT query
                    $query = "INSERT INTO questions_options (question_id, option_id) VALUES ('$question_id', '$option_id')";
                    // Execute query
                    $result = mysqli_query($conn, $query);
                }
            }
        }
        // Check if query executed successfully
        if($result){
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>