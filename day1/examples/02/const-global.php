<?php
const APP_PATH    = dirname(__DIR__);     // error
const APP_PATH    = __DIR__;              // right
const CONFIG_PATH = APP_PATH . "/config"; // error
echo APP_PATH;
