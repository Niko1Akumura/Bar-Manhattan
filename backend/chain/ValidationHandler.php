<?php

namespace backend\chain;

interface ValidationHandler{
public function setNext(ValidationHandler $handler);
public function handle($data);
}