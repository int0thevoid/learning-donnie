<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 05-11-16
 * Time: 01:07
 */

if(isset($_POST['newpass']) && isset($_POST['pass']) && isset($_SESSION['logged'])){
    $pass = Encrypt($_POST['pass']);
    $newpass = Encrypt($_POST['newpass']);
    $alumno = get_object_vars($_SESSION['logged']);
    $email = $alumno['email'];
    $control = AlumnoFunctions::alumno_getLogin($email,$pass);
    if($control){
        $res = AlumnoFunctions::changePass($newpass);
        if($res){
            echo 1;
        }else{
            echo $res;
        }
    }else{
        echo 'No se pudo realizar el cambio ya que la contrase&ntilde;a no coincide';
    }

}else{
    if($_POST['pass'] && isset($_SESSION['id_recovery_pass'])){
        $contrasena = Encrypt($_POST["pass"]);
        $res = AlumnoFunctions::changePass($contrasena);
        echo $res;
    }
}
die();
