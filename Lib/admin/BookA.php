<?php
    include 'config.php';
   
    $Book_id = $_POST['Bookid'];
    $USN = $_POST['USNA'];

    
    $sql = "select * from Student where USN='$USN' and Book_id='$Book_id'";  
    if(!$result = mysqli_query($conn, $sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
    $row = mysqli_fetch_assoc($result); 
    $due_date = $row['Due_date'];
    $curr_date = date("Y-m-d");
    if($curr_date<$due_date)
    {
        //delete
        $sql = "delete from Student where USN='$USN' and Book_id='$Book_id'";  
        if(!$result = mysqli_query($conn, $sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
        //update issue_details
        $sql = "update Issue_details set Return_date='$curr_date' where USN='$USN' and Book_id='$Book_id'";
        if(!$conn->query($sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
        //Update Books
        $sql = "update Books set Availability=True where Book_id='$Book_id'";
        $conn->query($sql);    
        
        echo "<script>
            alert('Book Accepted');
            window.location.href='Home.php';
            </script>";    
        
    }
    else
    {
        $datetime1 = date_create($curr_date); 
        $datetime2 = date_create($due_date); 
        // Calculates the difference between DateTime objects 
        $interval = date_diff($datetime1, $datetime2); 
        $penalty = $interval->format('%a');    
        echo "Penalty :".$penalty;
        
        //delete
        $sql = "delete from Student where USN='$USN' and Book_id='$Book_id'";  
        if(!$result = mysqli_query($conn, $sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
        //update issue_details
        $sql = "update Issue_details set Return_date='$curr_date' where USN='$USN' and Book_id='$Book_id'";
        if(!$conn->query($sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
        //Update Books
        $sql = "update Books set Availability='1' where Book_id='$Book_id'";
        $conn->query($sql);
        
        echo "<script>
            alert('Accept Rs $penalty as Penalty');
            window.location.href='Home.php';
            </script>";
    
    }
mysqli_close($conn);

?>
