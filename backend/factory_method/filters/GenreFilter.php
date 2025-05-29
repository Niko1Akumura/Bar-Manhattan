<?php
namespace backend\factory_method\filters;
require_once 'FilterInterface.php';

class GenreFilter implements FilterInterface {
    public function applyFilter($query, $params) {
        if (!empty($params['group_genre'])) {
            if (strpos($query, 'WHERE') !== false) {
                $query .= " AND genre_name = :genre";
            } else {
                $query .= " WHERE genre_name = :genre";
            }
        }
        return $query;
    }
}