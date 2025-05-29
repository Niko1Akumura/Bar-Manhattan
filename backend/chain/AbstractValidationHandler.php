<?php

namespace backend\chain;
require_once 'ValidationHandler.php';
abstract class AbstractValidationHandler implements ValidationHandler {
    private $nextHandler;

    public function setNext(ValidationHandler $handler) {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle($data)  {
       if ($this->nextHandler) {
           return $this->nextHandler->handle($data);
       }
       return true;
    }
}