<?php
if (!function_exists('auth')) {
    function checkIsUsernameOrPhone($input)
    {
        if(preg_match('/^[0-9]{10,12}+$/', $input)){
            return 'phone';
        }
        else{
            return 'username';
        }
    }
}
