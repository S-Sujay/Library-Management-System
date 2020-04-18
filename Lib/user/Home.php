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
<title> Home </title>	
</head>
	
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
	<h3 class="navbar-brand font-weight-bold">Library <i class="fas fa-book"></i> </h3>
	
	
	<button class="navbar-toggler" data-toggle="collapse" data-target="#navmenu">
		<span class="navbar-toggler-icon"></span>
	</button>	
	<div class="collapse navbar-collapse" id="navmenu">
	<ul class="navbar-nav ml-auto">
			<li class="nav-item active"> <a class="nav-link" href="Home.php"> <b> Home </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Books.php"> <b> Books </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="History.php"> <b>History </b> </a> </li>
			<li class="nav-item"> <a class="nav-link" href="Logout.php"> <b> <?php echo $_SESSION["user"];?> <i class="fas fa-sign-out-alt"></i> </b> </a> </li>
			
	</ul>
</div>
</nav>	
<?php

    include 'config.php';	

	$user=$_SESSION["user"];	
	$query = "Select * from Student where USN='$user'";
	$result = mysqli_query($conn,$query);

	echo "<h3 class='text-center font-weight-bold' style='background-color:#dadada; margin-bottom:0%;'> The Books You currently have </h3>";

	echo "<table class='table table-bordered text-center' style= margin-top:0%;>
		<tr class='table-active'>
			<th> Book Id </th>
			<th> Issue Date </th>
			<th> Due Date </th>
			<th> Penalty </th>
			<th> Renewed </th>
			<th> Action </th>
		</tr> ";
	
	while( $row = mysqli_fetch_assoc($result) )
	{
		$due_date = $row['Due_date'];
   		$curr_date = date("Y-m-d");
		$penalty=0;
		if($curr_date<$due_date)
			$penalty=0;
		else
		{
			$datetime1 = date_create($curr_date); 
        	$datetime2 = date_create($due_date); 
        	// Calculates the difference between DateTime objects 
        	$interval = date_diff($datetime1, $datetime2); 
        	$penalty = $interval->format('%a');
		}


	 echo "<tr>"; 
	 echo "<form action='Renewreq.php' method='POST'>";	
	 echo "<td> {$row['Book_id']} </td>";
	 echo "<td> {$row['Issue_date']} </td>";
	 echo "<td> {$row['Due_date']} </td>";
	 echo "<td> {$penalty} </td>";
	 echo "<td> {$row['Times_renewed']} </td>";
	 echo "  <input type='hidden' name='Bookid' value={$row['Book_id']}>";
	 echo "  <input type='hidden' name='USN' value={$row['USN']}>";
	 if($penalty!=0 || $row['Times_renewed']==2)
	 	echo "<td>  <input class='btn btn-secondary btn-sm displayed' disabled type='submit' value='Renew'> </td>";	 
	 else
	 	echo "<td>  <input class='btn btn-success btn-sm' type='submit' value='Renew'> </td>";
	 echo "</form>";
	 echo "</tr>";	
	}
	echo"</table>";
mysqli_close($conn);
	
?>

</body>

</html>
