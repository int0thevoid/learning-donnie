<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 13-08-2016
 * Time: 10:49
 */
$db = new Conexion();
$email = $db->real_escape_string($_POST['email']);
$sql = $db->query("SELECT id_alumno, nombre  FROM alumno WHERE email = '$email' LIMIT 1");
if($db->rows($sql)>0){
    $data = $db->recorrer($sql);
    $id = $data[0];
    $nombre = $data[1];
    $keypass = strtoupper(substr(sha1(time()),0,5));
    $link = "www.learningdonnie.cl/?view=recoverypass&key=".$keypass;
    if(enviarCorreo($email,$nombre,$link)){
        $db->query("UPDATE alumno SET keypass = '$keypass' WHERE id_alumno = $id");
        $msg = 1;
    }else{
        $msg = '<div class="alert alert-dismissible alert-danger">';
        $msg .= '<button type="button" class="close" data-dismiss="alert">x</button>';
        $msg .= '<h4>Error:</h4>';
        $msg .= '<p><strong>Hubo un problema al enviar la solicitud</strong></p>';
        $msg .= '</div>';
    }
}else{
    $msg = '<div class="alert alert-dismissible alert-danger">';
    $msg .= '<button type="button" class="close" data-dismiss="alert">x</button>';
    $msg .= '<h4>Error:</h4>';
    $msg .= '<p><strong>No se ha encontrado el email indicado</strong></p>';
    $msg .= '</div>';
}
$db->liberar($sql);
$db->close();
echo $msg;

function enviarCorreo($para, $nombre, $link){
    $mensaje = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">';
    $mensaje .= "<title>Recuperaci&oacute;n de contrase&ntilde;a</title>";
    $mensaje .= "</head><body>";
    $mensaje .= "<table height='650px' width='600px' border='0' style='text-align: left'>";
    $mensaje .= "<tr><td><span style='font-size: 20px'>Estimado ".$nombre."</span></td></tr>";
    $mensaje .= "<tr><td><span style='font-size: 20px'>Usted ha solicitado una recuperaci&oacute;n de contrase&ntilde;a en su cuenta de Learning Donnie asociada a este correo</span></td></tr>";
    $mensaje .= "<tr><td><span style='font-size: 15px'>Para registrar una nueva contrase&ntilde;a, haga click en el siguiente enlace</span></td></tr>";
    $mensaje .= "<tr><td><span style='font-size: 15px'><a target='_blank' lang='ES' href='$link'>aqu&iacute;</a></span></td></tr>";
    $mensaje .= "<tr><td><span style='font-size: 15px'>Por el contrario, ignore este mensaje. Muchas gracias por su colaboraci&oacute;n</span></td></tr>";
    $mensaje .= "<tr><td><img style='display:block; alignment-adjust: left' align='middle' src='http://www.learningdonnie.cl/views/images/ldonnie-mail.jpeg' alt='Learning Donnie :)' height='300' width='300'></td></tr>";
    $mensaje .= "</table>";
    $mensaje .= "</body></html>";
    $header = "MIME-Version: 1.0 \r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
    $header .= "From: Learning Donnie <info@learningdonnie.cl>";
    $asunto = "Validacion de cuenta Learning Donnie";
    if(mail($para,$asunto,$mensaje,$header)){ //Comprobamos si el correo fue enviado
        $respuesta = TRUE;
    }else{
        $respuesta = FALSE;
    }
    return $respuesta;
}
/*function enviarCorreo($para, $nombre, $link){
    $mensaje = '<html>';
    $mensaje .= "<body style='background: #FFFFFF ; font-family: Verdana ; font-size: 14px;color: #1c1b1b;'>";
    $mensaje .= "<div style=''>";
    $mensaje .= "<h2>Hola .$nombre</h2>";
    $mensaje .= "<p style='font-size: 17px;'>Hemos recibido una solicitud de cambio de contrase&ntilde;a</p>";
    $mensaje .= '<p>Si efectivamente se ha solicitado, debes hacer click en el siguiente enlace: <a style="font-weight: bold ; color: #953b39" href="'.$link.'" target="_blank">click aqu&iacute;</a></p>';
    $mensaje .= "<p>En caso contrario, por favor ignora este mensaje.</p>";
    $mensaje .= "</div>";
    $mensaje .= "</body></html>";
    $header = "MIME-Version: 1.0 \r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
    $header .= "From: Learning Donnie <info@learningdonnie.cl>";
    $asunto = "Recuperaci&oacute;n de contrase&ntilde;a de cuenta Learning Donnie";
    if(mail($para,$asunto,$mensaje,$header)){ //Comprobamos si el correo fue enviado
        $respuesta = TRUE;
    }else{
        $respuesta = FALSE;
    }
    return $respuesta;
}*/