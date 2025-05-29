<?php

namespace backend\models;
use PDO;
use backend\factory_method\factories\FilterFactory;
require_once __DIR__ . '/../factory_method/factories/FilterFactory.php';


class GroupFetcher {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getGroups($params)
    {
        $query = "SELECT `group_id`, `group_img`, `group_name`, `genre_name`, `group_rating`, `group_description`
              FROM `groups`
              INNER JOIN `genres` ON `groups`.`genre_id` = `genres`.`genre_id`";

        $filters = FilterFactory::createFilters();
        foreach ($filters as $filter) {
            $query = $filter->applyFilter($query, $params);
        }

        $stmt = $this->db->prepare($query);

        if (!empty($params['group_genre'])) {
            $stmt->bindValue(':genre', $params['group_genre']);
        }
        if (!empty($params['start_rating'])) {
            $stmt->bindValue(':start_rating', $params['start_rating']);
        }
        if (!empty($params['finish_rating'])) {
            $stmt->bindValue(':finish_rating', $params['finish_rating']);
        }

        $stmt->execute();
        $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($groups as &$group) {
            if (!empty($group['group_img'])) {
                $group['group_img'] = base64_encode($group['group_img']);
            }
        }

        return $groups;
    }

}