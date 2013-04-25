<?php

class Application
{
    protected $_config = [];

    public function run($configFilePath)
    {
        $configFileType = $this->_getConfigType($configFilePath);

        switch ($configFileType) {
            case 'xml':
                $this->_config = $this->_parseXmlToArray(file_get_contents($configFilePath));
                break;
            case 'ini':
                $this->_config = parse_ini_file($configFilePath);
                break;
            case 'php':
                $this->_config = include($configFilePath);
                break;
            default:
                break;
        }
    }

    protected function _getConfigType($configFilePath)
    {
        return 'xml';
    }

    protected function _parseXmlToArray($xml)
    {
        return [];
    }
}