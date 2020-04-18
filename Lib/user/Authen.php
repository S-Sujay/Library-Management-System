<?php      
    include 'config.php'; 
    
    $usn = $_POST['use'];  
    $password = $_POST['pas'];  
      
    
    $sql = "select *from users where USN = '$usn' and password = MD5('$password')";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1 && $row['status']==true)
    {  
    	session_start();
        $_SESSION["user"]=$row['USN'];
        header("Location:Home.php");
    }          
    elseif($count == 1)
    {
        echo "<html> <div style='text-align:center; 
                         background-color:#393d42;
                         border: 3px solid red;
                         color:white; width:30%; 
                         margin:auto;border-radius:10px;
                         padding:5px; margin-top:15px;'> 
                         <h1>  Your account has been Blocked!!!<br>Contact Admin. </h1> 
                        <button style='background-color:green; margin-bottom:2px; padding:10px; border: 3px solid green; border-radius:10px;'> 
                            <a style='color:white; font-size:20px; text-decoration:none;'href='Login.html'><b>Go Back</b></a>
                        </button>
                        </div>
                        </html>";
    }
    else
    {  
        echo "<html> <div style='text-align:center; 
                         background-color:#393d42;
                         border: 3px solid red;
                         color:white; width:30%; 
                         margin:auto;border-radius:10px;
                         padding:5px; margin-top:15px;'> 
                         <h1>Login failed. Invalid username or password.</h1> 
                        <button style='background-color:green; margin-bottom:2px; padding:10px; border: 3px solid green; border-radius:10px;'> 
                            <a style='color:white; font-size:20px; text-decoration:none;'href='Login.html'><b>Go Back</b></a>
                        </button>
                        </div>
                        </html>";
          
    }     
?> 
