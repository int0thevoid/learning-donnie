<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 13-10-16
 * Time: 07:52
 */

class preguntaFunctions
{
    static function pregunta_getListadoPreguntasAssoc($id_leccion){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM pregunta WHERE id_leccion = $id_leccion");
        if($query){
            while($data = $db->recorrer_assoc($query)){
                $arrayPreguntas["data"][] = array_map("utf8_encode",$data);
            }
        }
        $db->close();
        return $arrayPreguntas;
    }

    static function pregunta_getPreguntaAssoc($id_pregunta, $id_leccion){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM pregunta WHERE id_pregunta = $id_pregunta AND id_leccion = $id_leccion");
        if($query){
            while($pregunta = $db->recorrer_assoc($query)){
                $arrayPregunta["pregunta"] = $pregunta;
            }
            $db->liberar($query);
        }
        $db->close();
        return $arrayPregunta;
    }

    static function pregunta_getListadoPreguntas($id_leccion){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM pregunta WHERE id_leccion = $id_leccion");
        if ($db->rows($query) < 1) {
            return false;
            /** @noinspection PhpUnreachableStatementInspection */
            exit;
        } else {
            $arrayPreguntas = array();
            while ($row = $db->recorrer($query)) {
                $id_pregunta        = $row[0];
                $id_leccion         = $row[1];
                $respuesta_correcta = $row[2];
                $enunciado          = $row[3];

                $temp = new Pregunta($id_pregunta, $id_leccion, $respuesta_correcta, $enunciado);
                $arrayPreguntas[] = $temp;
            }
        }
        $db->liberar($query);
        $db->close();
        return $arrayPreguntas;
    }

    static function pregunta_getPregunta($id_pregunta, $id_leccion){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM pregunta WHERE id_pregunta = $id_pregunta AND id_leccion = $id_leccion");
        if($db->rows($query) < 1){
            return false;
            exit;
        }else{
            while ($row = $db->recorrer($query)){
                $id_pregunta        = $row[0];
                $id_leccion         = $row[1];
                $respuesta_correcta = $row[2];
                $enunciado          = $row[3];

                $temp = new Pregunta($id_pregunta, $id_leccion, $respuesta_correcta, $enunciado);
            }
        }
        $db->liberar($query);
        $db->close();
        return $temp;
    }
}