<?php

declare(strict_types=1);

namespace Curl;

/**
 * Class array Util.
 *
 * @package Curl
 */
class ArrayUtil {

    /**
     * Is associative array.
     *
     * @access public
     *
     * @param  $array
     *
     * @return boolean
     */
    public static function isArrayAssoc($array) {
        return (
            $array instanceof CaseInsensitiveArray ||
            count(array_filter(array_keys($array), 'is_string'))
        );
    }

    /**
     * Is Array Assoc
     *
     * @param  $array
     *
     * @return boolean
     * @deprecated Use ArrayUtil::isArrayAssoc().
     * @access     public
     */
    public static function is_array_assoc($array) {
        return static::isArrayAssoc($array);
    }

    /**
     * Is Array Multidim
     *
     * @access public
     *
     * @param  $array
     *
     * @return boolean
     */
    public static function isArrayMultidim($array) {
        if (!is_array($array)) {
            return false;
        }

        return (bool) count(array_filter($array, 'is_array'));
    }

    /**
     * Is Array Multidim
     *
     * @param  $array
     *
     * @return boolean
     * @deprecated Use ArrayUtil::isArrayMultidim().
     * @access     public
     */
    public static function is_array_multidim($array) {
        return static::isArrayMultidim($array);
    }

    /**
     * Array Flatten Multidim
     *
     * @access public
     *
     * @param  $array
     * @param  $prefix
     *
     * @return array
     */
    public static function arrayFlattenMultidim($array, $prefix = false) {
        $return = [];
        $multidimArray = [];
        if (is_array($array) || is_object($array)) {
            if (empty($array)) {
                $return[$prefix] = '';
            } else {
                foreach ($array as $key => $value) {
                    if (is_scalar($value)) {
                        if ($prefix) {
                            $return[$prefix . '[' . $key . ']'] = $value;
                        } else {
                            $return[$key] = $value;
                        }
                    } else if ($value instanceof \CURLFile) {
                        $return[$key] = $value;
                    } else if ($value instanceof \CURLStringFile) {
                        $return[$key] = $value;
                    } else {

                        $multidimArray[] = self::arrayFlattenMultidim(
                            $value,
                            $prefix ? $prefix . '[' . $key . ']' : $key
                        );
                    }
                }

                $return = array_merge($return, ...$multidimArray);
            }
        } else if ($array === null) {
            $return[$prefix] = $array;
        }

        return $return;
    }

    /**
     * Array Flatten Multidim
     *
     * @param  $array
     * @param  $prefix
     *
     * @return array
     * @deprecated Use ArrayUtil::arrayFlattenMultidim().
     * @access     public
     */
    public static function array_flatten_multidim($array, $prefix = false) {
        return static::arrayFlattenMultidim($array, $prefix);
    }

    /**
     * Array Random
     *
     * @access public
     *
     * @param  $array
     *
     * @return mixed
     */
    public static function arrayRandom($array) {
        return $array[static::arrayRandomIndex($array)];
    }

    /**
     * Array Random Index
     *
     * @access public
     *
     * @param  $array
     *
     * @return integer
     */
    public static function arrayRandomIndex($array) {
        return mt_rand(0, count($array) - 1);
    }

    /**
     * Array Random
     *
     * @param  $array
     *
     * @return mixed
     * @deprecated Use ArrayUtil::arrayRandom().
     * @access     public
     */
    public static function array_random($array) {
        return static::arrayRandom($array);
    }

}
