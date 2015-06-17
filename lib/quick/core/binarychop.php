<?php
namespace Quick\Core;


class Binarychop
{
    public static function find($elements, $key) {
        if (in_array($key, $elements)) {
            return $key;
        } else {
            $total = count($elements);

            if (2 < $total) {
                $i = ($total + 1) / 2 - 1;
                $min = $elements[$i];
                $max = $elements[$i + 1];

                if ($key < $min) {
                    return self::find(array_slice($elements, 0, $i), $key);
                } else if ($key > $max) {
                    return self::find(array_slice($elements, $i + 1), $key);
                } else {
                    return $min;
                }
            } else if (2 == $total) {
                list($min, $max) = $elements;

                if ( $key > $min && $key < $max) {
                    return $min;
                } else return FALSE;
            } else if (1 == $total) {
                $min = array_pop($elements);
                if ( $min < $key) {
                    return $min;
                } else 
                    return FASLE;
            } else 
                return FALSE;
        }
    }
}
