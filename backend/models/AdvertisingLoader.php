<?php

namespace backend\models;
require_once __DIR__ . '/../proxy/ProxyInterface.php';

use backend\proxy\ProxyInterface;
use PDO;

class AdvertisingLoader implements ProxyInterface {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAdvertising() {
        $sql = "SELECT `advertising_img`, `advertising_text` FROM `advertising`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}