<?php
    // Including database connection file for connection ....................
    require_once 'database/connection.php';

    if(isset($_POST['submit'])){
        for($i = 1; $i <= 4; $i++){
            $question_id = $_POST["test_id-".$i];

            if(!isset($_POST["option-".$question_id])){
                $message = "Please Check All Test Options";
                header('location:../index.php');
            }else{
                $question_option = $_POST["option-".$question_id];
                echo $question_option;
                // $query = "INSERT INTO questions_options (question_id, option_id) VALUES ('$value1', '$value2')";
            }
        }
    }
?>