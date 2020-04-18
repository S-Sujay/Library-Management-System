<?php
   include 'config.php';  
    
    $Book_id = $_POST['Bookid'];
    $USN = $_POST['USN'];
    //Fetch from Student
    $sql = "select * from Student where Book_id='$Book_id' and USN='$USN'";  
    if(!$result = mysqli_query($conn, $sql)) 
        echo "Error: " . $sql . "<br>" . $conn->error;
    $row = mysqli_fetch_assoc($result);
   //calculate extension date
    $date=date_create($row['Due_date']);
    date_add($date,date_interval_create_from_date_string("6 days"));
    $due_date = date_format($date,"Y-m-d");
    //Times Renewed
    $renewed = $row['Times_renewed'];
    $renewed +=1;
    //Extend date
    $sql = "update Student set Due_date='$due_date',Times_renewed='$renewed' where Book_id='$Book_id' and USN='$USN'";  
    if(!$result = mysqli_query($conn, $sql)) 
        echo "Error: " . $sql . "<br>" . $conn->error;
    //Delete Request
    $sql = "delete from Renew_requests where Req_Book_id='$Book_id' and Req_USN='$USN'";  
    if(!$result = mysqli_query($conn, $sql)) 
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    
    echo "<script>
            alert('Due date Extended');
            window.location.href='Requests.php';
            </script>";
mysqli_close($conn);
?>
