<?php
class Subject
{
    protected $observers = array();

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function doSomething()
    {
        $this->notify('something');
    }

    protected function notify($arg)
    {
        foreach ($this->observers as $observer) {
            $observer->update($arg);
        }
    }
}