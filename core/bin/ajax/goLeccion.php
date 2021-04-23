<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 28-06-2016
 * Time: 18:23
 */
if(!empty($_SESSION['logged']) and !empty($_POST["id_leccion"]) and isset($_SESSION['unidad_seleccionada'])){

        $array_preguntas = preguntaFunctions::pregunta_getListadoPreguntas($_POST['id_leccion']);
        $_SESSION['id_leccion_seleccionada'] = $_POST['id_leccion'];
        $leccion = leccionFunction::leccion_getLeccion($_POST['id_leccion']);
        $min_correctas = round((70 * $leccion->getCantPreguntas()) / 100);
        $oportunidades = $leccion->getCantPreguntas() - $min_correctas;
        $cant_preguntas = $leccion->getCantPreguntas();
        echo $cant_preguntas;

    /*if($_SESSION['logged']){

            if ($db->rows($sql3)) $totalPreguntasLeccion = $db->recorrer($sql3)[0];
            $_SESSION['totalPreguntasLeccion'] = $totalPreguntasLeccion;
                $x = ( $arrayPreguntas[1]['id'] * 100) / $totalPreguntasLeccion;
                $result_pb = '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                 aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:'.$x.'%">';
                $result_pb .= 'Lecci&oacute;n n&uacute;mero '.$arrayPreguntas[1]['id'].' de '.$totalPreguntasLeccion;
                $result_pb .= '</div>';
            $result_en = '<label for="lessonOptions"><span class="fa fa-fw fa-lg fa-question-circle"></span>'.$arrayPreguntas[1]['enunciado'].'</label>';
            $idPregunta = $arrayPreguntas[1]['id'];
            
            $sql2 = $db->query("SELECT * FROM Alternativa WHERE idPregunta = '$idPregunta'");
            if($db->rows($sql2)>0){
                while ($row = $db->recorrer($sql2)){
                    $arrayAlternativas[$row[0]] = array(
                        'id' => $row[0],
                        'label' => $row[2]
                    );
                }
            }
            $result_alt = '<div class="form-group" id="lessonOptions">';
            foreach ($arrayAlternativas as $item) {
                $result_alt .= '<div class="radio">';
                $result_alt .= '<label id="op'.$item['id'].'"><input type="radio" value="'.$item['id'].'"
                     name="optradio">'.$item['label'].'</label>';
                $result_alt .= '</div>';
            }
            $result_alt .= '</div>';
            
            $_SESSION["preguntas_incorrectas_leccion"] = 0;
        }*/
        /*$json = '{
            "x":'.$x.',
            "pregunta":'.$arrayPreguntas[1]['id'].',
            "total_preguntas": '.$totalPreguntasLeccion.',
            "enunciado":'.$arrayPreguntas[1]['enunciado'].',
            "opt1": '.$arrayAlternativas[1]['id'].',
            "opt1": '.$arrayAlternativas[1]['label'].',
            "opt2": '.$arrayAlternativas[2]['id'].',
            "opt2": '.$arrayAlternativas[2]['label'].',
            "opt3": '.$arrayAlternativas[3]['id'].',
            "opt3": '.$arrayAlternativas[3]['label'].',
            "opt4": '.$arrayAlternativas[4]['id'].',
            "opt4": '.$arrayAlternativas[4]['label'].'
            }';*/
}else{
        $result = '<div class="alert alert-danger" contenteditable="false">';
        $result .= '<br>';
        $result .= '<strong>ERROR: hay una inconsistencia en la sesi&oacute;n</strong>';
        $result .= '</div>';
        echo $result;
}
die();