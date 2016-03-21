<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $connect = mysql_connect("localhost", "lamp", "1") or
        die ("Please check your server connection.");
        //create the main database if it doesn't already exist
        $create = mysql_query("CREATE DATABASE IF NOT EXISTS usersDB")
        or die(mysql_error());
        //make sure our recently created database is the active one
        mysql_select_db("usersDB");
        //create "login" table
        $login = "CREATE TABLE login (ID mediumint(9) AUTO_INCREMENT PRIMARY KEY,
        username varchar(255),
        password varchar(40),
        email varchar(255)
        )";
        $results = mysql_query($login)
        or die (mysql_error());
    
        echo "userDB Database successfully created!";
        ?>
    </body>
</html>
