<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 19-10-16
 * Time: 13:50
 */

if(isset($_SESSION['logged']) and isset($_SESSION['unidad_seleccionada']) and !empty($_POST['op'])){

        $unidad = unidadFunctions::unidad_getUnidad($_SESSION['unidad_seleccionada']);
        $leccion = leccionFunction::leccion_getLeccion($_POST['id_leccion']);
        $cursando_unidad = unidadFunctions::unidad_getCursandoUnidad($unidad->getId_unidad());
        $leccion_final = leccionFunction::leccion_getUltimaLeccion($unidad->getId_unidad());
        $id_leccion_final = $leccion_final->getIdLeccion();
        $nueva_id_leccion = $leccion->getIdLeccion() + 1;
        $result = "";
        if($nueva_id_leccion <= $id_leccion_final){
            $result = unidadFunctions::unidad_actualizarCursandoUnidad($unidad->getId_unidad(), $nueva_id_leccion);
        }else{
            if($unidad->getId_unidad() <= cursoFunctions::curso_getUltimaUnidad($unidad->getId_curso())){
                $nueva_id_unidad = $cursando_unidad->getIdUnidad() + 1;
                $result = cursoFunctions::curso_updateCursandoCurso($nueva_id_unidad);
            }
        }
    echo $result;
}
die();