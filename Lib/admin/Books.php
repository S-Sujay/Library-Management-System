<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{	exit("Authentication failed");
	}	
?>	
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">		
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<title> Books </title>	

	
</head>
	
<body>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
	<h3 class="navbar-brand font-weight-bold">Library <i class="fas fa-book"></i></h3>
	<input class="form-control" style="width:30%; margin-left:3%;" id="myInput" type="text" placeholder="Search..">
	<button class="navbar-toggler" data-toggle="collapse" data-target="#navmenu">
		<span class="navbar-toggler-icon"></span>
	</button>	
	<div class="collapse navbar-collapse" id="navmenu">
	<ul class="navbar-nav ml-auto">
	<li class="nav-item"> <a class="nav-link" href="Home.php"> <b> Home </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Requests.php"> <b> Requests </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Manage.php"> <b> Manage </b> </a> </li>
			<li class="nav-item active"> <a class="nav-link" href="Books.php"> <b> Books </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Issue_details.php"> <b>Issue Details </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="users.php"> <b>Students </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Logout.php"> <b><?php echo $_SESSION["user"];?> <i class="fas fa-sign-out-alt"></i> </b> </a> </li>
	</ul>
</div>
</nav>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
	</body>

</html>



<?php

	include 'config.php';	
	
	//Fetch from table 1 and insert into table 2
	$query = "Select * from Books";
	$result = mysqli_query($conn,$query);
	echo "<table class='table table-bordered table-hover'>
	<tr class='table-active'>
		<th> Sl No </th>
		<th> Book Id </th>
		<th> Title </th>
		<th> Author </th>
		<th> Availability </th>
	</tr><tbody id='myTable'>";
$index=0;
while( $row = mysqli_fetch_assoc($result) )
{
 $index+=1;
 echo	"<tr>";
 echo "<td> {$index}</td>";
 echo "<td> {$row['Book_id']} </td>";
 echo "<td> {$row['Title']} </td>";
 echo "<td> {$row['Author']} </td>";
 if($row['Availability']==1)
	 echo "<td> Yes </td>";
 else
	 echo "<td> No </td>";
 echo "</tr>";
}
echo"</tbody></table>";
mysqli_close($conn);
	
?>
