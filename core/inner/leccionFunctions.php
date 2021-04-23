<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 12-10-16
 * Time: 23:20
 */

class leccionFunction
{
    static function leccion_getListadoLeccion($id_unidad){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM leccion WHERE id_unidad = $id_unidad");
        if ($db->rows($query) < 1) {
            return false;
            /** @noinspection PhpUnreachableStatementInspection */
            exit;
        } else {
            while ($row = $db->recorrer($query)) {
                $id_leccion     = $row[0];
                $id_unidad      = $row[1];
                $cant_preguntas = $row[2];
                $descripcion    = $row[3];

                $temp = new Leccion($id_leccion, $id_unidad, $cant_preguntas,$descripcion);
                $arrayLecciones[] = $temp;
            }
        }
        $db->liberar($query);
        $db->close();
        return $arrayLecciones;
    }

    static function leccion_getLeccion($id_leccion){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM leccion WHERE id_leccion = $id_leccion");
        if($db->rows($query) < 1){
            return false;
            exit;
        }else{
            while ($row = $db->recorrer($query)){
                $id_leccion     = $row[0];
                $id_unidad      = $row[1];
                $cant_preguntas = $row[2];
                $descripcion    = $row[3];

                $temp = new Leccion($id_leccion, $id_unidad, $cant_preguntas,$descripcion);
            }
        }
        $db->liberar($query);
        $db->close();
        return $temp;
    }

    static function leccion_getIdPrimeraLeccion($id_unidad){
        $db = new Conexion();
        $query = $db->query("SELECT MIN(id_leccion) FROM leccion WHERE id_unidad = $id_unidad");
        if ($query) {
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_leccion = $row[0];
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $id_leccion;
    }

    static function leccion_getUltimaLeccion($id_unidad){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM leccion WHERE id_unidad = $id_unidad ORDER BY id_leccion");
        if($db->rows($query) < 1){
            return false;
            exit;
        }else{
            while ($row = $db->recorrer($query)){
                $id_leccion     = $row[0];
                $id_unidad      = $row[1];
                $cant_preguntas = $row[2];
                $descripcion    = $row[3];

                $temp = new Leccion($id_leccion, $id_unidad, $cant_preguntas,$descripcion);
            }
        }
        $db->liberar($query);
        $db->close();
        return $temp;
    }

}