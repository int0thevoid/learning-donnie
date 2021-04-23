<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 19-10-16
 * Time: 03:14
 */
if(!empty($_SESSION['logged']) and !empty($_POST["id_leccion"]) and !empty($_POST["id_pregunta"])){
    $id_leccion = $_POST['id_leccion'];
    $id_pregunta = $_POST['id_pregunta'];
    $array_alternativas = alternativaFunctions::alternativa_getListado_alternativas($id_pregunta,$id_leccion);
    //$array_alternativas = array_map("utf8-encode", $array_alternativas);
    echo json_encode($array_alternativas);

}