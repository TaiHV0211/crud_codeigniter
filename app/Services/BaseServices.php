<?php

namespace App\Services;
class BaseServices
{
    /**
     * @var validation
     */
    public $validation;
    function __construct()
    {
        $this->validation = \Config\Services::validation();
    }
    
}
