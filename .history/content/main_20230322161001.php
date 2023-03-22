<?php 
    // Start Session ...............
    session_start();
    
    if(isset($_SESSION['last_inserted_user_id'])){
        $last_inserted_user_id = $_SESSION['last_inserted_user_id'];

        // query to retrieve student and their courses
        $sql = "SELECT *
                FROM questions 
                INNER JOIN questions_options ON questions.id = questions_options.question_id 
                INNER JOIN OPTIONS ON questions_options.option_id = options.id
                INNER JOIN questions_core_values ON questions.id = questions_core_values.question_id 
                INNER JOIN core_values ON questions_core_values.core_value_id = core_values.id
                WHERE user_id=".$last_inserted_user_id;

        // execute query
        $result = $conn->query($sql);

        $honesty = 0;
        $ownership = 0;
        $teamwork = 0;
        $customer_experience = 0;
        $learn_and_apply = 0;
        if ($result->num_rows > 0) {
            // this loop running on 50 questions .................................
            for($i = 1; $i <= 4; $i++){
                // this loop running on coming data from database ..............................
                while($row = $result->fetch_assoc()) {
                    if($row['question_id'] == $i){
                        if($row['question_id'] == 2){
                            die($row['question_id']);
                        }
                        // this loop running on 5 core values ........................
                        for($x = 1; $x <= 5; $x++){
                            if($row['core_value_id'] == $x){
                                if($row['value'] == "p"){
                                    if($row['option'] == "agree"){
                                        if($x == 1){
                                            $honesty++;
                                        }elseif($x == 2){
                                            $ownership++;
                                        }elseif($x == 3){
                                            $teamwork++;
                                        }elseif($x == 4){
                                            $customer_experience++;
                                        }elseif($x == 5){
                                            $learn_and_apply++;
                                        }
                                    }elseif($row['option'] == "strongly_agree"){
                                        if($x == 1){
                                            $honesty += 2;
                                        }elseif($x == 2){
                                            $ownership += 2;
                                        }elseif($x == 3){
                                            $teamwork += 2;
                                        }elseif($x == 4){
                                            $customer_experience += 2;
                                        }elseif($x == 5){
                                            $learn_and_apply += 2;
                                        }
                                    }elseif($row['option'] == "disagree"){
                                        if($x == 1){
                                            $honesty--;
                                        }elseif($x == 2){
                                            $ownership--;
                                        }elseif($x == 3){
                                            $teamwork--;
                                        }elseif($x == 4){
                                            $customer_experience--;
                                        }elseif($x == 5){
                                            $learn_and_apply--;
                                        }
                                    }elseif($row['option'] == "strongly_disagree"){
                                        if($x == 1){
                                            $honesty -= 2;
                                        }elseif($x == 2){
                                            $ownership -= 2;
                                        }elseif($x == 3){
                                            $teamwork -= 2;
                                        }elseif($x == 4){
                                            $customer_experience -= 2;
                                        }elseif($x == 5){
                                            $learn_and_apply -= 2;
                                        }
                                    }
                                }else{
                                    if($row['option'] == "agree"){
                                        if($x == 1){
                                            $honesty--;
                                        }elseif($x == 2){
                                            $ownership--;
                                        }elseif($x == 3){
                                            $teamwork--;
                                        }elseif($x == 4){
                                            $customer_experience--;
                                        }elseif($x == 5){
                                            $learn_and_apply--;
                                        }
                                    }elseif($row['option'] == "strongly_agree"){
                                        if($x == 1){
                                            $honesty -= 2;
                                        }elseif($x == 2){
                                            $ownership -= 2;
                                        }elseif($x == 3){
                                            $teamwork -= 2;
                                        }elseif($x == 4){
                                            $customer_experience -= 2;
                                        }elseif($x == 5){
                                            $learn_and_apply -= 2;
                                        }
                                    }elseif($row['option'] == "disagree"){
                                        if($x == 1){
                                            $honesty++;
                                        }elseif($x == 2){
                                            $ownership++;
                                        }elseif($x == 3){
                                            $teamwork++;
                                        }elseif($x == 4){
                                            $customer_experience++;
                                        }elseif($x == 5){
                                            $learn_and_apply++;
                                        }
                                    }elseif($row['option'] == "strongly_disagree"){
                                        if($x == 1){
                                            $honesty += 2;
                                        }elseif($x == 2){
                                            $ownership += 2;
                                        }elseif($x == 3){
                                            $teamwork += 2;
                                        }elseif($x == 4){
                                            $customer_experience += 2;
                                        }elseif($x == 5){
                                            $learn_and_apply += 2;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    // echo "<pre>";
                    // print_r($row);
                    // var_dump($row['point']);
                    // echo intval($row['point']);
                    // if($row['question_id'])
                    // echo "<br />";
                }
                $_SESSION['honesty'] = $honesty;
                $_SESSION['ownership'] = $ownership;
                $_SESSION['teamwork'] = $teamwork;
                $_SESSION['customer_experience'] = $customer_experience;
                $_SESSION['learn_and_apply'] = $learn_and_apply;
            }
        }else{
            unset($_SESSION['last_inserted_user_id']);
            header('location:index.php');
        }
    }
?>

<?php
    // Execute a query on the database
    $sql = "SELECT * FROM try ORDER BY RAND()";
    $result = $conn->query($sql);

?>
<div class="container">
    <?php 
        if(isset($last_inserted_user_id)){
            ?>
                <div class="mt-5">
                    <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-purple btn-h-outline-purple btn-a-outline-purple w-100 my-2 py-3 shadow-sm">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-8"> 
                                <div class="text-secondary-d1 text-120" style="font-family: cursive; font-weight: bolder;">
                                    1  Honesty => <?php echo $_SESSION['honesty']."<br />" ?>
                                    2  Ownership => <?php echo $_SESSION['ownership']."<br />" ?>
                                    3  Teamwork => <?php echo $_SESSION['teamwork']."<br />" ?>
                                    4  Customer Experience => <?php echo $_SESSION['customer_experience']."<br />" ?>
                                    5  Learn and apply => <?php echo $_SESSION['learn_and_apply'] ?>
                                </div>
                                <div class="col-12 col-md-4 text-center mb-3">
                                    <a href="index.php" class="f-n-hover btn btn-warning btn-raised px-4 py-25 w-75 text-600">Return to Test</a>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            <?php
            // unset($_SESSION['last_inserted_user_id']);
            // session_unset(); // Unset all the session variables
            // session_destroy(); // Destroy the session data from the server and invalidate the session ID
        }else{
            ?>
                <form method="post" action="content/my_process.php">
                    <div class="mb-3">
                        <div id="emailHelp" class="form-text mb-3">First Enter Your Full Name Correctly.</div>
                        <label for="exampleInputEmail1" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <?php
                        // Process the query result
                        if ($result->num_rows > 0) {
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                                // Do something with the row data
                                ?>
                                    <div class="mt-5">
                                        <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-purple btn-h-outline-purple btn-a-outline-purple w-100 my-2 py-3 shadow-sm">
                                            <!-- Premium Plan -->
                                            <div class="row align-items-center">
                                                <div class="col-12 col-md-8"> 
                                                    <div class="text-secondary-d1 text-120" style="font-family: cursive; font-weight: bolder;">
                                                        Q.<?php echo $count ?> -> <?php echo $row['question'] ?>
                                                        <input type="hidden" name="test_id-<?php echo $count ?>" value="<?php echo $row['id'] ?>" />
                                                        <?php //echo $row['id'] ?>
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">
                                                    <li>
                                                        <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                                        <span>
                                                            <span class="t10" style="font-family: cursive;" >Agree</span>
                                                        </span>
                                                        <input type="radio" name="option-<?php echo $row['id'] ?>" value="agree" />
                                                    </li>

                                                    <li class="mt-25">
                                                        <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                                        <span class="text-110" style="font-family: cursive;">
                                                            Strongly Agree
                                                        </span>
                                                        <input type="radio" name="option-<?php echo $row['id'] ?>" value="strongly_agree" />
                                                    </li>

                                                    <li class="mt-25">
                                                        <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                                        <span class="text-110" style="font-family: cursive;">
                                                            Disagree
                                                        </span>
                                                        <input type="radio" name="option-<?php echo $row['id'] ?>" value="disagree" />
                                                    </li>

                                                    <li class="mt-25">
                                                        <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                                        <span class="text-110" style="font-family: cursive;">
                                                            Strongly disagree
                                                        </span>
                                                        <input type="radio" name="option-<?php echo $row['id'] ?>" value="strongly_disagree" />
                                                    </li>

                                                    <li class="mt-25">
                                                        <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                                        <span class="text-110" style="font-family: cursive;">
                                                            Neither agree not disagree
                                                        </span>
                                                        <input type="radio" name="option-<?php echo $row['id'] ?>" value="neither" />
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                $count ++;
                            }
                        } else {
                            ?>
                                <div class="mt-5">
                                    <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-purple btn-h-outline-purple btn-a-outline-purple w-100 my-2 py-3 shadow-sm">
                                        <div class="row align-items-center">
                                            <?php echo "0 results" ?>
                                        </div>
                                    </div>
                                </div>            
                            <?php
                        }
                        // Close the database connection
                        $conn->close();
                    ?>
                    <div class="col-12 col-md-4 text-center mb-3">
                        <input type="submit" name="submit" value="Submit" class="f-n-hover btn btn-warning btn-raised px-4 py-25 w-75 text-600" />
                    </div>
                </form>
            <?php
        }
    ?>
</div>