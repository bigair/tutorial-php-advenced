<?php

namespace CoR3;

$cart = new Cart();
$cart->add('A0001', 1);
$cart->add('A0002', 2);
$cart->add('B0001', 1);
$cart->add('B0002', 2);
$cart->add('C0001', 1);
$cart->add('C0002', 2);
$cart->calculate();
$cart->listAll();
echo $cart->getTotal(), "\n";

class Cart
{
    protected static $_priceTable = [
        'A0001' => 100,
        'A0002' => 150,
        'B0001' => 300,
        'B0002' => 200,
        'C0001' => 200,
        'C0002' => 200,
    ];
    protected $_total = 0;
    protected $_items = [];

    public function add($sn, $quantity)
    {
        $price = static::$_priceTable[$sn];
        switch (substr($sn, 0, 1)) {
            case 'A':
                $price = (int) $price * 0.8;
                break;
            case 'B':
                $price = (int) $price - 10;
                break;
            case 'C':
                $price = (int) $price * 0.1;
                break;
            default:
                break;
        }
        $this->_items[$sn] = [$price, $quantity];
    }

    public function listAll()
    {
        foreach ($this->_items as $sn => $info) {
            list($price, $quantity) = $info;
            echo $sn . ' (' . $price . ') x ' . $quantity, "\n";
        }
    }

    public function calculate()
    {
        foreach ($this->_items as $info) {
            list($price, $quantity) = $info;
            $this->_total += $price * $quantity;
        }
    }

    public function getTotal()
    {
        return $this->_total;
    }
}
