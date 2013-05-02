<?php

function inverse($x)
{
    if (!$x) {
        throw new Exception('Division by zero.');
    } else {
        return 1 / $x;
    }
}

try {
    echo inverse(5) . PHP_EOL;
    echo inverse(0) . PHP_EOL;
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), PHP_EOL;
}
// Continue execution
echo 'Hello World' . PHP_EOL;