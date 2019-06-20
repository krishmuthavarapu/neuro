<?php
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'uploads/'; // upload directory
if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
{
	$img = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
		
	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	
	// can upload same image using rand function
	$final_image = rand(1000,1000000).$img;
	
	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	
			
		if(move_uploaded_file($tmp,$path)) 
		{
			echo "<img src='$path' />";
	$name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    
    //include database configuration file
    include_once 'db/config.php';
    
    //insert form data in the database
    $insert = $conn->query("INSERT job_apply (name,email,number,file_name) VALUES ('".$name."','".$email."','".$number."','".$path."')");
    
    //echo $insert?'ok':'err';
		}
	} 
	else 
	{
		echo 'invalid';
	}
}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$file = $_POST['file'];

$email = $_POST['email'];

// require $_SERVER["DOCUMENT_ROOT"] . '/PHPMailer/PHPMailerAutoload.php';
require 'vendor/autoload.php';

   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->Host = "tls://smtp.gmail.com";

   $mail->Port = 587;  

   $mail->SMTPAuth = true;
   $mail->Username = 'mskc999@gmail.com';
   $mail->Password = '9908547266msk';
   $mail->SMTPSecure = 'tls';
   $mail->smtpConnect(
	   array(
		   "ssl" => array(
			   "verify_peer" => false,
			   "verify_peer_name" => false,
			   "allow_self_signed" => true
		   )
	   )
   );

   $mail->setFrom('mskc999@gmail.com', 'First Last');
//Send the message to yourself, or whoever should receive contact for submissions
	$mail->addAddress('mskc999@gmail.com', 'John Doe');

   $mail->Subject = utf8_decode("Job Application");

   $name=$_POST['name'];
   $number=$_POST['number'];
   $email=$_POST['email'];
   


   $mail->AddAttachment( $_FILES['image']['tmp_name'], $_FILES['image']['name'] );
   $mail->Body="name: {$name}, Email: {$email}, Mobile No:{$number}  ";
//    $mail->Body = ($file)
//    ;

   //$mail->AltBody = utf8_decode($file);

   if (!$mail->Send()) {
	   echo "error. <p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
   }

   echo "mail sent";

?>