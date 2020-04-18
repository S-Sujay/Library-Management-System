<?php
   include 'config.php';   
    
    $Book_id = $_POST['Bookid'];
    //Add Book 
    $sql = "delete from Books where Book_id='$Book_id'";  
    if(!$result = mysqli_query($conn, $sql)) 
            echo "Error: " . $sql . "<br>" . $conn->error;
    
    echo "<script>
            alert('Book Removed');
            window.location.href='Manage.php';
            </script>";
mysqli_close($conn);
?>
