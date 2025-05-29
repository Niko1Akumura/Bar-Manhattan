<?php

namespace backend\gallery_cache;
use PDO;

class Gallery {
    private $db;
    private $cache;

    public function __construct($db, Cache $cache) {
        $this->db = $db;
        $this->cache = $cache;
    }

    public function getGallery() {
        $cache_key = 'gallery_images';

        $cached_gallery = $this->cache->get($cache_key);
        if($cached_gallery) {
            return $cached_gallery;
        }

        $query = "SELECT `image_id`, `gallery_image` FROM `gallery` ORDER BY `image_id` DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $gallery = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->cache->set($cache_key, $gallery);

        return $gallery;
    }
}