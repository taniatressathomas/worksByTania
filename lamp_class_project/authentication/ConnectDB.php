<?php
// Open a connection to the DB
$conn = mysql_connect('localhost', 'lamp', '1') or die(mysql_error());
mysql_select_db('usersDB', $conn);
?>
