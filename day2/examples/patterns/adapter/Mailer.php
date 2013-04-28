<?php

namespace Adapter;

class Mailer
{
    private $_mailList = array();
    private $_from = '';

    public function addMail($mail)
    {
        $this->_mailList[] = $mail;
    }

    public function setFrom($from)
    {
        $this->_from = $from;
    }

    public function send($subject, $body)
    {
        $headers = "From: {$this->_from}\r\n";
        foreach ($this->_mailList as $mail) {
            // Mailer 是用舊的 mail 函式在送信
            mail($mail, $subject, $body, $headers);
        }
    }
}
