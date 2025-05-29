<?php

namespace backend\factory_method\filters;
require_once 'FilterInterface.php';
class RatingFilter implements FilterInterface {
    public function applyFilter($query, $params) {
        if (!empty($params['start_rating']) || !empty($params['finish_rating'])) {
            $ratingCondition = [];
            if (!empty($params['start_rating'])) {
                $ratingCondition[] = "group_rating >= :start_rating";
            }
            if (!empty($params['finish_rating'])) {
                $ratingCondition[] = "group_rating <= :finish_rating";
            }
            $condition = implode(' AND ', $ratingCondition);

            if (strpos($query, 'WHERE') !== false) {
                $query .= " AND " . $condition;
            } else {
                $query .= " WHERE " . $condition;
            }
        }
        return $query;
    }
}