<?php
    
	$name = $_SESSION["country"];
	$location = $_SESSION["location"];
	echo "<h1>$name - $location</h1>";


	$region_ID_DB = "SELECT Region_id FROM Region where RegionName=\"".$name ."\"" or die(mysql_error());
    //getting the location id's of country
    $location = "SELECT Location_ID FROM Location where Region_ID = ($region_ID_DB)" or die(mysql_error());
    $row= mysql_fetch_assoc(mysql_query($location));
    $location_id_value =$row['Location_ID'];

    //Getting the posts of country
    $query = mysql_query("SELECT * FROM Posts where Location_ID = $location_id_value") or die(mysql_error());

   

 ?>