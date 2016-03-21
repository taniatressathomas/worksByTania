<?php

include 'connectDB.php';

// Start session
session_start(); 

// Check if user is logged in
if(isset($_SESSION['user_id'])) {

	// User is logged in!
	$query = mysql_query("SELECT username FROM login
				   WHERE ID = " . $_SESSION['user_id'] . " LIMIT 1")
				   or die(mysql_error());

	list($username) = mysql_fetch_row($query);


     
        header('Location: ../craiglist/index.php');
    

} else {
	
	// User not logged in
	echo 'Please login before opening the user panel.';

}

?>