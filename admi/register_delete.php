<?php 
include('security.php');
include('db/config.php');



 if(isset($_POST['deletebtn'])){
  $id = $_POST['delete_id'];
  $query = "DELETE FROM register WHERE id ='$id'";
  $query_run = mysqli_query($connection, $query);   
  if($query_run){
    $_SESSION['success']="Your data is deleted";
    header('Location: register.php');
   }else{
     $_SESSION['status']="Your data NOT deleted";
     header('Location: register.php');    
    }
   }
?>