<?php

// Start session
session_start();

// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo 'Hi '. $username . ', welcome to your profile!';
    echo '<br>';
    echo '<a href="../authentication/logout.php">Logout</a>';

} else {
    echo 'You are not logged in. <br>';
    echo '<a href="../authentication/login.html">Login</a>';
}

echo '<p></p>';
echo '<p></p>';

?>
