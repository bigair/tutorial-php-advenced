<?php

namespace CoR1;

$promo = Promo::init();
$cart = new Cart();
$cart->setPromo($promo);
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
    protected $_promo = null;

    public function setPromo(Promo $promo)
    {
        $this->_promo = $promo;
    }

    public function add($sn, $quantity)
    {
        $price = static::$_priceTable[$sn];

        $price = $this->_promo->calculate($sn, $price);

        $this->_items[$sn] = [$price, $quantity];
    }

    public function calculate()
    {
        // A * 0.8, B * 0.1, C - 10
        foreach ($this->_items as $sn => $info) {

            list($price, $quantity) = $info;

            $this->_total += $price * $quantity;
        }
    }

    public function listAll()
    {
        foreach ($this->_items as $sn => $info) {
            list($price, $quantity) = $info;
            echo $sn . ' (' . $price . ') x ' . $quantity, "\n";
        }
    }

    public function getTotal()
    {
        return $this->_total;
    }
}

abstract class Promo
{
    protected $_next = null;

    abstract protected function _accept($sn);
    protected function _newPrice($price)
    {
        return $price;
    }

    public static function init($config)
    {
        $promo = new Promo_08();
        $promo->setNext(new Promo_01())
              ->setNext(new Promo_10());
        return $promo;
    }

    public function setNext(Promo $promo)
    {
        $this->_next = $promo;
        return $this->_next;
    }

    public function calculate($sn, $price)
    {
        if ($this->_accept($sn)) {
            return $this->_newPrice($price);
        } else {
            return $this->_next->calculate($sn, $price);
        }
    }
}

class Promo_08 extends Promo
{
    public function _accept($sn)
    {
        $type = substr($sn, 0, 1);
        return ($type === 'A');
    }

    public function _newPrice($price)
    {
        return $price * 0.8;
    }
}

class Promo_01 extends Promo
{
    public function _accept($sn)
    {
        $type = substr($sn, 0, 1);
        return ($type === 'B');
    }

    public function _newPrice($price)
    {
        return $price * 0.1;
    }
}


class Promo_10 extends Promo
{
    public function _accept($sn)
    {
        $type = substr($sn, 0, 1);
        return ($type === 'C');
    }

    public function _newPrice($price)
    {
        return $price - 10;
    }
}