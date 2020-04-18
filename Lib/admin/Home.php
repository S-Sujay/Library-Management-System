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
<title> Admin </title>	
<style>

	</style>

</head>
		
<body>

	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
	<h3 class="navbar-brand font-weight-bold">Library <i class="fas fa-book"></i></h3>
	<button class="navbar-toggler" data-toggle="collapse" data-target="#navmenu">
		<span class="navbar-toggler-icon"></span>
	</button>	
	<div class="collapse navbar-collapse" id="navmenu">
	<ul class="navbar-nav ml-auto" >
			<li class="nav-item active"> <a class="nav-link" href="Home.php"> <b> Home </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Requests.php"> <b> Requests </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Manage.php"> <b> Manage </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Books.php"> <b> Books </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Issue_details.php"> <b>Issue Details </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="users.php"> <b>Students </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Logout.php"> <b><?php echo $_SESSION["user"];?> <i class="fas fa-sign-out-alt"></i> </b> </a> </li>
	</ul>
	</div>
	</nav>
		
		<div class="container p-3 my-3 mt-5 bg-dark text-white" style="width:40%;margin-left:8%; border-radius:10px; float:left;">
			<h4 class="font-weight-bold"> Issue a Book </h4>
		<form name="f2" action = "BookI.php" method = "POST">  
			<div class="form-group ">
			<label> Book ID: </label>  
            <input class="form-control" id=IbID type = "number" name  = "Bookid" required/>  
			</div>
			<div class="form-group ">
			<label> USN: </label>
            <input class="form-control" id=USNI type="text" name="USNI"required/>
			</div>
			<div class="form-group text-right">
			<input class="btn btn-primary" id=buttonI type =  "submit" value = "Issue" />  
			</div>	   
		</form>
		</div>

		<div class="container p-3 my-3 mt-5 bg-dark text-white" style="width:40%; margin-right:8%; border-radius:10px; float:right;">
			<h4 class="font-weight-bold"> Accept a Book </h4>
		<form name="f3" action = "BookA.php" method = "POST">  
			<div class="form-group ">
			<label> Book ID: </label>  
        	<input class="form-control" id=AID type = "number" name  = "Bookid" required/>  
			</div>
			<div class="form-group">
			<label> USN: </label>
        	<input class="form-control" id=USNA type="text" name="USNA"required/>
			</div>
			<div class="form-group text-right">
			<input class="btn btn-primary" id=buttonA type =  "submit" value = "Accept" />  
			</div> 
		</form>
		</div>		
	</body>

</html>
