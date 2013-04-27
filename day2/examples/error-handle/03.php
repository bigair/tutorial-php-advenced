<?php

$error = false;
function errorHandler($errno, $errstr, $errfile, $errline)
{
    global $error;
    $error = true;
    echo "[$error] $errstr - $errfile (line $errline)\n";

    return true;
}

set_error_handler("errorHandler");
strpos();
if (!$error) {
    echo "Do normal process here.\n";
}
echo "end.\n";