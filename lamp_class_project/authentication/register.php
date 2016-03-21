<?php


if(isset($_GET['try'])) {
    

    include 'connectDB.php';

    // Yes, the user has clicked on the submit button,
    // let's check if he filled in all the fields
    if(empty($_POST['username']) OR
        empty($_POST['password']) OR
        empty($_POST['email']) ) {

        // At least one of the file is empty, display an error
        echo 'Please fill in all the fields.';

    } else {

        // User has filled it all in!

        // SQL save variables
        $username = mysql_real_escape_string($_POST['username']);
        $password = MD5($_POST['password']);
        $email = mysql_real_escape_string($_POST['email']);

        $query = mysql_query("SELECT COUNT(id) FROM login
   WHERE username = '" . $username . "'
   OR email = '" . $email . "' ") or die(mysql_error());


        list($count) = mysql_fetch_row($query);

        if($count == 0) {

            // Username and Email are free!
            mysql_query("INSERT INTO login
                    (username, password, email)
                    VALUES
                    ('" . $username . "', '" . $password . "', '" . $email . "')
                    ") or die(mysql_error());

            echo 'You are successfully registered!<br>';
            ?>

        <a href="login.html">Please Click Here to Login</a>

        <?php
        } else {

            // Username or Email already taken
            echo 'Username or Email address already taken!';

        }


    }

}

?>




