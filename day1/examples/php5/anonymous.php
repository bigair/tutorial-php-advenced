<?php

$numbers = [24, 56, 52, 34, 6, 20, 89, 78, 36, 2];
usort($numbers, function ($a, $b) {
    if ($a === $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
});
print_r($numbers);


$func = function ($msg) {
    echo "$msg\n";
};

var_dump(is_callable($func));

$func('test');