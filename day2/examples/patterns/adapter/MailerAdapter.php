<?php

namespace Adapter;

// require_once 'PHPMailer/class.phpmailer.php';

class MailerAdapter extends Mailer
{
    private $_mailer = null;

    public function __construct()
    {
        $this->_mailer = new PHPMailer();
        $this->_mailer->IsSMTP();
        $this->_mailer->Host = 'msa.hinet.net';
        $this->_mailer->Username = 'username';
        $this->_mailer->Password = 'password';
    }

    public function addMail($mail)
    {
        $this->_mailer->AddAddress($mail);
    }

    public function setFrom($from)
    {
        $this->_mailer->SetFrom($from);
    }

    public function send($subject, $body)
    {
        $this->_mailer->Subject = $subject;
        $this->_mailer->MsgHTML($body);
        $this->_mailer->Send();
    }
}


