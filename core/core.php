<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 30-05-16
 * Time: 1:09 AM
 */

session_start();

#Constantes de conexión
define('DB_HOST','127.0.0.1:3306');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','learning_LDAdmin');


#Constantes de la APP
define('HTML_DIR','html');
define('APP_TITLE','Learning Donnie');
define('APP_COPYRIGHT', 'Copyright &copy; ' . date('Y',time()) . ' Learning Donnie. ');
define('APP_BASE','www.learningdonnie.cl');


#Estructura
include_once ('core/include_models.php');
include_once ('core/include_inner.php');
include_once ('core/bin/functions/Encrypt.php');