<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 08-10-16
 * Time: 5:40 PM
 */

/*include_once ('core/inner/alternativaFunctions.php');
include_once ('core/inner/alumnoFunctions.php');
include_once ('core/inner/registroFunctions.php');
include_once ('core/inner/cursoFunctions.php');
include_once ('core/inner/unidadFunctions.php');
include_once ('core/inner/leccionFunctions.php');
include_once ('core/inner/utilFunctions.php');*/

$direccion = opendir("core/inner/");
while ($file = readdir($direccion)){
    if($file != "." && $file != ".." && substr($file,0,2) != ".#"){
        include_once ("inner/$file");
    }
}