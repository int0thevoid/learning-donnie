<?php

class alternativaFunctions{
    static function alternativa_getListado_alternativas($id_pregunta, $id_leccion){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM alternativa WHERE id_pregunta = $id_pregunta AND id_leccion = $id_leccion ORDER BY id_pregunta");
        if ($db->rows($query) < 1) {
            return false;
            /** @noinspection PhpUnreachableStatementInspection */
            exit;
        } else {

            $arrayAlternativas = array();
            while ($row = $db->recorrer_assoc($query)){
                $arrayAlternativas[] = $row;
            }

        }
        $db->liberar($query);
        $db->close();
        return $arrayAlternativas;
    }

    static function alternativa_getAlternativa($id_alternativa, $id_pregunta, $id_leccion){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM alternativa WHERE id_alternativa = $id_alternativa AND id_pregunta = $id_pregunta AND id_leccion = $id_leccion");
        if($db->rows($query) < 1){
            return false;
            exit;
        }else{
            while ($row = $db->recorrer($query)){
                $id_alternativa = $row[0];
                $id_pregunta    = $row[1];
                $id_leccion     = $row[2];
                $label          = $row[3];
                $temp = new Alternativa($id_alternativa, $id_pregunta, $id_leccion, $label);
            }
        }
        $db->liberar($query);
        $db->close();
        return $temp;
    }

}