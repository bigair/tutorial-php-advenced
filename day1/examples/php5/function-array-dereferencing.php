<?php
function getArray() {
    return array(1, 2, 3);
}

// on PHP 5.4
$a = getArray()[1];

// previously
$tmp = getArray();
$a = $tmp[1];

// or
list(, $a) = getArray();
