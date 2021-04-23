<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 10-10-16
 * Time: 18:13
 */
class cursoFunctions{
    static function curso_getListadoCurso(){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM curso");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_curso = $row[0];
                    $nombre         = $row[1];
                    $contenido      = $row[2];
                    $descripcion    = $row [3];
                    $cant_unidades  = $row[4];

                    $temp = new Curso($id_curso, $nombre, $contenido,$descripcion,$cant_unidades);
                    $arrayCurso[] = $temp;
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $arrayCurso;
    }

    static function curso_getCurso($id_curso){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM curso WHERE id_curso = $id_curso");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_curso       = $row[0];
                    $nombre         = $row[1];
                    $contenido      = $row[2];
                    $descripcion    = $row [3];
                    $cant_unidades  = $row[4];

                    $temp = new Curso($id_curso, $nombre, $contenido,$descripcion,$cant_unidades);

                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $temp;
    }

    static function curso_getCursandoCurso($id_curso){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];
        $query = $db->query("SELECT * FROM cursando_curso WHERE id_curso = '$id_curso' AND id_alumno = '$id_alumno' LIMIT 1;");
        if($db->rows($query) < 1){
            $id_primera_unidad = unidadFunctions::unidad_getIdPrimeraUnidad($id_curso);
            $date = date('Y-m-d H:i:s');
            $result = $db->query("INSERT INTO cursando_curso VALUES ($id_alumno , $id_curso , $id_primera_unidad, '$date')");
            if($result){
                $query = $db->query("SELECT * FROM cursando_curso WHERE id_curso = '$id_curso' AND id_alumno = '$id_alumno' LIMIT 1;");
            }else{
                return "ERROR";
            }
        }
        while($row = $db->recorrer($query)){
            $id_alumno          = $row[0];
            $id_curso           = $row[1];
            $id_unidad_actual   = $row[2];
            $fecha_inicial      = $row[3];

            $temp = new Cursando_curso($id_alumno,$id_curso,$id_unidad_actual, $fecha_inicial);
        }
        return $temp;
    }

    static function curso_updateCursandoCurso($id_unidad){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];
        $result = $db->query("UPDATE cursando_curso SET id_unidad_actual = $id_unidad WHERE id_alumno = $id_alumno");
        $db->close();
        return $result;
    }

    static function curso_getUltimaUnidad($id_curso){
        $db = new Conexion();
        $query = $db->query("SELECT MAX(id_unidad) FROM unidad WHERE id_curso = $id_curso");
        if ($db->rows($query) < 1) {
            return false;
            /** @noinspection PhpUnreachableStatementInspection */
            exit;
        } else {
            while ($row = $db->recorrer($query)) {
                $max_id_unidad = $row[0];
            }
        }
        $db->close();
        return $max_id_unidad;
    }

}