<?php

class Application
{
    protected $_config = [];

    public function run($configFilePath)
    {
        $configFileType = $this->_getConfigType($configFilePath);

        switch ($configFileType) {
            case 'json':
                $this->_config = json_decode(file_get_contents($configFilePath));
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
        return pathinfo($configFilePath)['extension'];
    }
}