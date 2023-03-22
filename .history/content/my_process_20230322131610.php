<?php
    // Start Session ..............
    session_start();

    // Including database connection file for connection ....................
    require_once '../database/connection.php';

    if(isset($_POST['submit'])){
        if(isset($_POST['name']) && $_POST['name'] != "")
        {
            
            $name = $_POST['name'];
            // Define INSERT query
            $query = "INSERT INTO users (name) VALUES ('$name')";
            $result = mysqli_query($conn, $query);
            if($result){
                $last_inserted_id = mysqli_insert_id($conn);
            }else{
                echo "Error: " . mysqli_error($conn);
            }

            for($i = 1; $i <= 4; $i++){
                $question_id = $_POST["test_id-".$i];
                if(!isset($_POST["option-".$question_id]) ){
                    $query = "DELETE FROM users WHERE id = $last_inserted_id";
                    mysqli_query($conn, $query);
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
                    $query = "INSERT INTO questions_options (question_id, option_id, core_value_id, user_id) VALUES ('$question_id', '$option_id', '$question_id', '$last_inserted_id')";
                    // Execute query
                    $result = mysqli_query($conn, $query);
                }
            
            }
        }else{
            $message = "Your Name is Lazmi";
            header('location:../index.php');
        }
        // Check if query executed successfully
        if($result){
            $_SESSION['last_inserted_user_id'] = $last_inserted_id;
            header('location:../index.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>