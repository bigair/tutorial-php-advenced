<?php
namespace Observer02;

// 觀察者 (訂閱者)
interface Observer
{
    public function update(Subject $subject);
}

// 被觀察者 (主題/報紙)
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
        if ($this->_saveData()) {
            $this->notify();
        }
    }

    protected function _saveData()
    {
        echo "會員資料寫入資料庫\n";
        return true;
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

// Gearman: Message Queue
class Mail implements Observer
{
    public function update(Subject $subject)
    {
        echo "寄發會員通知信\n";
    }
}

class Api implements Observer
{


    public function update(Subject $subject)
    {
        $client = new HttpClient();
        echo "寫入 API\n";
    }
}

$member = new Member();
$member->register('coupon', new Coupon());
$member->register('mail', new Mail());
$member->register('api', new Api());
$member->save();
