<?php
function errorHandler($errno, $errstr, $errfile, $errline )
{
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
set_error_handler("errorHandler");

try {
    // 這裡處理我們真正要執行的動作
    trigger_error('TEST', E_USER_ERROR); // 改用 trigger_error 來丟出測試用錯誤
} catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

echo "end." . PHP_EOL;