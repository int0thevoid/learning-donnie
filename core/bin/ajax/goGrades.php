<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 07-06-2016
 * Time: 16:56
 */
if(!empty($_POST['idCurso'])){
    $id_curso = $_POST['idCurso'];
    $result = cursoFunctions::curso_getCursandoCurso($id_curso);
    if($result){
        if(isset($_SESSION["id_curso"]))unset($_SESSION["id_curso"]);
        $_SESSION["id_curso"] = $result->getIdCurso();
        echo 1;
    }else{
        $result = '<div class="alert alert-danger" contenteditable="false">';
        $result .= '<br>';
        $result .= '<strong>ERROR: ingrese nuevamente</strong>';
        $result .= '</div>';
        echo $result;
    }
}else{
    $result = '<div class="alert alert-danger" contenteditable="false">';
    $result .= '<br>';
    $result .= '<strong>ERROR: Debe ingresar todos los datos</strong>';
    $result .= '</div>';
    echo $result;
}