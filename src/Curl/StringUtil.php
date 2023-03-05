<?php

declare(strict_types=1);

namespace Curl;

/**
 *  Class StringUtil.
 *
 * @author
 *
 */
class StringUtil {

    /**
     * Character reverse position.
     *
     * @param $haystack
     * @param $needle
     * @param $part
     *
     * @return false|string
     */
    public static function characterReversePosition($haystack, $needle, $part = false) {
        if (function_exists('\mb_strrchr')) {
            return \mb_strrchr($haystack, $needle, $part);
        }

        return \strrchr($haystack, $needle);
    }

    /**
     * Get the length of a string.
     *
     * @param $string
     *
     * @return false|int
     */
    public static function length($string) {
        if (function_exists('\mb_strlen')) {
            return \mb_strlen($string);
        }

        return \strlen($string);
    }

    /**
     * Position.
     *
     * @param $haystack
     * @param $needle
     * @param $offset
     *
     * @return false|int
     */
    public static function position($haystack, $needle, $offset = 0) {
        if (function_exists('\mb_strpos')) {
            return \mb_strpos($haystack, $needle, $offset);
        }

        return \strpos($haystack, $needle, $offset);
    }

    /**
     * Reverse position.
     *
     * @param $haystack
     * @param $needle
     * @param $offset
     *
     * @return false|int
     */
    public static function reversePosition($haystack, $needle, $offset = 0) {
        if (function_exists('\mb_strrpos')) {
            return \mb_strrpos($haystack, $needle, $offset);
        }

        return \strrpos($haystack, $needle, $offset);
    }

    /**
     * Return true when $haystack starts with $needle.
     *
     * @access public
     *
     * @param  $haystack
     * @param  $needle
     *
     * @return bool
     */
    public static function startsWith($haystack, $needle) {
        return self::substring($haystack, 0, self::length($needle)) === $needle;
    }

    /**
     * Substring.
     *
     * @param $string
     * @param $start
     * @param $length
     *
     * @return false|string
     */
    public static function substring($string, $start, $length) {
        if (function_exists('\mb_substr')) {
            return \mb_substr($string, $start, $length);
        }

        return \substr($string, $start, $length);
    }

}
