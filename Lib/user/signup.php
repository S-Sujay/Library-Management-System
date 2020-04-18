<?php  
    include 'config.php';
    
    $username = $_POST['use'];
    $USN = $_POST['USN'];
    $DOB = $_POST['DOB'];
    $Dept = $_POST['Dept'];  
    $password = $_POST['pas'];  
      
    
    $sql = "insert into users values('$username','$USN','$DOB','$Dept',MD5('$password'),true )";  
    if(!mysqli_query($conn,$sql) )
		echo mysqli_error($conn)."<br>";  
          
        echo "<script>
        alert('Signed in');
        window.location.href='Login.html';
        </script>";       
?> 
