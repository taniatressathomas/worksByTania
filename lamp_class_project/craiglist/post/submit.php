 <?php

  include '../../authentication/header.php';

   include '../../authentication/connectDB.php';

 if (isset($_POST['posted01']) and isset($_POST['ok'])) {

   
    $title=$_SESSION["title"];
    $price=$_SESSION["price"];
    $description=$_SESSION["description"];
    $email=$_SESSION["email"];
    $agree=$_SESSION["agree"];
   
	

    $SubCategory_ID = $_SESSION['SubCategory_ID_value'];
    $SubCategory_ID = (INT) $SubCategory_ID;

    $location_ID = $_SESSION['location_ID_value'];
    $location_ID = (INT) $location_ID;
	


    $query="INSERT INTO Posts(`Title`, `Price`, `Description`, 
    	`Email`, `Agreement`, `Timestamp`,`SubCategory_ID`, `Location_ID`)
              VALUES 
              ( '$title',
              	'$price',
              	'$description',
              	'$email',
              	'$agree',
              	NOW(),
              	$SubCategory_ID,
              	$location_ID
              
              	)";
              if (!mysql_query($query))
            {
                die('Error inserting : ' . mysql_error());
            }
       
       //getting the id of latest posted   
       $last_value_inserted = "SELECT MAX(post_id) from posts";
       $result1= mysql_fetch_assoc(mysql_query($last_value_inserted ));
	   $lastPost_id =$result1['MAX(post_id)'];

	   //getting the MAX ID from blob   
       $blob_max_row = "SELECT MAX(id) FROM `BLOB` ";
       $result2= mysql_fetch_assoc(mysql_query($blob_max_row ));
	   $blobRow_id =$result2['MAX(id)'];

	   //inserting the blobs from BLOB into Post table 
	   	for($i = 1; $i <= $blobRow_id; $i++){

		  $image = "SELECT image from BLOB WHERE id=$i";
	      $imageUpdate = "UPDATE POSTS SET Image_$i ='$image' where post_id= $lastPost_id";
	      if (!mysql_query($imageUpdate))
	            {
	                die('Error inserting : ' . mysql_error());
	            }
	        
           }

        echo "Thank you, your entry has been posted in our database. ";
        //header('Location: homework4_Tania.html');
        mysql_query('DROP TABLE IF EXISTS `BLOB`');

        echo'<br>';
        echo '<a href="../index.php">Go back to the main page</a>.';


    }

    
?>