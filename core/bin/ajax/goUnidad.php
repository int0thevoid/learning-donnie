<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 07-06-2016
 * Time: 16:56
 */
if(!empty(isset($_SESSION["logged"])) and !isset($_SESSION['unidad_seleccionada'])){
    $db = new Conexion();
    $idUnidad = $_POST['idUnidad'];
    $_SESSION['unidad_seleccionada'] = $idUnidad;
    if($_SESSION['logged_id'] == $idAlumno){
        $sql = $db->query("SELECT * FROM Leccion WHERE idUnidad = '$idUnidad';");
        if(isset($_SESSION['lecciones'])){unset($_SESSION['lecciones']);}
        $array_leccion = null;
        if($db->rows($sql) > 0){
            while ($row = $db->recorrer($sql)){
                $array_leccion[$row[0]] = array(
                    'id' => $row[0],
                    'idUnidad' => $row[1],
                    'cantPreguntas' => $row[2],
                    'descripcion' => $row[3]
                );
            }
        }
        $_SESSION['lecciones'] = $array_leccion;
        $db->liberar($sql);
        echo 1;
    }else{
        $result = '<div class="alert alert-danger" contenteditable="false">';
        $result .= '<br>';
        $result .= '<strong>ERROR: hay una inconsistencia en la sesi&oacute;n</strong>';
        $result .= '</div>';
        echo $result;
    }
    $db->close();
}else{
    $result = '<div class="alert alert-danger" contenteditable="false">';
    $result .= '<br>';
    $result .= '<strong>ERROR: Debe ingresar todos los datos</strong>';
    $result .= '</div>';
    echo $result;
}