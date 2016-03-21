 
<?php
 echo '<p><h3>Browse List</h3></p>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Title</th><th>Price</th><th>Description</th><th>Email</th><th>Posted Date</th><th>Browse</th>';
    echo '</tr>';
    while ($result= mysql_fetch_assoc($query)) {

        echo '<tr>';
        echo '<td>' . $result['Title'] . '</td>';
        echo '<td>' . $result['Price'] . '</td>';
        echo '<td>' . $result['Description'] . '</td>';
        echo '<td>' . $result['Email'] . '</td>';
        echo '<td>' . $result['Timestamp'] . '</td>';


        echo '<td>' . "<form action=\"ViewDetails.php\" method=\"get\">
                        <input type=\"hidden\" name=\"browse\" value=\"" . $result['Post_ID'] . "\">
                        <input type=\"submit\" value=\"Browse\"></form>" . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    echo '<p></p>';
        echo '<a href="../index.php">Home Page</a>';

?>