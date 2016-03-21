<?php

include '../../authentication/header.php';


// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
  

    include '../../authentication/connectDB.php';

   //storing details of country and location
    $_SESSION["country"] = "USA";
    $_SESSION["location"] = "Cupertino";
    include 'BrowseCountry.php';
    include 'Browse.php';
	
}

?>
