<?php
include '../authentication/header.php';
include '../authentication/connectDB.php';

	// gets value sent over search form
	$query = $_GET['query']; 
    
    // you can set minimum length of the query if you want
    $min_length = 3;
   
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
       
        // changes characters used in html to their equivalents, for example: < to &gt; 
        $query = htmlspecialchars($query); 
        
         
         // to makes sure nobody uses SQL injection
        $query = mysql_real_escape_string($query);
       
        //getting the post from Posts table if title or description match
        $queryResults = mysql_query("SELECT * FROM Posts
            WHERE (`title` LIKE '%".$query."%') OR (`Description` LIKE '%".$query."%')") or die(mysql_error());
    
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Title</th><th>Price</th><th>Description</th><th>Email</th><th>Posted Date</th><th>Browse</th>';
    echo '</tr>';     
        if(mysql_num_rows($queryResults) > 0){ // if one or more rows are returned do following
             
             // $results = mysql_fetch_array($queryResults) puts data from database into array, while it's valid it does the loop
            while($results = mysql_fetch_array($queryResults)){
           //displaying in table
    			echo '<tr>';
		        echo '<td>' . $results['Title'] . '</td>';
		        echo '<td>' . $results['Price'] . '</td>';
		        echo '<td>' . $results['Description'] . '</td>';
		        echo '<td>' . $results['Email'] . '</td>';
		        echo '<td>' . $results['Timestamp'] . '</td>';


		        echo '<td>' . "<form action=\"category/ViewDetails.php\" method=\"get\">
		                        <input type=\"hidden\" name=\"browse\" value=\"" . $results['Post_ID'] . "\">
		                        <input type=\"submit\" value=\"Browse\"></form>" . '</td>';
		        echo '</tr>';
            
            }
             
        }

        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
    echo '</table>';

    echo '<p></p>';
        echo '<a href="index.php">Home Page</a>';
?>