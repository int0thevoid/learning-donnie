<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 09-10-16
 * Time: 1:09 AM
 */
class RegistroFunctions{
    static function registro_addRegistro($id_alumno, $codigo){
        $db = new Conexion();
        $date = $db->real_escape_string(date('Y-m-d H:i:s'));
        $codigo = $db->real_escape_string($codigo);
        $result = $db->query("INSERT INTO `registro` VALUES (NULL,'$id_alumno','$codigo','$date', 0, NULL)");
        $db->close();
        return $result;
    }

    static function registro_getRegistro($code){
        $db = new Conexion();
        $code = $db->real_escape_string($code);
        $query = $db->query("SELECT * FROM registro WHERE codigo = '$code' LIMIT 1;");
        if($query){
            while ($row = $db->recorrer($query)) {
                $id_registro    = $row[0];
                $id_alumno      = $row[1];
                $codigo         = $row[2];
                $fecha          = $row[3];
                $estado         = $row[4];
                $fecha_activado = $row[5];

                $temp = Array(
                    'id_registro'       => $id_registro,
                    'id_alumno'         => $id_alumno,
                    'codigo'            => $codigo,
                    'fecha'             => $fecha,
                    'estado'            => $estado,
                    'fecha_activado'    => $fecha_activado
                );
            }
            $db->liberar($query);
        }else{
            $temp = false;
        }
        $db->close();
        return $temp;
    }

    static function registro_getRegistroAlumno(){
        $db = new Conexion();
        $id_alumno = get_object_vars($_SESSION['logged'])['id_alumno'];
        $query = $db->query("SELECT * FROM registro WHERE id_alumno = $id_alumno LIMIT 1;");
        if($query){
            while ($row = $db->recorrer($query)) {
                $id_registro    = $row[0];
                $id_alumno      = $row[1];
                $codigo         = $row[2];
                $fecha          = $row[3];
                $estado         = $row[4];
                $fecha_activado = $row[5];

                $temp = Array(
                    'id_registro'       => $id_registro,
                    'id_alumno'         => $id_alumno,
                    'codigo'            => $codigo,
                    'fecha'             => $fecha,
                    'estado'            => $estado,
                    'fecha_activado'    => $fecha_activado
                );
            }
            $db->liberar($query);
        }else{
            $temp = false;
        }
        $db->close();
        return $temp;
}

    static function registro_setRegistro($code){
        $db = new Conexion();
        $date = $db->real_escape_string(date('Y-m-d H:i:s'));
        $codigo = $db->real_escape_string($code);
        $res = $db->query("UPDATE registro SET estado = 1, fecha_activado = '$date' WHERE codigo = '$codigo' AND estado = 0");
        $db->close();
    }
}
