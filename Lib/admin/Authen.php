<?php  
    include 'config.php';

    $username = $_POST['use'];  
    $password = $_POST['pas'];  
      
    
    $sql = "select *from Login where username = '$username' and password = MD5('$password')";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1)
    {  
        session_start();
        $_SESSION["user"]=$username;
        	
        header("Location:Home.php");
    }  
    else
    {  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
?> 
