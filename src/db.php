<?php

namespace diversen;
include_once 'vendor/diversen/lovecraft-framework/src/rb.php';

/**
 * simple db class holding wrappers for Redbean
 */
class db {

    /**
     * 
     * create a connection to a database
     * defaults to mysqlite memory
     * @param string $url
     * @param string $username
     * @param string $password
     */  
    public static function connect($config = null) {        
        \R::setup($config['connection'], $config['username'], $config['password']); //mysql
        if ($config['freeze'] == 1) {
            \R::freeze(true);
        }
    }
    
    /**
     * connects from configuration config.php
     */
    public static function connectFromConfig () {
        $config = conf::get('database', 'default');
        self::connect($config);
    }
}
