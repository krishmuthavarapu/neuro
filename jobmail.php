<?php

     $file = $_POST['file'];

     $email = $_POST['email'];

    require $_SERVER["DOCUMENT_ROOT"] . '/PHPMailer/PHPMailerAutoload.php';

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

        $mail->Subject = utf8_decode("Thank you for signing up");




        $mail->AddAttachment( $_FILES['image']['tmp_name'], $_FILES['image']['name'] );

        $mail->Body = ($file);

        //$mail->AltBody = utf8_decode($file);

        if (!$mail->Send()) {
            echo "error. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }

        echo "mail sent";

?>