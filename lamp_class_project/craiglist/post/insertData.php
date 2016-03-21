<?php
	
  include '../../authentication/header.php';

   include '../../authentication/connectDB.php';


   //put the submitted values into regular variables
  if (isset($_POST['posted']) and isset($_POST['submit'])) 
{
	
       $subCateogry = $_POST['subCateogry'];
       $location = $_POST['location'];
       $title = $_POST['title'];
       $price = $_POST['price'];
       $description = $_POST['description'];
       $email = $_POST['email'];
       $confirm_email = $_POST['confirm_email'];
       $agree = $_POST['agree'];

      //storing session variables

      //session_start();
      $_SESSION["subCateogry"] = $subCateogry;
      $_SESSION["location"] = $location;
      $_SESSION["title"] = $title;
      $_SESSION["price"] = $price;
      $_SESSION["description"] = $description;
      $_SESSION["email"] = $email;
      $_SESSION["agree"] = $agree;


      mysql_query("CREATE TABLE IF NOT EXISTS `BLOB` (
                        id INT(11) AUTO_INCREMENT PRIMARY KEY, 
                        NAME VARCHAR(255),
                        IMAGE BLOB

                    )");

      //getting the id's from parent table
  	  $SubCategory_ID_DB = "SELECT SubCategory_ID from SubCategory where SubCategoryName=\"".$subCateogry ."\"";
      $result1= mysql_fetch_assoc(mysql_query($SubCategory_ID_DB));

   
      $SubCategory_ID_value =$result1['SubCategory_ID'];

      $location_ID_DB = "SELECT Location_ID from Location where LocationName=\"".$location ."\"";
      $result2= mysql_fetch_assoc(mysql_query($location_ID_DB));
    
      $location_ID_value = $result2['Location_ID'];

      //storing session variables
      $_SESSION["SubCategory_ID_value"] = $SubCategory_ID_value;
      $_SESSION["location_ID_value"] = $location_ID_value;
      

  	 //make an array of field names and data types

      $field_names = array("title" => "string",
          "price" => "integer",
          "description" => "string",
          "email" => "email",
          "confirm_email" => "email",
          "agree" => "checkbox");
  	 //try checking the data type of each submitted value based on the name of the field

  	 function form_validates($fns){
      foreach ($fns as $key => $value) {
        $field_value = $key;

        global $$field_value;

        switch ($value) {

  		Case 'string':
            
            if ((strlen($$field_value) < 1) or (strlen($$field_value) > 99)) {
              throw new Exception("Please enter a string value between 1 and 100 characters in the <b>$key</b> field");
            }

            break;
          Case "integer":

            if (!preg_match('/^[$]?[0-9]*(\.)?[0-9]?[0-9]?$/',$$field_value)) {
              

              throw new Exception("Please enter a number without alphabetical characters in the <b>$key</b> field.");
            }

            break;


          Case "email":

            // check an email address is possibly valid
              if (!preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $$field_value)){
                throw new Exception("Please enter a valid email id syntax shold be abc@abc.com <b>$key</b> field");
              }
              break;
          Case "checkbox":
          	if (!$$field_value)
          	{
          		throw new Exception("Checkbox is not checked");
          	}
            break;
          
          default:
            
            break;
        }
      }

    }

    

    function validateEmailID($email,$confirm_email){
  		if ($email != $confirm_email){
  			throw new Exception("Please enter same EmailID");
  		}

  	}


 function displayValues() {
      
    //form for the preview page

      echo "<form method='POST' action='submit.php'>";
      echo "<br><h2>Please Verify Details</h2><br>";
      
      echo "<br> Subcateogry :". $_POST['subCateogry']."<br>";
      echo "Location :". $_POST['location']."<br>";
      echo "Title :".$_POST['title']."<br>";
      echo "Price :" . $_POST['price']."<br>";
      echo "Description :". $_POST['description']."<br>";
      echo "Email :".$_POST['email']."<br>";
  
      
      //displaying the uploaded images
      if(isset($_FILES['userFile']))
      {

        echo "<br> Please verify uploaded images:<br>";
        $name_array = $_FILES['userFile']['name'];
        $tmp_name_array = $_FILES['userFile']['tmp_name'];
        $type_array = $_FILES['userFile']['type'];
        $size_array = $_FILES['userFile']['size'];
        $error_array = $_FILES['userFile']['error'];

        for($i = 0; $i < count($tmp_name_array); $i++){
              if($name_array[$i] !=""){
                  $j=$i+1;
              echo "File$j :<br>";
                  echo "File name is : ".$name_array[$i] ."<br>";
                  echo "File size is : " . $size_array[$i] . "<br>";
            echo "File type is : " . $type_array[$i] . "<br>";
            echo "File tmp_name is : " . $tmp_name_array[$i] . "<br>";

            // Image submitted by form. Open it for reading (mode "r")
            $fp = fopen($tmp_name_array[$i], "r");
           
            // If successful, read from the file pointer using the size of the file (in bytes) as the length.
            if ($fp) {
                    $content = fread($fp, $size_array[$i]);
                    fclose($fp);

                    // Add slashes to the content so that it will escape special characters.
                    // As pointed out, mysql_real_escape_string can be used here as well. Your choice.
                  $content = addslashes($content);
                  $content= mysql_real_escape_string($content);
                  $name= mysql_real_escape_string($name_array[$i]);

                  $query1 = "INSERT INTO `BLOB`(`NAME`, `IMAGE`) VALUES (' .$name. ',' .$content. ')";
                  if (!mysql_query($query1))
                    {
                        die('Error inserting : ' . mysql_error());
                    }
                    
                  }
           

                }
          }
    }

      echo"<br>Press the button to move on<br>";
      echo "<br><input type='submit' name='ok' value='Ok'>";
      echo "<input type='hidden' name='posted01' value='true'></form>";

     

    }
  	//catch the exception and produce an error message

  	try
  	{
  		//validatiing the form
  		form_validates($field_names); 
  		validateEmailID($email,$confirm_email);

  		//display the form value
  		displayValues();

  }
  	catch (Exception $e)
  	{
  		
  		echo $e -> getMessage();
  		echo "<br>";
  	}

   

}



  
      
    




?> 