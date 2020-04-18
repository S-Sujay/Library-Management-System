<?php
	session_start();
	unset($_SESSION["user"]);
		
	echo "<html> <h1 style='text-align:center; background-color:#393d42;color:white; width:30%; margin:auto;border-radius:10px;padding:5px; margin-top:15px;'> Logged out.. </h1> </html>";
	header('Refresh: 1; URL=Login.html');	
?>	
