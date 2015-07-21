<?php

namespace diversen;

class alias {
    public static function set() {
        class_alias('diversen\conf', 'conf');
        class_alias('diversen\mailsmtp', 'mailsmtp');
        class_alias('diversen\log', 'log');
        class_alias('diversen\db\rb', 'rb');
    }
}