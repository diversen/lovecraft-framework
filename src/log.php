<?php

namespace diversen;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Very simple logging
 * Only for making static log calls in shortcut form
 */

class log {
    
    /**
     * var holding the Monolog\Logger object
     * @var null|object 
     */
    public static $logger = null;
    
    /**
     * display the errors. Default to true
     * @var boolean 
     */
    public static $display = true;
    
    /**
     * the file where the errors are written to
     * @var string
     */
    public static $logFile = 'logs/dev.log';
   
    /**
     * 
     * init the logger
     * @param string $name name of the logger
     */
    public static function init ($name = 'silex') {
        
        if (!file_exists(self::$logFile)) {
            $res = @\file_put_contents(self::$logFile, 'Created file');
            if (!$res) {
                echo "Create file " .  self::$logFile . PHP_EOL;
            }
        }
        
        self::$logger = new Logger($name);
        self::$logger->pushHandler(new StreamHandler(self::$logFile, Logger::ERROR));        
        
    }
    
    /**
     * add a warning to the logger
     * @param type $warning
     */
    public static function warning ($warning) {
        self::$logger->addWarning($warning);
        if (self::$display) {
            echo $warning . PHP_EOL;
        }
        
    }
    
    /**
     * add a error to the logger
     * @param type $error
     */
    public static function error ($error) {
        self::$logger->addError($error);
        if (self::$display) {
            echo $error . PHP_EOL;
        }
    }
}
