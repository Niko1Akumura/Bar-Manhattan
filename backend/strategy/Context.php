<?php

namespace backend\strategy;

class Context {
    private $strategy;

    public function __construct(ReviewInterface $strategy){
        $this->strategy = $strategy;
    }

    public function setStrategy(ReviewInterface $strategy){
        $this->strategy = $strategy;
    }

    public function getReviews($db){
        return $this->strategy->getReviews($db);
    }
}