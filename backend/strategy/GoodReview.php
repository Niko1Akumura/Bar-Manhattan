<?php

namespace backend\strategy;
require_once 'ReviewInterface.php';
use PDO;
class GoodReview implements ReviewInterface {
    public function getReviews($db) {
        $sql = "SELECT * FROM `comments` WHERE `comment_rating` >= 3";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}