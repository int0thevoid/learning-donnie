<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 31-05-16
 * Time: 1:59 AM
 */
function Encrypt($string){
    $long = strlen($string);
    $str = '';
    for ($x = 0; $x < $long ; $x++){
        $str .= ($x % 2) != 0 ? md5($string[$x]): $x;
    }
    return md5($str);
}


