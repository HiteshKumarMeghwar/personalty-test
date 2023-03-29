<?php
    // Start Session ..............
    session_start();

    // Including database connection file for connection ....................
    require_once '../database/connection.php';

    if(isset($_POST['submit'])){
        if(isset($_POST['name']) && $_POST['name'] != "")
        {
            $name = $_POST['name'];
            $_SESSION['session_name'] = $name;
            // Define INSERT query
            $query = "INSERT INTO users (name) VALUES ('$name')";
            $result = mysqli_query($conn, $query);
            if($result){
                $last_inserted_id = mysqli_insert_id($conn);
                $_SESSION['last_inserted_user_id'] = $last_inserted_id;
            }else{
                echo "Error: " . mysqli_error($conn);
            }

            // query for count how many total questions ...............................
            $query_questions = "SELECT * FROM questions";
            $result_questions = mysqli_query($conn, $query_questions);
            $total_questions = mysqli_num_rows($result_questions);

            for($i = 1; $i <= $total_questions; $i++){
                $question_id = $_POST["test_id-".$i];
                if(!isset($_POST["option-".$question_id]) ){
                    $query = "DELETE FROM users WHERE id = $last_inserted_id";
                    mysqli_query($conn, $query);

                    // $query2 = "DELETE FROM questions_options";
                    // mysqli_query($conn, $query2);

                    unset($_SESSION['last_inserted_user_id']);
                    // session_unset(); // Unset all the session variables
                    // session_destroy(); // Destroy the session data from the server and invalidate the session ID
                    $_SESSION['flag'] = true;
                    header('location:../index.php?msg=Please attend all questions');
                }else{
                    $_SESSION['option-'.$question_id] = $_POST["option-".$question_id];
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
                    $query = "INSERT INTO questions_options (question_id, option_id, user_id) VALUES ('$question_id', '$option_id', '$last_inserted_id')";
                    // Execute query
                    $result = mysqli_query($conn, $query);
                    if($result){
                        header('location:../index.php');
                    }
                }
            
            }
        }else{
            $_SESSION['flag'] = true;
            header('location:../index.php?msg=Your Name is Required');
        }
    }
?>