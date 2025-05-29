<?php

namespace backend\factory_method\factories;
require_once __DIR__ . '/../filters/GenreFilter.php';
require_once __DIR__ . '/../filters/RatingFilter.php';

use backend\factory_method\filters\GenreFilter;
use backend\factory_method\filters\RatingFilter;

class FilterFactory {
    public static function createFilters() {
        return [
            new GenreFilter(),
            new RatingFilter()
        ];
    }
}
