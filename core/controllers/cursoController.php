<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 07-06-2016
 * Time: 22:10
 */
if(isset($_SESSION['logged'])and isset($_SESSION['id_curso'])){
    include (HTML_DIR .'/curso.php');
}else{
    header('location: ?view=home');
}