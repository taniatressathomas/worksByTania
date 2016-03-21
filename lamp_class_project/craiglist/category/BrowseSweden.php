<?php

include '../../authentication/header.php';
 

// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
   

    include '../../authentication/connectDB.php';

    //storing the details of country and location
    $_SESSION["country"] = "Sweden";
    $_SESSION["location"] = "Stockholm";
    include 'BrowseCountry.php';
    include 'Browse.php';
    
}

?>
