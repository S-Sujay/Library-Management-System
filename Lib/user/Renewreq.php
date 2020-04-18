<?php  
    include 'config.php';
      
    $Book_id = $_POST['Bookid'];
    $USN = $_POST['USN'];
    //Fetch details
    $sql = "select * from Student where Book_id='$Book_id' and USN='$USN'";  
    if(!$result = mysqli_query($conn, $sql)) 
        echo "Error: " . $sql . "<br>" . $conn->error;
    $row = mysqli_fetch_assoc($result);
    
    if($row['Times_renewed']<2)
    {
        //Request
        $sql = "insert into Renew_requests values('$Book_id','$USN')";  
        if(!$result = mysqli_query($conn, $sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
    
        echo "<script>
                alert('Renew Request sent for Book id: $Book_id');
                window.location.href='Home.php';
                </script>";
    }
    else
    {
        echo "<script>
                alert('You have renewed Maximum number of times!!!     Maximum number of renewals: 2');
                window.location.href='Home.php';
                </script>";
        
    }
mysqli_close($conn);

?>