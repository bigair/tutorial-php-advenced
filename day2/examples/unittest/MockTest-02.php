<?php
require_once 'PHPUnit/Framework.php'; require_once 'Subject.php';
class Observer // 雖然實際的 Observer 未完成,但我們還是要給它一個類別宣告
{
public function update($arg) {}
}
class SubjectTest extends PHPUnit_Framework_TestCase
{
public function testUpdateIsCalledOnce()
{
} }
->method('update') ->with($this->equalTo('something'));
$subject = new Subject();
$subject->attach($observer);
// 我們預測這裡會呼叫 Observer::update() 一次
$subject->doSomething();
// 建立一個 Observer 的 Mock Object
$observer = $this->getMock('Observer');
// 預期 Observer::update 方法應該只跑一次
// 而傳入 update 方法的參數值為 something $observer->expects($this->once())