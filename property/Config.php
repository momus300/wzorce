<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/19/16
 * Time: 5:39 AM
 */

namespace Property;

class Config
{
    private static $conf = array();

    public static function set($name, $value)
    {
        self::$conf[$name] = $value;
    }

    public static function get($name)
    {
        return self::$conf[$name];
    }

    public static function exist($name)
    {
        return isset(self::$conf[$name]);
    }
}

//testy
Config::set("language", "pl");
Config::set("path", "/jakas_sciezka/");
echo Config::get("language"); // wyswietli "pl"
echo Config::get("path"); // wyswietli "/jakas_sciezka/"
echo Config::exist("language"); // wyswietli "true"