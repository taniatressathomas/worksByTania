<html>
<head>
	<title>HOMEWORK 2</title>
<style type="text/css">
	body {
		font-family: "Times New Roman", Georgia, Serif;
		margin-top: 50px;
		margin-left: 50px;
	}

	#fileBrowse {
		background-color:gray;
		width: 100px;
	}
	textarea {
		data-role:none;
		
	}
 



	</style>




</head>
<body bgcolor="#FFFFFF">
  <?php
include '../../authentication/header.php';
?>

<form enctype="multipart/form-data" id="form"  method="post" action="insertData.php"> 
        <div>
          <input type="hidden" name="posted" value="true">
          <label for ="subCateogry" > Sub-Category:  </label>
          <select name="subCateogry" >
            <option value="Books">Books</option>
            <option value="Electronics">Electronics</option>
            <option value="household">household</option>
            <option value="Computer">Computer</option>
            <option value="Financial">Financial</option>
            <option value="Lessons">Lessons</option>
            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
            <option value="Volunteering">Volunteering</option>
          </select><br><br>

          <label for ="location" > Location:  </label>
          <select name="location" >
            <option value="Cupertino">Cupertino</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Stockholm">Stockholm</option>
          </select><br><br>

          <label for ="title" > Title:  </label>
          <input type = "text" name = "title" id = "title" style="width:600px;"> <br><br>

          <label for ="price" > Price:  </label>
          <input type = "text" name = "price" id = "price" > <br><br>

          <label for ="description" > Description:  </label>
          <textarea  name = "description" id = "description"  rows = "10" cols ="90">
          </textarea><br><br>

          <label for ="email" > Email:  </label>
          <input type = "text" name = "email" id = "email" style="width:600px;"> <br><br>

          <label for ="confirm_email" > Confirm Email:  </label>
          <input type = "text" name = "confirm_email" id = "confirm_email" style="width:600px;"> <br><br>

          <label for ="agree" >I agree with terms and condition </label>
          <input type = "checkbox" name = "agree" id = "agree"> <br><br>

          <label for ="optional_fields" >Optional Fields:</label><br><br>

 		  <label for ="image1" >Image 1 (max 5 MB):</label>
          <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
          <input name="userFile[]" type="file"   id="userFile" value="Browse" style="border: solid 1px #999;"/><br><br>

          <label for ="image2" >Image 2 (max 5 MB):</label>
          <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
          <input name="userFile[]" type="file"   id="userFile" value="Browse" style="border: solid 1px #999;"/><br><br>
	    

          <label for ="image3" >Image 3 (max 5 MB):</label>
          <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>    
          <input name="userFile[]" type="file"   id="userFile" value="Browse" style="border: solid 1px #999;"/><br><br>

	     <label for ="image4" >Image 4 (max 5 MB):</label>
          <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
          <input name="userFile[]" type="file"   id="userFile" value="Browse" style="border: solid 1px #999;"/><br><br>

	      
          

          <input type="submit" value="Submit" name="submit"style="background-color:gray;">
          <input type="reset" value="Reset" name="reset"style="background-color:gray;">

        </div>

      </form>

<div>
<a href="../index.php">Home Page</a>
</div>


</body>
</html>
