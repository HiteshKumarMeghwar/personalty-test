<?php
    if(isset($_POST['submit'])){
        for($i = 1; $i <= 4; $i++){
            $value = $_POST["test_id-".$i];
            echo $value;
            echo $_POST["option-".$value];
        }
    }
?>