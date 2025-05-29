<?php

namespace backend\chain\validation;

use backend\chain\AbstractValidationHandler;
use Exception;

class RatingValidationHandler extends AbstractValidationHandler {
    public function handle($data) {
        if ($data['commentRating'] < 0 || $data['commentRating'] > 5) {
            throw new Exception('Оцінка повинна бути від 0 до 5');
        }

        return parent::handle($data);
    }
}