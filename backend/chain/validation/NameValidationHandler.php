<?php

namespace backend\chain\validation;
require_once __DIR__ . '/../AbstractValidationHandler.php';

use backend\chain\AbstractValidationHandler;
use Exception;
class NameValidationHandler extends AbstractValidationHandler {
    public function handle($data) {
        if(empty($data['userName']) || strlen($data['userName']) < 2) {
            throw new Exception('Імя дуже коротке');
        }

        if (preg_match('/\d/', $data['userName'])) {
            throw new Exception('Імя не может містити цифр');
        }
        return parent::handle($data);
    }
}