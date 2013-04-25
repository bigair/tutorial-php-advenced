<?php

$configFilePath = '.........';
$config = [];

switch ($configFileType) {
    case 'xml':
        return parseXmlToArray(file_get_contents($configFilePath));
        break;
    case 'ini':
        return parse_ini_file($configFilePath);
        break;
    case 'php':
        return include($configFilePath);
        break;
    default:
        break;
}