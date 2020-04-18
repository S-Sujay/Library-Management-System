<?php
   include 'config.php';   
    
    
    $Title = $_POST['Title'];
    $Author = $_POST['Author'];
    
    if(isset($_POST['yes']))
        $Avail = $_POST['yes'];
    elseif(isset($_POST['no']))
        $Avail = $_POST['no'];    
    //Add Book 
    $sql = "insert into Books(Title,Author,Availability) values('$Title','$Author',$Avail)";  
    if(!$result = mysqli_query($conn, $sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
    
    echo "<script>
            alert('Added');
            window.location.href='Manage.php';
            </script>";
mysqli_close($conn);
?>
