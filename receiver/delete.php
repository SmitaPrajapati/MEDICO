<?php
include 'db.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `orders` where o_id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Deleted successfully";
        header('location:display.php');
    }else{
         die(mysqli_error($con));
    }
}

?>