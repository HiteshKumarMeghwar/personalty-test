<?php 
    // Start Session ...............
    session_start();
    
    if(isset($_SESSION['last_inserted_user_id'])){
        $last_inserted_user_id = $_SESSION['last_inserted_user_id'];

        // query for count how many total core values ...............................
        $query_core_values = "SELECT * FROM core_values";
        $result_core_values = mysqli_query($conn, $query_core_values);
        $total_core_values = mysqli_num_rows($result_core_values);

        // query for count how many total questions ...............................
        $query_questions = "SELECT * FROM questions";
        $result_questions = mysqli_query($conn, $query_questions);
        $total_questions = mysqli_num_rows($result_questions);

        // query for count how many total points of honesty ...............................
        $query_point_honesty = 
        "SELECT *
            FROM questions 
            INNER JOIN questions_core_values ON questions.id = questions_core_values.question_id 
            INNER JOIN core_values ON questions_core_values.core_value_id = core_values.id
            WHERE core_value_id = 1";
        $result_point_honesty = mysqli_query($conn, $query_point_honesty);
        $honesty_points = mysqli_num_rows($result_point_honesty);

        // query for count how many total points of ownership ...............................
        $query_point_ownership = 
        "SELECT *
            FROM questions 
            INNER JOIN questions_core_values ON questions.id = questions_core_values.question_id 
            INNER JOIN core_values ON questions_core_values.core_value_id = core_values.id
            WHERE core_value_id = 2";
        $result_point_ownership = mysqli_query($conn, $query_point_ownership);
        $ownership_points = mysqli_num_rows($result_point_ownership);

        // query for count how many total points of teamwork ...............................
        $query_point_teamwork = 
        "SELECT *
            FROM questions 
            INNER JOIN questions_core_values ON questions.id = questions_core_values.question_id 
            INNER JOIN core_values ON questions_core_values.core_value_id = core_values.id
            WHERE core_value_id = 3";
        $result_point_teamwork = mysqli_query($conn, $query_point_teamwork);
        $teamwork_points = mysqli_num_rows($result_point_teamwork);

        // query for count how many total points of customer_experience ...............................
        $query_point_customer_experience = 
        "SELECT *
            FROM questions 
            INNER JOIN questions_core_values ON questions.id = questions_core_values.question_id 
            INNER JOIN core_values ON questions_core_values.core_value_id = core_values.id
            WHERE core_value_id = 4";
        $result_point_customer_experience = mysqli_query($conn, $query_point_customer_experience);
        $customer_experience_points = mysqli_num_rows($result_point_customer_experience);

        // query for count how many total points of learn_apply ...............................
        $query_point_learn_apply = 
        "SELECT *
            FROM questions 
            INNER JOIN questions_core_values ON questions.id = questions_core_values.question_id 
            INNER JOIN core_values ON questions_core_values.core_value_id = core_values.id
            WHERE core_value_id = 5";
        $result_point_learn_apply = mysqli_query($conn, $query_point_learn_apply);
        $learn_apply_points = mysqli_num_rows($result_point_learn_apply);
        

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
            // this loop running on coming data from database ..............................
            while($row = $result->fetch_assoc()) 
            {
                // this loop running on 50 questions .................................
                for($i = 1; $i <= $total_questions; $i++)
                {     
                    if($row['question_id'] == $i)
                    {
                        // this loop running on 5 core values ........................
                        for($x = 1; $x <= $total_core_values; $x++){
                            if($row['core_value_id'] == $x)
                            {
                                if($row['value'] == "p")
                                {
                                    if($row['option'] == "agree")
                                    {
                                        if($x == 1){
                                            $honesty = $honesty + 1;
                                        }elseif($x == 2){
                                            $ownership = $ownership + 1;
                                        }elseif($x == 3){
                                            $teamwork = $teamwork + 1;
                                        }elseif($x == 4){
                                            $customer_experience = $customer_experience + 1;
                                        }elseif($x == 5){
                                            $learn_and_apply = $learn_and_apply + 1;
                                        }
                                    }elseif($row['option'] == "strongly_agree"){
                                        if($x == 1){
                                            $honesty = $honesty + 2;
                                        }elseif($x == 2){
                                            $ownership = $ownership + 2;
                                        }elseif($x == 3){
                                            $teamwork = $teamwork + 2;
                                        }elseif($x == 4){
                                            $customer_experience = $customer_experience + 2;
                                        }elseif($x == 5){
                                            $learn_and_apply = $learn_and_apply + 2;
                                        }
                                    }elseif($row['option'] == "disagree"){
                                        if($x == 1){
                                            $honesty = $honesty - 1;
                                        }elseif($x == 2){
                                            $ownership = $ownership - 1;
                                        }elseif($x == 3){
                                            $teamwork = $teamwork - 1;
                                        }elseif($x == 4){
                                            $customer_experience = $customer_experience - 1;
                                        }elseif($x == 5){
                                            $learn_and_apply = $learn_and_apply - 1;
                                        }
                                    }elseif($row['option'] == "strongly_disagree"){
                                        if($x == 1){
                                            $honesty = $honesty - 2;
                                        }elseif($x == 2){
                                            $ownership = $ownership - 2;
                                        }elseif($x == 3){
                                            $teamwork = $teamwork - 2;
                                        }elseif($x == 4){
                                            $customer_experience = $customer_experience - 2;
                                        }elseif($x == 5){
                                            $learn_and_apply = $learn_and_apply - 2;
                                        }
                                    }
                                }else{
                                    if($row['option'] == "agree"){
                                        if($x == 1){
                                            $honesty = $honesty - 1;
                                        }elseif($x == 2){
                                            $ownership = $ownership - 1;
                                        }elseif($x == 3){
                                            $teamwork = $teamwork - 1;
                                        }elseif($x == 4){
                                            $customer_experience = $customer_experience - 1;
                                        }elseif($x == 5){
                                            $learn_and_apply = $learn_and_apply - 1;
                                        }
                                    }elseif($row['option'] == "strongly_agree"){
                                        if($x == 1){
                                            $honesty = $honesty - 2;
                                        }elseif($x == 2){
                                            $ownership = $ownership - 2;
                                        }elseif($x == 3){
                                            $teamwork = $teamwork - 2;
                                        }elseif($x == 4){
                                            $customer_experience = $customer_experience - 2;
                                        }elseif($x == 5){
                                            $learn_and_apply = $learn_and_apply - 2;
                                        }
                                    }elseif($row['option'] == "disagree"){
                                        if($x == 1){
                                            $honesty = $honesty + 1;
                                        }elseif($x == 2){
                                            $ownership = $ownership + 1;
                                        }elseif($x == 3){
                                            $teamwork = $teamwork + 1;
                                        }elseif($x == 4){
                                            $customer_experience = $customer_experience + 1;
                                        }elseif($x == 5){
                                            $learn_and_apply = $learn_and_apply + 1;
                                        }
                                    }elseif($row['option'] == "strongly_disagree"){
                                        if($x == 1){
                                            $honesty = $honesty + 2;
                                        }elseif($x == 2){
                                            $ownership = $ownership + 2;
                                        }elseif($x == 3){
                                            $teamwork = $teamwork + 2;
                                        }elseif($x == 4){
                                            $customer_experience = $customer_experience + 2;
                                        }elseif($x == 5){
                                            $learn_and_apply = $learn_and_apply + 2;
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
            }

            $p_honesty = ($honesty + $honesty_points)/($honesty_points * 2) * 100;
            $p_ownership = ($ownership + $ownership_points)/($ownership_points * 2) * 100;
            $p_teamwork = ($teamwork + $teamwork_points)/($teamwork_points * 2) * 100;
            $p_customer_experience = ($customer_experience + $customer_experience_points)/($customer_experience_points * 2) * 100;
            $p_learn_and_apply = ($learn_and_apply + $learn_apply_points)/($learn_apply_points * 2) * 100;
            
            // $p_honesty = ($honesty + 7)/14 * 100;
            // $p_ownership = ($ownership + 19)/38 * 100;
            // $p_teamwork = ($teamwork + 23)/46 * 100;
            // $p_customer_experience = ($customer_experience + 10)/20 * 100;
            // $p_learn_and_apply = ($learn_and_apply + 9)/18 * 100;
            

            $query = "INSERT INTO final_result (user_id, honesty, ownership, teamwork, customer_experience, learn_and_apply) VALUES ('$last_inserted_user_id', '$p_honesty', '$p_ownership', '$p_teamwork', '$p_customer_experience', '$p_learn_and_apply')";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "Error: " . mysqli_error($conn);
            }

            $_SESSION['honesty'] = $p_honesty;
            $_SESSION['ownership'] = $p_ownership;
            $_SESSION['teamwork'] = $p_teamwork;
            $_SESSION['customer_experience'] = $p_customer_experience;
            $_SESSION['learn_and_apply'] = $p_learn_and_apply;

        }else{
            unset($_SESSION['last_inserted_user_id']);
            header('location:index.php');
        }
    }
?>

<?php
    // Execute a query on the database
    $sql = "SELECT * FROM questions ORDER BY RAND()";
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
                                    1  Honesty => <?php echo $_SESSION['honesty']."%"."<br />" ?>
                                    2  Ownership => <?php echo $_SESSION['ownership']."%"."<br />" ?>
                                    3  Teamwork => <?php echo $_SESSION['teamwork']."%"."<br />" ?>
                                    4  Customer Experience => <?php echo $_SESSION['customer_experience']."%"."<br />" ?>
                                    5  Learn and apply => <?php echo $_SESSION['learn_and_apply']."%" ?>
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
                        <div id="emailHelp" class="form-text mb-3" style="font-family: cursive; color: red; font-weight: bolder;">First Enter Your Full Name Correctly.</div>
                        <label for="exampleInputEmail1" class="form-label" style="font-family: cursive;">Full Name</label>
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