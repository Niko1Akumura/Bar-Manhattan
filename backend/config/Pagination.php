<?php

namespace backend\config;

class Pagination {
    private $data;
    private $limit;
    private $current;
    private $total;

    public function __construct(array $data, $limit) {
        $this->data = $data;
        $this->limit = $limit;
        $this->total = count($this->data);
    }

    public function getData($current) {
        $this->current = $current;
        $start = ($this->current - 1) * $this->limit;

        return array_slice($this->data, $start, $this->limit);
    }

    public function getLink($links = 5) {
        if($this->total <= $this->limit) {
            return '';
        }

        $last = ceil($this->total / $this->limit);
        $start = max(1, $this->current - floor($links / 2));
        $end = min($last, $start + $links - 1);

        $html = '<ul class="pagination">';

        for ($i = $start; $i <= $end; $i++) {
            $class = ($this->current == $i) ? 'active' : '';
            $html .= '<li class="' . $class . '"><a href="?current=' . $i . '">' . $i . '</a></li>';
        }

        $html .= '</ul>';

        return $html;
    }
}