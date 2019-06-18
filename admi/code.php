<?php 
include('security.php');

$connection = mysqli_connect("localhost","root","" ,"neuronoids");
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    if($password===$cpassword){
        $query = "INSERT into register (username,email,password) VALUES ('$username', '$email', '$password')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            // echo"saved";
            $_SESSION['success'] = "Admin profile added ";
            header('Location: register.php');
        }
        else{
            $_SESSION['status'] = "Admin profile not created";
            header('Loation: register.php');
        }
    }
    else{
        $_SESSION['status'] = "Password does not match";
        header('Location: register.php');
    }
}


// update code
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE register SET username = '$username', email = '$email', password ='$password' WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run){
           $_SESSION['success']="Your data is updated";
           header('Location: register.php');
    }else{
        $_SESSION['status']="Your data NOT updated";
        header('Location: register.php');    }
}

// delete 
if(isset($_POST['deletebtn']))
{
  $id = $_POST['delete_id'];
  $query = "DELETE FROM register WHERE id ='$id'";
  $query_run = mysqli_query($connection, $query);    
  if($query_run){
    $_SESSION['success']="Your data is deleted";
    header('Location: register.php');
}else{
 $_SESSION['status']="Your data NOT deleted";
 header('Location: register.php');    }
}


// login

if(isset($_POST['login_btn']))
{
    $email_login=$_POST['email'];
    $password_login=$_POST['password'];
    $query = "SELECT * FROM register WHERE email ='$email_login' AND password = '$password_login' ";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run)){
        $_SESSION['username']= $email_login;
        header('Location: index.php');
    }else{
        $_SESSION['status'] = "Email or Password is invalid";
        header('Location: login.php');
    }
}

if(isset($_POST['delete_ud']))
{
    $id = $_POST['delete_Id'];
    $query = "DELETE FROM users WHERE Id = '$id' ";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        $_SESSION['success']="Your data is deleted";
        header('Location: userdata.php');
    }else{
     $_SESSION['status']="Your data NOT deleted";
     header('Location: userdata.php');    
     }
    }

?>

