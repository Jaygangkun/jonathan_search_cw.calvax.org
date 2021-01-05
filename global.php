<?php

require "vendor/autoload.php";
use PHPHtmlParser\Dom;

function checkPage($page_url){
    set_time_limit(0);
    $dom = new Dom;

    $dom->loadFromUrl($page_url);

    $multistep_form_progressbar = $dom->find('.multistep-form-progressbar')[0];
    if($multistep_form_progressbar){
        $step_lis = $multistep_form_progressbar->find('li');
        if(count($step_lis) == 7){
            $review_step_li = $step_lis[5];
            if(trim($review_step_li->text) == 'Review'){
                return true;
            }
        }
    }

    return false;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

function sendEmail($page_url){
    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    $mail->Mailer = 'smtp';

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'qiangchenggong1129@gmail.com';
    $mail->Password = 'zse43waq21';
    $mail->SMTPSecure = 'tls';

    // $mail->AddAddress('starco.sas1221@yahoo.com');
    // $mail->AddAddress('jaygangkun@hotmail.com', '');
    $mail->AddAddress('jg@gerberco.com', '');
    $mail->AddAddress('jonathanlgerber@gmail.com', '');
    $mail->AddAddress('nbgerber@gmail.com', '');
    $mail->AddAddress('sg@gerberco.com', '');
    $mail->AddAddress('gg@gerberco.com', '');
    
    $mail->SetFrom('qiangchenggong1129@gmail.com', 'jay');
    // $mail->AddAddress('qiangchenggong@hotmail.com');

    $mail->IsHTML(true);

    $mail->Subject = "Success Page";
    $mail->Body    = "<a href='".$page_url."'>".$page_url."</a>";

    if(!$mail->Send()) {
        echo $mail->ErrorInfo;
        exit;
    }
}

$base_url = "https://cw.calvax.org/client/registration?clinic_id=";


$config_file_name = 'config.txt';

function readConfig($config_file_name){
    $clinic_id = 0;
    if(!file_exists($config_file_name)){
        touch($config_file_name, strtotime('-1 days'));
        $config_file = fopen($config_file_name, 'w');
        fwrite($config_file, $clinic_id);
        fclose($config_file);
    }

    $config_file = fopen($config_file_name, 'r');
    $clinic_id = fread($config_file, filesize($config_file_name));
    fclose($config_file);

    return $clinic_id;
}

function writeConfig($config_file_name, $clinic_id){    
    if(!file_exists($config_file_name)){
        touch($config_file_name, strtotime('-1 days'));
    }

    $config_file = fopen($config_file_name, 'w');
    fwrite($config_file, $clinic_id);
    fclose($config_file);
}

$success_file_name = 'success.txt';

function writeSuccess($success_file_name, $page_url){
    if(!file_exists($success_file_name)){
        touch($success_file_name, strtotime('-1 days'));
    }

    $success_file = fopen($success_file_name, 'a+');
    fwrite($success_file, $page_url.PHP_EOL);
    fclose($success_file);
}

function readSuccess($success_file_name){
    $clinic_id = 0;
    if(file_exists($success_file_name)){
        $success_file = fopen($success_file_name, 'r');
        $success_results = fread($success_file, filesize($success_file_name));
        fclose($success_file);
    
        return $success_results;   
    }
}
?>