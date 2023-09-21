<?php

namespace Php\template;

class Validate
{
    public function validatePhone($phone)
    {
        $pattern = '/[^0-9]/';
        $phone = preg_replace($pattern, "", $phone);
        return $phone;
    }
}