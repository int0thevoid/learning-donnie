<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 23-10-16
 * Time: 00:00
 */


if(isset($_SESSION['logged']) and isset($_GET['goto']) and file_exists('html/forum/' . strtolower($_GET['goto']).'.php')){
    include (HTML_DIR .'/forum/'.$_GET['goto'].'.php');
}else{
    header('location: ?view=home');
}
