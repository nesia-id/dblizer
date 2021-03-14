<?php

namespace Util;


class Helper
{

    private static $array_example = [
        1 => 'MJ',
        'YR',
        'RT',
        'UN',
        'RP',
        'BM',
        'HR',
        'YS',
        'SP',
        'SR',
        'PM',
        'AY',
        'LL',
    ];

    public static function all($name, $object = true)
    {
        if (isset(self::${$name})) {
            $result = [];
            foreach (self::${$name} as $key => $value) {
                array_push($result, $object ? (object) [
                    'id' => $key,
                    'name' => $value
                ] :
                    [
                        'id' => $key,
                        'name' => $value
                    ]);
            }

            return $object ? (object) $result : $result;
        } else {
            return null;
        }
    }

    public static function arrayOf($name)
    {
        if (isset(self::${$name})) {
            return self::${$name};
        } else {
            return [];
        }
    }

    public static function relation($name, $value, $object = true, $default = null)
    {
        if (isset(self::${$name})) {
            $result = [
                'id' => $value,
                'name' => self::${$name}[$value]
            ];
            return $object ? (object) $result : $result;
        } else {
            return $default;
        }
    }

    public static function relationByName($name, $valueName, $object = true, $default = null)
    {
        if (!isset($name) || !isset($valueName)) {
            return $default;
        }

        if (isset(self::${$name})) {
            $value = array_search($valueName, self::${$name});
            if ($value < 1) {
                if ($valueName == 0) {
                    return $default;
                }
            }
            $result = [
                'id' => $value,
                'name' => self::${$name}[$value]
            ];
            return $object ? (object) $result : $result;
        } else {
            return $default;
        }
    }
}
