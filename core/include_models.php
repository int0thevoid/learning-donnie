<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 08-10-16
 * Time: 5:34 PM
 */
/*
include_once ('core/models/Alternativa.class.php');
include_once ('core/models/Alumno.class.php');
include_once ('core/models/Curso.class.php');
include_once ('core/models/Cursando_curso.class.php');
include_once ('core/models/Unidad.class.php');
include_once ('core/models/Leccion.class.php');
include_once ('core/models/class.Conexion.php');*/

$direccion = opendir("core/models/");
while ($file = readdir($direccion)){
    if($file != "." && $file != ".." && substr($file,0,2) != ".#"){
        include_once ("models/$file");
    }
}