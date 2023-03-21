<?php 

    // Define the database credentials
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "personality_test";

    // Create a MySQLi object
    $conn = new mysqli($host, $username, $password, $database);

    // Check for any errors during the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "connection okay";
    }

?>