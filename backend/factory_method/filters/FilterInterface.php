<?php

namespace backend\factory_method\filters;

interface FilterInterface {
    public function applyFilter($query, $params);
}