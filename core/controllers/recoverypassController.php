<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 13-08-2016
 * Time: 11:54
 */

if(!isset($_SESSION['logged']) and isset($_GET['key'])){
    $db = new Conexion();
    $keypass = $db->real_escape_string($_GET['key']);
    $sql = $db->query("SELECT id_alumno FROM alumno WHERE keypass = '$keypass' LIMIT 1;");
    if($db->rows($sql) > 0){
        $id_alumno = $db->recorrer($sql);
        $_SESSION['id_recovery_pass'] = $id_alumno[0];
        include (HTML_DIR .'/changePass.php');
    }else{
        header('location: ?view=index');
    }
    $db->liberar($sql);
    $db->close();
}else{
    header('location: ?view=index');
}
