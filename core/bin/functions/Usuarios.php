<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 01-06-16
 * Time: 12:45 AM
 */

function Usuarios(){
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM Alumnos;");
    if($db->rows($sql) > 0){
        while ($row = $db->recorrer($sql)){
            $alumnos[$row['id']] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'email' => $row['email'],
                'contrasena' => $row['contrasena'],
                'semestre' => $row['semestre'],
                'estado' => $row['estado']
            );
        }
    }else{
        $alumnos = false;
    }
    $db->liberar($sql);
    $db->close();
}