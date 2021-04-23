<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 07-06-2016
 * Time: 15:01
 */
if(isset($_SESSION['logged'])){
    include (HTML_DIR .'/grades.php');
}else{
    header('location: ?view=home');
}
