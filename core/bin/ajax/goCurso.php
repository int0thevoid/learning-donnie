<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 13-06-16
 * Time: 4:32 PM
 */
if(!empty($_SESSION['logged']) and !empty($_POST['id_unidad'])){
    $idCurso = $_SESSION["id_curso"];
    $_SESSION['unidad_seleccionada'] = $_POST['id_unidad'];
    $id_unidad_seleccionada = $_SESSION['unidad_seleccionada'];
        $array_lecciones = leccionFunction::leccion_getListadoLeccion($id_unidad_seleccionada);
        if($array_lecciones){

        echo 1;
        }
}else{
    $result = '<div class="alert alert-danger" contenteditable="false">';
    $result .= '<br>';
    $result .= '<strong>ERROR: Debe ingresar todos los datos</strong>';
    $result .= '</div>';
    echo $result;
}