<?php
require_once 'PHPMailer/PHPMailerAutoload.php';
$maile = new PHPMailer;
class Mail{
    function __construct() {
        $this->mailer = new PHPMailer;
        $this->mailer->isSMTP();
        $this->mailer->Host = SMTP_HOST;
        $this->mailer->SMTPAuth = SMTP_AUTH;                             
        $this->mailer->Username = MUSER;               
        $this->mailer->Password = MPASS;                         
        $this->mailer->SMTPSecure = MSEC; 
    }
    function simple_send($from,$fromname,$adress,$subject,$body,$attachment='',$wordwrap=50,$cc=''){
        $this->mailer->From = $from;
        $this->mailer->FromName = $fromname;
        $this->mailer->addAddress($adress);
        $this->mailer->WordWrap = $wordwrap; 
        $this->mailer->addCC($cc); 
        $this->mailer->isHTML(true);
        $this->mailer->addAttachment($attachment);
        $this->mailer->Subject = $subject;
        $this->mailer->Body    = $body;
        if(!$this->mailer->send()) 
            return 'Message could not be sent.</br>Mailer Error: '.$this->mailer->ErrorInfo;
        else
            return 1;
        
    }
}

?>