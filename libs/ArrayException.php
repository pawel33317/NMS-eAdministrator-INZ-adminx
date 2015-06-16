<?php

class ArrayException extends Exception {

    private $_errorsArray;

    public function __construct($errorArray = array('params'), $message = 0, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->_errorsArray = $errorArray;
    }

    public function getErrorArray() {
        return $this->_errorsArray;
    }

}
