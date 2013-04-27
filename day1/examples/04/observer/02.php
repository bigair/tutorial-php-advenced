<?php
namespace Observer02;

interface Observer
{
    public function update(Subject $subject);
}

interface Subject
{
    public function register($name, Observer $observer);

    public function unregister($name);

    public function notify();
}

class Member implements Subject
{
    protected $_observerList = array();
    protected $_data = array();

    public function register($name, Observer $observer)
    {
        $this->_observerList[$name] = $observer;
    }

    public function unregister($name)
    {
        unset($this->_observerList[$name]);
    }

    public function getData()
    {
        return $this->_data;
    }

    public function save()
    {
        $this->_saveData();
        $this->notify();
    }

    protected function _saveData()
    {
        echo "會員資料寫入資料庫\n";
    }

    public function notify()
    {
        foreach ($this->_observerList as $observer) {
            $observer->update($this);
        }
    }

}

class Coupon implements Observer
{
    public function update(Subject $subject)
    {
        echo "贈送會員折價券\n";
    }
}

class Mail implements Observer
{
    public function update(Subject $subject)
    {
        echo "寄發會員通知信\n";
    }
}

$member = new Member();
$member->register('coupon', new Coupon());
$member->register('mail', new Mail());
$member->save();
