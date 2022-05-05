<?php
@include_once('./_common.php');
@include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

if (!chk_captcha()) {
    echo ('CAPTCHA');
} else {
    $myemail = trim($_POST['myemail']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    $emailTo = $myemail;
    $subject = "=?EUC-KR?B?".base64_encode(iconv("UTF-8","EUC-KR","사이트 방문자의 메시지 또는 문의 메일"))."?=";
    $body = iconv('utf-8', 'euc-kr', $body);
    $body = 'Name: '.$name."<br><br>".'E-mail: '.$email."<br><br>".'[Message]'."<br><br>".$message."<br>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n";

    mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
    echo ('SEND');
}