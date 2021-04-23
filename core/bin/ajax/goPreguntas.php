<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 18-10-16
 * Time: 23:28
 */


if($_SESSION['logged']){
    switch ($_POST['op']){
        case 'get':
            if(isset($_POST['id_leccion']) && $_POST['id_pregunta']){
                $id_pregunta = $_POST['id_pregunta'];
                $id_leccion = $_POST['id_leccion'];
                $leccion = leccionFunction::leccion_getLeccion($id_leccion);
                if($id_pregunta <= (int)$leccion->getCantPreguntas()){
                    $array_pregunta = preguntaFunctions::pregunta_getPreguntaAssoc($id_pregunta, $id_leccion);
                    $_SESSION['id_alternativa_correcta'] = $array_pregunta['pregunta']['respuesta_c'];
                }else{
                    $array_pregunta = null;
                }
                echo json_encode($array_pregunta);
            }
            break;
        case 'eval':
            if(isset($_SESSION['id_alternativa_correcta']) && !empty($_POST['id_alternativa'])){
                $id_alternativa_correcta = $_SESSION['id_alternativa_correcta'];
                $id_alternativa = $_POST['id_alternativa'];
                if($id_alternativa_correcta == $id_alternativa){
                    $respuesta = 1;
                }else{
                    $respuesta = 0;
                }
                echo $respuesta;
                unset($_SESSION['id_alternativa_correcta']);
            }
            break;
        default:
            break;
    }
}

die();