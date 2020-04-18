<?php
    include 'config.php';

    $Book_id = $_POST['Bookid'];
    $USN = $_POST['USNI'];
    //check Book Availability
    $sql = "Select * from Books where Book_id='$Book_id'";  
    if(!$result = mysqli_query($conn, $sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
    $row = mysqli_fetch_assoc($result); 
    $Avail = $row['Availability'];
    
    if($Avail==false)
    {
        echo "<script>
              alert('Book not available');
              window.location.href='Home.php';
              </script>";
    
    }
    else{
    $issue_date= date("Y-m-d");
    
    $date=date_create(date("Y-m-d"));
    date_add($date,date_interval_create_from_date_string("10 days"));
    $due_date = date_format($date,"Y-m-d");

    $sql = "Select * from Student where USN='$USN'";  
    if(!$result = mysqli_query($conn, $sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
    $count = mysqli_num_rows($result); 
    
    if($count==0)
    {
        //Issue book
        $sql = "insert into Student values('$USN','$issue_date','$due_date','$Book_id','0')";
        if(!$conn->query($sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
        //Update Books
        $sql = "update Books set Availability=False where Book_id='$Book_id'";
        $conn->query($sql);
        //Update Issue_details    
        $sql = "insert into Issue_details values('$Book_id','$USN','$issue_date',NULL)";
        if(!$conn->query($sql)) 
               echo "Error: " . $sql . "<br>" . $conn->error;

        echo "<script>
            alert('Issued');
            window.location.href='Home.php';
            </script>";
        
            
    }
    else
    {
        if($count<3)
        {
            $sql = "insert into Student values('$USN','$issue_date','$due_date','$Book_id','0')";
            if(!$conn->query($sql)) 
               echo "Error: " . $sql . "<br>" . $conn->error;
            //Update Books   
            $sql = "update Books set Availability=False where Book_id='$Book_id'";
            if(!$conn->query($sql)) 
               echo "Error: " . $sql . "<br>" . $conn->error;
            
            //Update Issue_details    
            $sql = "insert into Issue_details values('$Book_id','$USN','$issue_date',NULL)";
            if(!$conn->query($sql)) 
               echo "Error: " . $sql . "<br>" . $conn->error;   
            
            echo "<script>
                  alert('Issued');
                  window.location.href='Home.php';
                  </script>";    
                    
        }
        else
        {
            echo "<script>
                alert('Max Books Taken');
                window.location.href='Home.php';
                </script>";
        }
    }}
mysqli_close($conn);

?>
