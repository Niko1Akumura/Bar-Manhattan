<?php

namespace backend\chain\validation;

use backend\chain\AbstractValidationHandler;
use Exception;

class CommentValidationHandler extends AbstractValidationHandler {
    public function handle($data) {
        if (empty($data['comment_text']) || strlen($data['comment_text']) < 10) {
            throw new Exception('Коментар закороткий');
        }

        
        return parent::handle($data);
    }
}