<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 11-10-16
 * Time: 21:42
 */

class unidadFunctions
{
    static function unidad_getListadoUnidad($id_curso){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM unidad WHERE id_curso = '$id_curso'");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_unidad      = $row[0];
                    $id_curso       = $row[1];
                    $numero         = $row[2];
                    $cant_lecciones = $row[3];
                    $descripcion    = $row[4];

                    $temp = new Unidad($id_unidad, $id_curso, $numero,$cant_lecciones, $descripcion);
                    $arrayUnidad[] = $temp;
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $arrayUnidad;
    }

    static function unidad_getIdPrimeraUnidad($id_curso)
    {
        $db = new Conexion();
        $query = $db->query("SELECT MIN(id_unidad) FROM unidad WHERE id_curso = '$id_curso'");
        if ($query) {
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_unidad = $row[0];
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $id_unidad;
    }

    static function unidad_getUnidad($id_unidad){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM unidad WHERE id_unidad = $id_unidad LIMIT 1;");
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_unidad      = $row[0];
                    $id_curso       = $row[1];
                    $numero         = $row[2];
                    $cant_lecciones = $row[3];
                    $descripcion    = $row[4];

                    $temp = new Unidad($id_unidad, $id_curso, $numero,$cant_lecciones, $descripcion);
                }
            }
            $db->liberar($query);
            $db->close();

        return $temp;
    }

    static function unidad_getCursandoUnidad($id_unidad){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];
        $id_curso = ($_SESSION["id_curso"]);
        $query = $db->query("SELECT * FROM cursando_unidad WHERE id_unidad = '$id_unidad' AND id_alumno = '$id_alumno' LIMIT 1;");
        if($db->rows($query) < 1){
            $id_primera_leccion = leccionFunction::leccion_getIdPrimeraLeccion($id_unidad);
            $date = date('Y-m-d H:i:s');
            $result = $db->query("INSERT INTO cursando_unidad VALUES ($id_alumno , $id_unidad , $id_primera_leccion, '$date')");
            if($result){
                $query = $db->query("SELECT * FROM cursando_unidad WHERE id_unidad = '$id_unidad' AND id_alumno = '$id_alumno' LIMIT 1;");
            }else{
                return "ERROR";
            }
        }
        while($row = $db->recorrer($query)){
            $id_alumno          = $row[0];
            $id_unidad           = $row[1];
            $id_leccion_actual   = $row[2];
            $fecha_inicial      = $row[3];

            $temp = new Cursando_unidad($id_alumno,$id_unidad,$id_leccion_actual, $fecha_inicial);
        }
        return $temp;
    }

    static function unidad_getCursandoUnidad2($id_unidad){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];
        $id_curso = ($_SESSION["id_curso"]);
        $query = $db->query("SELECT * FROM cursando_unidad WHERE id_curso = $id_curso AND id_alumno = '$id_alumno' LIMIT 1;");
        if($db->rows($query) < 1){
            $id_primera_leccion = leccionFunction::leccion_getIdPrimeraLeccion($id_unidad);
            $date = date('Y-m-d H:i:s');
            $result = $db->query("INSERT INTO cursando_unidad VALUES ($id_alumno , $id_unidad , $id_primera_leccion, '$date')");
            if($result){
                $query = $db->query("SELECT * FROM cursando_unidad WHERE id_unidad = '$id_unidad' AND id_alumno = '$id_alumno' LIMIT 1;");
            }else{
                return "ERROR";
            }
        }
        while($row = $db->recorrer($query)){
            $id_alumno          = $row[0];
            $id_unidad           = $row[1];
            $id_leccion_actual   = $row[2];
            $fecha_inicial      = $row[3];

            $temp = new Cursando_unidad($id_alumno,$id_unidad,$id_leccion_actual, $fecha_inicial);
        }
        return $temp;
    }


    static function unidad_actualizarCursandoUnidad($id_unidad, $id_leccion){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];
        $date = date('Y-m-d H:i:s');
        $result = $db->query("UPDATE cursando_unidad SET id_unidad = $id_unidad, id_leccion_actual = $id_leccion, fecha_inicial = '$date' WHERE id_alumno = $id_alumno");
        $db->close();
        return $result;

    }


}