<?php

namespace app\config;

class MyConfig{

    public static function sitename()
    {
        return "Vidi Nuel";
    }

    public static function randomString($n)
    {
        $xters  = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str = '';

        for($i=0; $i<$n; $i++){
            $index = rand(0, strlen($xters) -1);
            $str .= $xters[$index];
        }
        return $str; 
        
    }
}