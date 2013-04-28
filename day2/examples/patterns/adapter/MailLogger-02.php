<?php

namespace Adapter;

class MailLogger
{
    protected $_mailer = null;

    public function __construct()
    {
        // 改用轉接器
        $this->_mailer = new MailerAdapter();
    }

    public function log($type, $message)
    {
        $this->_mailer->addMail('jaceju@gmail.com');
        $this->_mailer->setFrom('me@example.com');
        $this->_mailer->send($type, $message);
    }
}