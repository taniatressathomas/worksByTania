<?php

include '../../authentication/header.php';


// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];


    include '../../authentication/connectDB.php';
    //getting post under Full-time
    $query = mysql_query("SELECT * FROM Posts where SubCategory_ID = 7") or die(mysql_error());

    include 'Browse.php';
}

?>
