<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 30-05-16
 * Time: 1:16 AM
 */
if(isset($_GET['code'])){
    $code = $_GET['code'];
    $registro = RegistroFunctions::registro_getRegistro($code);
    if($registro){
        $res = RegistroFunctions::registro_setRegistro($code);
        unset($_SESSION['logged']);
        unset($_SESSION['curso']);
        unset($_SESSION['unidad']);
        unset($_SESSION['cursando']);
        header('location: ?view=index&success=true');

    }else{
        header('location: ?view=index&success=false');
    }
}else{
    header('location: ?view=home');
}