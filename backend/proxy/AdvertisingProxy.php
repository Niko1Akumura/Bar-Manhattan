<?php

namespace backend\proxy;

require_once __DIR__ . '/../proxy/ProxyInterface.php';
require_once __DIR__ . '/../models/AdvertisingLoader.php';
require_once  __DIR__ . '/../models/AdvertisingLazyLoader.php';

use backend\proxy\ProxyInterface;
use backend\models\AdvertisingLoader;
use backend\models\AdvertisingLazyLoader;

class AdvertisingProxy implements ProxyInterface{
    private $origin_model;
    private $lazy_model;
    private $data;

    public function __construct($db) {
        $this->origin_model = new AdvertisingLoader($db);
        $this->lazy_model = new AdvertisingLazyLoader($db);
    }

    public function getLazyAdvertising() {
        $this->data = $this->lazy_model->getAdvertising();
        return $this->data;
    }

    public function getAdvertising() {
        $this->data = $this->origin_model->getAdvertising();
        return $this->data;
    }
}
