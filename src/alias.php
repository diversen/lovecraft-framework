<?php

namespace diversen;

class alias {
    public static function set() {
        class_alias('diversen\conf', 'conf');
    }
}