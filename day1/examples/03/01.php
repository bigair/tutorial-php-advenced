<?php

$configFilePath = 'config.json';
$configFileType = 'json';
$config = [];

switch ($configFileType) {
    case 'json':
        return json_decode(file_get_contents($configFilePath));
    case 'ini':
        return parse_ini_file($configFilePath);
        break;
    case 'php':
        return include($configFilePath);
        break;
    default:
        break;
}