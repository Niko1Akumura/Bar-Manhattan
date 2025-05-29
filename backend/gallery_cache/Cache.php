<?php

namespace backend\gallery_cache;

class Cache {
    private $cache_url = __DIR__ . '/../gallery_cache/cache/';
    private $cache_time = 3600;

    public function get($key) {
        $cache_file = $this->cache_url . md5($key) . '.cache';

        if (file_exists($cache_file) && (filemtime($cache_file) + $this->cache_time) > time()) {
            return unserialize(file_get_contents($cache_file));
        }

        return false;
    }

    public function set($key, $data) {
        $cache_file = $this->cache_url . md5($key) . '.cache';
        file_put_contents($cache_file, serialize($data));
    }

    public function clear($key) {
        $cache_file = $this->cache_url . md5($key) . '.cache';
        if (file_exists($cache_file)) {
            unlink($cache_file);
        }
    }
}