

<?php

include '../../authentication/header.php';


// Check if user is logged in
if(isset($_SESSION['username'])) {

    if (isset($_GET['browse']))
    {

        include '../../authentication/connectDB.php';



       //get the details of the post
        $sql = "SELECT * FROM Posts WHERE Post_ID=\"" . $_GET['browse'] . "\"";
        $query = mysql_query($sql) or die(mysql_error());

        echo '<p></p>';
        echo '<div>';
        echo '<ul style="list-style-type:none;">';
        while ($result= mysql_fetch_assoc($query)) {
        echo '<li> <h2><i>' . $result['Title'] . '</i></h2> </li>';

        //getting the location of post
        $location_id = $result['Location_ID'];
        $location = "SELECT * FROM Location where Location_ID = $location_id" or die(mysql_error());
        $row= mysql_fetch_assoc(mysql_query($location));
        $location_name =$row['LocationName'];

        //getting country
        $region_id =$row['Region_ID'];
        $region = "SELECT RegionName FROM Region where Region_ID = $region_id " or die(mysql_error());
        $row1= mysql_fetch_assoc(mysql_query($region));
        $Region_name =$row1['RegionName'];

        echo '<li><h3>'. $location_name .','.$Region_name.'</h3></li>';

        echo '<li>' . $result['Price'] . '</li>';
        echo '<li>' . $result['Description'] . '</li>';
        echo '<li>' . $result['Email'] . '</li>';
        echo '<li>'. $result['Timestamp'] .'</li>';
        
        

        $img1 = $result['Image_1'];
        //echo $img1;
        

        echo '<img src="$img1"';

        $img2 = $result['Image_2'];
         echo '<img src="$img2"';

        $img3 = $result['Image_3'];
         echo '<img src="$img3"';

        $img4 = $result['Image_4'];
         echo '<img src="$img4"';
        //echo '<img src="'.$img1. '"alt="HTML5 Icon" style="width:128px;height:128px">';
        //echo '<li><img src="$img1">';
     
    }

    echo '</ui>';

    //ob_clean();
    //header("Content-type: image/jpg");
     //echo '<img src="'.$img1. '"alt="HTML5 Icon" style="width:128px;height:128px">';
     //echo $img1;
     //echo $img2;

    echo '</div>';


        echo '<p></p>';

        echo "<p><a href=\"javascript:history.go(-1)\">Back to view List</a></p>";
        echo '<p><a href="../index.php">Home Page</a></p>';
        

    }

}
?>



