<?php

include 'Sample.php';

use My\Sample as Sample1;
use My\Sample as Sample2;

echo Sample1::$staticVar, "\n";
Sample1::$staticVar = '123';
echo Sample2::$staticVar, "\n";