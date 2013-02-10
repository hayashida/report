<?php

class MyValidation
{
    public static function _validation_valid_date($val)
    {
        Validation::active()->set_message('valid_date', 'The valid date rule failed for field :label');
        
        if (!$val)
            return true;

        $parts = array();
        if (! preg_match('/^([0-9]{4})[\-\/\.](0?[0-9]|1[0-2])[\-\/\.]([0-2]?[0-9]|3[01])$/', $val, $parts)) {
            return false;
        }

        if (checkdate($parts[2], $parts[3], $parts[1]) === true) {
            $val = date('Y-m-d', strtotime($val));
            return $val;
        } else {
            return false;
        }
    }
}