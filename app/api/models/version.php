<?php
namespace Models;
use Quick\Model\Model;
use Quick\Core\Cache;

class Version extends Model {

    public function get() {
        $conn = $this->connect();
        return Cache::get('version', 'default', function() use ($conn) {
            $data = $conn->select('versions', 
                                  ['version_name', 'version_code', 'version_min', 'is_enforce', 'descript(desc)', 'insert_timestamp(timestamp)'], 
                                  ['ORDER' => 'insert_timestamp DESC', 'LIMIT' => 1]);
            $data = $data ? $data[0] : array();
            // $data = $this->connect()->query('SELECT version_name, version_code, 
            //                                 version_min, is_enforce, descript as `desc`, insert_timestamp as `timestamp` 
            //                                 FROM versions ORDER BY insert_timestamp DESC LIMIT 1')->fetch(\PDO::FETCH_ASSOC);
            $data['version_code'] = intval($data['version_code']);
            $data['version_min'] = intval($data['version_min']);
            $data['is_enforce'] = intval($data['is_enforce']);
            $data['timestamp'] = intval($data['timestamp']);
            return $data;
        });
    }
}