<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 29-05-16
 * Time: 6:30 PM
 */
unset($_SESSION['logged']);
unset($_SESSION['curso']);
unset($_SESSION['unidad']);
unset($_SESSION['cursando']);
header('location: ?view=index');
