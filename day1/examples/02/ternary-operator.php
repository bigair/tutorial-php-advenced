<?php

var_dump(isset($_GET['test']) ? $_GET['test'] : null);

function getSomething()
{
    $a = new stdClass();
    $b = [];
    return $a ?: $b;
}

var_dump(getSomething());
