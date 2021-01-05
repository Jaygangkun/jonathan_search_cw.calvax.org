<?php


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer/Exception.php";
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";

    // $name = $_POST["name"];
    // $email = $_POST["email"];
    // // $companyName = $_POST["phone"];
    // $message = $_POST["message"];
    // $phone = $_POST['phone'];
    $name = 'name';
    $email = 'qiangchenggong@hotmail.com';
    $companyName = 'companyName';
    $message = 'message';
    $phone = 'phone';

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = 'mail.smtp2go.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'ashkar@ashkarahamed.com';
    $mail->Password = 'SgP5T8vlsM40';
    $mail->SMTPSecure = 'tls';

    $mail->From = 'ascoolaswater@yahoo.com';
    $mail->FromName = "silverysk";
    $mail->AddAddress('starco.sas1221@yahoo.com');
    // $mail->AddAddress('jaygangkun@hotmail.com');

    $mail->IsHTML(true);

    $mail->Subject = "I want to consult about the previos work with you";
    $mail->Body    = "I was satisfied with the result you sent me last year. But now I have new need for the project. We need to add functions of BOF and ROP to our project. If this will be done, we can start a new project of this series. As you know, this project(s) is(are) extremely important not only to me but also to our company.
    So my General Manager make me to contact you to advance the project as much as possible, as soon as possible.
    I wanna you will reply to me.";

    //$mail->AltBody = "Name: " . $name . ". Email: " . $email . ". Phone: " . $phone . ". Message: " . $message . ".";
    
    if(!$mail->Send()) {
        echo $mail->ErrorInfo;
        exit;
    }
?>