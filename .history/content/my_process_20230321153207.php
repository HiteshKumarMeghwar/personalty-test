<?php
    if(isset($_POST['submit'])){
        for($i = 1; $i <= 4; $i++){
            $question_id = $_POST["test_id-".$i];
            $question_option = $_POST["option-".$question_id];

            if(!isset($question_option)){
                $message = "Please Check All Test Options";
                header('main.php');
            }else{

            }
        }
    }
?>