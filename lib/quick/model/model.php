<?php
namespace Quick\Model;
use Quick\Core\Binarychop;
use Quick\Core\Config;
// error 2

class Model
{
    private static $_conns = array();
    
    protected static function connect($name = 'default', $sharedId = NULL) {
        $config = Config::get('database');
        $shared = isset($config['shared']) ? $config['shared'] : array();
        $nodes = isset($config['nodes']) ? $config['nodes'] : array();
        unset($config);

        if(isset($shared[$name]) && !is_null($sharedId) ) {
            $rules = $shared[$name];

            if (is_numeric($sharedId)) {
                $sharedId = intval($sharedId);
            } else {
                $sharedId = crc32($sharedId);
            }

            $indexs = array_keys($rules);
            sort($indexs, SORT_NUMERIC);
            $modula = max($indexs) + 1;
            $i = $key % $modula;
            $idx = Binarychop::find($indexs, $i);

            if (FALSE === $idx) {
                throw new \Exception(sprintf("The index %d not found in shared database configuration %s rules", $i, $name), 2);
            }

            $name = $rules[$idx];
        }

        if (isset(self::$_conns[$name])) {
            return self::$_conns[$name];
        }

        if (isset($nodes[$name])) {
            self::$_conns[$name] = new Medoo($nodes[$name]);
        } else {
            throw new \Exception(sprintf('Database of %s not found in configurate', $name), 2);
        }

        return self::$_conns[$name];
    }
}