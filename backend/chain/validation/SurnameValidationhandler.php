<?php

namespace backend\chain\validation;

use backend\chain\AbstractValidationHandler;
use Exception;

class SurnameValidationhandler extends AbstractValidationHandler {
    public function handle($data) {
        if (empty($data['userSurname']) || strlen($data['userSurname']) < 2) {
            throw new Exception('Прізвище дуже коротке');
        }

        if (preg_match('/\d/', $data['userSurname'])) {
            throw new Exception('Прізвище не може містити цифр');
        }

        return parent::handle($data);
    }
}