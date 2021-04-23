<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 30-05-16
 * Time: 4:26 PM
 */

class AlumnoFunctions
{
    static function alumno_getLogin($usuario, $contrasena)
    {
        $db = new Conexion();
        $query = $db->query("SELECT * FROM alumno WHERE email = '$usuario' AND contrasena = '$contrasena'");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_alumno = $row[0];
                    $nombre = $row[1];
                    $apellido = $row[2];
                    $email = $row[3];
                    $semestre = $row[5];
                    $estado = $row[6];

                    $temp = new Alumno($id_alumno, $nombre, $apellido, $email, null, $semestre, $estado, null);
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $temp;
    }


    static function alumno_comprobarMail($email)
    {
        $db = new Conexion();
        $sql = $db->query("SELECT id_alumno FROM alumno WHERE email = '$email'");
        if($db->rows($sql) < 1){
            $control = false;
        }else{
            $db->liberar($sql);
            $db->close();
            $control = true;
        }
        return $control;
    }
    
    static function alumno_addAlumno($nombre, $apellido, $email, $contrasena, $semestre){
        $db = new Conexion();
        $nombre = $db->real_escape_string($nombre);
        $apellido = $db->real_escape_string($apellido);
        $email = $db->real_escape_string($email);
        $contrasena = $db->real_escape_string($contrasena);
        $code = generarCodigo();
        //método para enviar el correo de validación.
        $resp = sendMail("reg", $email, $nombre, $code);
        $msg = 0;
        if($resp){
            if($db->query("INSERT INTO alumno VALUES (NULL, '$nombre','$apellido', '$email','$contrasena','$semestre', '0', NULL)")){
                $msg = 1;
                $query = $db->query("SELECT MAX(id_alumno) FROM `alumno` LIMIT 1");
                $id_alumno = 0;
                while ($row = $db->recorrer($query)){
                    $id_alumno = $row[0];
                };
                if($id_alumno != 0){
                    if(RegistroFunctions::registro_addRegistro($id_alumno,$code)){
                        $msg = 4;
                    }else{
                        $msg = 3;
                    }
                }
                $db->liberar($query);
                $db->close();
            }

        }else{
            $msg = 2;
        }
        return $msg;

    }

    static function getAlumno($id_alumno){
        $db = new Conexion();
        $query = $db->query("SELECT id_alumno, nombre, apellido, email, semestre FROM alumno WHERE id_alumno = $id_alumno");
        if($query){
            while ($row = $db->recorrer($query)) {
                $id_alumno = $row[0];
                $nombre = $row[1];
                $apellido = $row[2];
                $email = $row[3];
                $semestre = $row[4];

                $temp = new Alumno($id_alumno, $nombre, $apellido, $email, null, $semestre, null, null);
            }
            $db->liberar($query);
            $db->close();
        }
        return $temp;
    }

    static function changePass($pass){
        $db = new Conexion();
        $id_alumno = get_object_vars($_SESSION['logged'])['id_alumno'];
        $pass = $db->real_escape_string($pass);
        $res = $db->query("UPDATE alumno SET contrasena = '$pass', keypass = NULL WHERE id_alumno = $id_alumno");
        $db->close();
        return $res;
    }
    
    static function getLastAlumno(){
        
    }
    
}

