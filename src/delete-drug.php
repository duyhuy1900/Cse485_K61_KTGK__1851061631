<?php 

    include('../config/connect.php'); 

   
    $id = $_GET['id'];


    $sql = "DELETE FROM drugs WHERE id=$id";


    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        
        $_SESSION['delete'] = "<div class='success'>Drug Deleted Successfully.</div>";
    
        header('location:'.SITEURL.'src/manage-drug.php');
    }
    else
    {
     

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Drug. Try Again Later.</div>";
        header('location:'.SITEURL.'src/manage-Drug.php');
    }

  

?>