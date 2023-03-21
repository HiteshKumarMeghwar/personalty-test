<?php
    if(isset($_POST['submit'])){
        for($i = 1; $i <= 4; $i++){
            $question_id = $_POST["test_id-".$i];

            if(!isset($_POST["option-".$question_id])){
                $message = "Please Check All Test Options";
                header('location:index.php');
            }else{
                echo "hell0";
            }
        }
    }
?>