
<?php
/**
 * # phpunit TriangleTest
 */
class TriangleTest extends PHPUnit_Framework_TestCase
{
    private $_triangle = null;

    /**
     * @dataProvider provider
     */
    public function testDisplay($result, $height, $char)
    {
        TrianglePoint::setChar($char);
        $triangle = new Triangle($height);
        $this->assertEquals($result, (string) $triangle);
    }

    public function provider()
    {
        return array(
            array("*****\n ****\n  ***\n   **\n    *\n", 5, '*'),
            array("$$$$\n $$$\n  $$\n   $\n", 4, '$'),
        );
    }
}

*
**
***
****
*****
******

class Triangle
{
    private $_rows = array();

    public function __construct($height)
    {
        for ($h = $height; $h > 0; $h --) {
            $this->_addRow(new TriangleRow($h));
        }
    }

    private function _addRow(TriangleRow $row)
    {
        $this->_rows[] = $row;
    }

    public function __toString()
    {
        $rowCount = 0;
        $output = '';
        foreach ($this->_rows as $row) {
            $output .= str_repeat(' ', $rowCount);
            $output .= $row;
            $rowCount ++;
        }
        return $output;
    }
}

class TriangleRow
{
    private $_points = array();

    public function  __construct($width)
    {
        for ($w = $width; $w > 0; $w --) {
             $this->_addPoint(new TrianglePoint());
        };
    }

    private function _addPoint(TrianglePoint $point)
    {
        $this->_points[] = $point;
    }

    public function __toString()
    {
        $output = '';
        foreach ($this->_points as $point) {
            $output .= $point;
        }
        $output .= "\n";
        return $output;
    }
}

class TrianglePoint
{
    private static $_char = '*';

    public static function setChar($char)
    {
        self::$_char = $char;
    }

    public function __toString()
    {
        return self::$_char;
    }
}