<?php
function orderByAsc($l, $r)
{
    return ($l == $r) ? 0 : (($l < $r) ? -1 : 1);
}

function orderByDesc($l, $r)
{
    return ($l == $r) ? 0 : (($l > $r) ? -1 : 1);
}

$sample = array(3, 7, 5, 1, 4, 6, 2);

usort($sample, 'orderByDesc');

print_r($sample);