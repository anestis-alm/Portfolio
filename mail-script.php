<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './src/Exception.php';
    require './src/PHPMailer.php';
    require './src/SMTP.php';

   
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anestis.almal@gmail.com';
        $mail->Password = 'av29102002a';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
       
		$mail->addReplyTo($_POST['email'], $_POST['name']);
		$mail->addAddress('anestis.almal@gmail.com');
        $mail->setFrom('anestis.almal@gmail.com', 'Portfolio');

        $mail->isHTML(true);  
		$mail->Subject = $_POST['subject'];		
        $mail->Body = "Message: {$_POST['message']} From: {$_POST['email']}";

        try {
            $mail->send();
            echo 'Your message was sent successfully!';
        } catch (Exception $e) {
            echo "Your message could not be sent! PHPMailer Error: {$mail->ErrorInfo}";
        }
        
   
    
?>