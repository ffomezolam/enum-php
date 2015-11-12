<?php namespace ffomezolam\Enum;

/**
 * Extension class allowing for inspection of enum properties
 *
 * Generally taken from http://stackoverflow.com/a/254543 with very minor
 * adjustments
 */
abstract class Enum {
    private static $constCache = null;

    private static function getConstants() {
        if(is_null(self::$constCache)) {
            self::$constCache = [];
        }

        $calledClass = get_called_class();

        if(!array_key_exists($calledClass, self::$constCache)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCache[$calledClass] = $reflect->getConstants();
        }

        return self::$constCache[$calledClass];
    }

    public static function hasKey($key, $strict = false) {
        $constants = self::getConstants();

        if($strict) return array_key_exists($key, $constants);

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($key), $keys);
    }

    public static function hasValue($v) {
        $values = array_values(self::getConstants());
        return in_array($v, $values, $strict = true);
    }

    public static function has($x) {
        return self::hasValue($x);
    }
}

?>
