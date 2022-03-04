<?php
    $dbHost = "localhost";  // or server name
    $dbUser = "root";       // because i use xampp
    $dbPass = "";           // i have no password
    $dbName = "bank_app";   // the name of the data base
    // connect to database
    $conn = new mysqli( $dbHost, $dbUser, $dbPass, $dbName);
    // check if the database exist 
    if($conn->connect_error){
        die("Database connection failed");
    };
?>