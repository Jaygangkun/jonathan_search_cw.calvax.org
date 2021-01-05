<?php
// echo json_encode($_POST);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "./PHPMailer/Exception.php";
    require "./PHPMailer/PHPMailer.php";
    require "./PHPMailer/SMTP.php";

    // $name = $_POST["name"];
    // $email = $_POST["email"];
    // $phone = $_POST["phone"];

    $name = 'testname';
    $email = 'qiangchenggong@hotmail.com';
    $phone = '+29394';
    
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = 'mail.smtp2go.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'ashkar@ashkarahamed.com';
    $mail->Password = 'SgP5T8vlsM40';
    $mail->SMTPSecure = 'tls';

    $mail->From = 'info@ashkarscapital.com';
    $mail->FromName = 'Ashkars Capital';

    $mail->AddReplyTo($email, 'Reply to '.$name);

    $mail->AddAddress('info@ashkarscapital.com');
    // $mail->AddAddress('jaygangkun@hotmail.com');

    $mail->IsHTML(true);

    $mail->Subject = "Message from " . $name . " callback form";
    $mail->Body    = "<h2>Name:</h2><p> " . $name . "</p><h2>Email:</h2><p> " . $email . "</p><h2>Phone:</h2><p> " . $phone . "</p>";
    $mail->AltBody = "Name: " . $name . ". Email: " . $email . ". Phone: " . $phone . ".";
    
    if(!$mail->Send()) {
        echo $mail->ErrorInfo;
        exit;
    }
?>