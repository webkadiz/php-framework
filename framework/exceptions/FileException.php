<?php

namespace pl\exceptions;

class FileException extends \Exception {
    function customMessage() {
        if($this->code === 0) {
            return 'file ' . $this->message . ' not exists';
        }
    }
}