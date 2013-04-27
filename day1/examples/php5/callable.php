<?php
function compare ($a, $b) {
    if ($a === $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$numbers = [24, 56, 52, 34, 6, 20, 89, 78, 36, 2];
usort($numbers, 'compare');
print_r($numbers);
