<?php

class AddTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     */
    public function testAdd($num1, $num2, $expection)
    {
        $add = new Add();
        $add->setNum1($num1);
        $add->setNum2($num2);
        $this->assertEquals($expection, $add->getResult());
    }

    public function provider()
    {
        return array(
            array(0, 0, 0),
            array(0, 1, 1),
            array(1, 0, 1),
            array(1, 1, 2),
        ); // 可以用迴圈或讀檔的方式去產生大量的測試資料 }
    }
}
