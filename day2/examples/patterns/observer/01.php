<?php
namespace Observer01;

class Member
{
    public function save()
    {
        $this->_saveData();
        $this->_giveCoupon();
        $this->_sendMail();
    }

    protected function _saveData()
    {
        echo "會員資料寫入資料庫\n";
    }

    protected function _giveCoupon()
    {
        echo "贈送會員折價券\n";
    }

    protected function _sendMail()
    {
        echo "寄發會員通知信\n";
    }
}

$member = new Member();
$member->save();