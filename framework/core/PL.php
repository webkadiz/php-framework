<?php

namespace pl\core;

class PL {

    function getClassProps() {
        $classname = get_called_class();
        return array_keys(get_class_vars($classname));
    }

    function inClassProps(string $prop) {
        return in_array($prop, $this->getClassProps());
    }
}