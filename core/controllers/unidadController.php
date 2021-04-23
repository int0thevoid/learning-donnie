<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 13-06-16
 * Time: 4:06 PM
 */
if(!empty($_SESSION['logged']) and isset($_SESSION['id_curso'])){
    include (HTML_DIR .'/unidad.php');
}else{
    header('location: ?view=home');
}