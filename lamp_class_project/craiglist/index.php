<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HomeWork1</title>

<style type="text/css">
<!--



.homepage {
	font-family: "Times New Roman", Georgia, Serif;
	margin-top: 100px;
	text-align: left;
}

.menu{
	margin-left: 0px;
}

.form {
	margin-left: 40px;
	margin-right: 20px;
}

table {
	margin-left: 40px;

}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
 
}
th, td {
	
    padding: 5px;
    text-align: left;
}

.logout {
	float: right;
}
-->


</style>
</head>

<body class="homepage">
<?php
include '../authentication/header.php';
?>

<div class="menu">
	<ul class="left" style="list-style-type: none">
		<li style="margin-bottom: 20px;"><a href="post/Post.php"> New Post</a></li>
		
		<li style="margin-bottom: 20px;"><a href="#">Help</a></li>
		<li style="margin-bottom: 20px;">Search by title:</li>
	</ul>
	
</div>
<div class="form">
	<form id="submit" action="search.php" method="GET" style="margin-bottom: 10px;"  >
		<input type="text" id="textbox" name="query" >
		<input type="submit" value="search" style="background-color:gray;">
		<input type="button" value="Reset" style="background-color:gray;">
	</form>
</div>
<table class="table" align="left" border="1" style="width:95%;margin-bottom:30px;" >
	<tr>
		<th>For Sale </th>
		<th>Services </th>
		<th>Jobs</th>
		<th>Country</th>
		<th>Locations</th>
	</tr>
	<tr>
		<td><a href="category/BowseBooks.php">Books</a></td>
		<td><a href="category/BrowseComputer.php">Computer</a></td>
		<td><a href="category/BrowseFullTime.php">Full-Time</a></td>
		<td><a href="category/BrowseUSA.php">USA</a></td>
		<td><a href="category/BrowseUSA.php">Cupertino</a></td>
	</tr>
	<tr>
		<td><a href="category/BrowseElectronics.php">Electronics</a></td>
		<td><a href="category/BrowseFinancial.php">Financial</a></td>
		<td><a href="category/BrowsePartTime.php">Part-Time</a></td>
		<td><a href="category/BrowseIndia.php">India</a></td>
		<td><a href="category/BrowseIndia.php">Mumbai</a></td>
	</tr>
	<tr>
		<td><a href="category/BrowseHousehold.php">Household</a></td>
		<td><a href="category/BowseLessons.php">Lessons</a></td>
		<td><a href="category/BrowseVolunteering.php">Volunteering</a></td>
		<td><a href="category/BrowseSweden.php">Sweden</a></td>
		<td><a href="category/BrowseSweden.php">Stockholm</a></td>
	</tr>
</table>

<div class="menu" >

	<ul class="left" style="list-style-type: none">
		<li style="margin-bottom: 20px;"><a href="#"> Terms and Conditions</a></li>
		<li style="margin-bottom: 20px;"> <a href="#"> About US</a></li>
	</ul>

</div>

</body>
</html>