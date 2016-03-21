<?php

include '../../authentication/header.php';


// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];


    include '../../authentication/connectDB.php';

    //storing country and location deatails
    $_SESSION["country"] = "India";
    $_SESSION["location"] = "Mumbai";
    include 'BrowseCountry.php';
    include 'Browse.php';
    
}

?>
