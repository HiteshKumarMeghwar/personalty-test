<?php
    // Including database connection file for connection ....................
    require_once 'database/connection.php';


    // Execute a query on the database
    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);

?>
<div class="container">
    <form method="post" action="#">
        <?php
            // Process the query result
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Do something with the row data
                    ?>
                        <div class="mt-5">
                            <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-purple btn-h-outline-purple btn-a-outline-purple w-100 my-2 py-3 shadow-sm">
                                <!-- Premium Plan -->
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-8"> 
                                        <div class="text-secondary-d1 text-120">
                                            questions
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">
                                        <li>
                                            <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                            <span>
                                                <span class="text-110">Agree</span>
                                            </span>
                                            <input type="radio" name="option" value="agree" />
                                        </li>

                                        <li class="mt-25">
                                            <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                            <span class="text-110">
                                                Strongly Agree
                                            </span>
                                            <input type="radio" name="option" value="strongly_agree" />
                                        </li>

                                        <li class="mt-25">
                                            <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                            <span class="text-110">
                                                Disagree
                                            </span>
                                            <input type="radio" name="option" value="disagree" />
                                        </li>

                                        <li class="mt-25">
                                            <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                            <span class="text-110">
                                                Strongly disagree
                                            </span>
                                            <input type="radio" name="option" value="strongly_disagree" />
                                        </li>

                                        <li class="mt-25">
                                            <!-- <i class="fa fa-check text-success-m2 text-110 mr-2 mt-1"></i> -->
                                            <span class="text-110">
                                                Neither agree not disagree
                                            </span>
                                            <input type="radio" name="option" value="neither" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php
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
        <div class="col-12 col-md-4 text-center">
            <input type="submit" value="Submit" class="f-n-hover btn btn-warning btn-raised px-4 py-25 w-75 text-600" />
        </div>
    </form>
</div>