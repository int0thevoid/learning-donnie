<?php


function expand($str){
    global $queries;

    $text = $queries[$str];
    var_dump($text);
    $numargs = func_num_args();
    for($i=1;$i<$numargs;){
        $model = "%" . func_get_arg($i++) . "%";

        $replace = func_get_arg($i++);
        var_dump("<br>");
        var_dump($replace);

        $text = str_replace($model, $replace, $text);
    }
    return $text;
}

function debug($var){
    echo "<pre>"; var_dump($var); echo "</pre>";
    return 1;
}

function checkPOST($parameter, $value, $tipe=""){
    if(isset($_POST[$parameter])){
        if($tipe == "num"){
            if(is_numeric($_POST[$parameter])){
                return trim($_POST[$parameter]);
            }else{
                return 0;
            }
        }
    }else{
        return $value;
    }
}

function checkGET($parameter, $value, $tipe=""){
    if(isset($_GET[$parameter])){
        if($tipe == "num"){
            if(is_numeric($_GET[$parameter])){
                return trim($_GET[$parameter]);
            }else{
                return 0;
            }
        }
    }else{
        return $value;
    }
}

function generarCodigo(){
    $lenght=10;
    $source = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    if($lenght>0){
        $rstr = "";
        $source = str_split($source,1);
        for ($i=1; $i <=$lenght ; $i++) {
            mt_srand((double)microtime()*1000000);
            $num = mt_rand(1, count($source));
            $rstr .= $source[$num-1];
        }
    }
    return $rstr;
}

function sendMail($op, $to, $nombre, $extra){
    $msg = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">';
    $msg_aux = "";
    $subject = "";
    $tittle = "";
    if($op == "reg"){
        $tittle = "Validaci&oacuten Learning Donnie";
        $msg_aux = "<table height='650px' width='600px' border='0' style='text-align: left'>";
        $msg_aux .= "<tr><td><span style='font-size: 20px'>\r\n Estimado ".$nombre."</span></td></tr>";
        $msg_aux .= "<tr><td><span style='font-size: 20px'>\r\n Usted se ha registrado en la plataforma WEB para estudios de INACAP Learning Donnie</span></td></tr>";
        $msg_aux .= "<tr><td><span style='font-size: 15px'>\r\n su codigo de verificacion es: ".$extra."</span></td></tr>";
        $msg_aux .= "<tr><td><span style='font-size: 15px'>\r\n Para activar su cuenta haga click <a target='_blank' lang='ES' href='www.learningdonnie.cl/?view=activate&code=$extra'>aqu&iacute;</a></span></td></tr>";
        $msg_aux .= "<tr><td><span style='font-size: 15px'>\r\n Muchas gracias por su colaboraci&oacute;n</span></td></tr>";
        $msg_aux .= "<tr><td><img style='display:block; alignment-adjust: left' align='middle' src='http://www.learningdonnie.cl/views/images/ldonnie-mail.jpeg' alt='Learning Donnie :)' height='300' width='300'></td></tr>";
        $msg_aux .= "</table>";        
        $subject = "Validacion de cuenta Learning Donnie";
    }elseif ($op == 'invite'){
        $tittle = "Invitaci&oacute;n Learning Donnie";
        $msg_aux = "<table height='650px' width='600px' border='0' style='text-align: left'>";
        $msg_aux .= "<tr><td><span style='font-size: 20px'>\r\n Estimado alumno</span></td></tr>";
        $msg_aux .= "<tr><td><span style='font-size: 20px'>\r\n Usted se ha sido invitado por ".$nombre." a la plataforma WEB para estudios de INACAP Learning Donnie</span></td></tr>";
        $msg_aux .= "<tr><td><span style='font-size: 15px'>\r\n Para crear una cuenta haga click <a target='_blank' lang='ES' href='http://www.learningdonnie.cl/?reg=true'>aqu&iacute;</a></span></td></tr>";
        $msg_aux .= "<tr><td><span style='font-size: 15px'>\r\n Muchas gracias por su colaboraci&oacute;n</span></td></tr>";
        $msg_aux .= "<tr><td><img style='display:block; alignment-adjust: left' align='middle' src='http://www.learningdonnie.cl/views/images/ldonnie-mail.jpeg' alt='Learning Donnie :)' height='300' width='300'></td></tr>";
        $msg_aux .= "</table>";
        $subject = "Invitaci&oacute;n a Learning Donnie";
    }
    $msg .= "<title>'.$tittle.'</title>";
    $msg .= "</head><body>";
    $msg .= $msg_aux;
    $msg .= "</body></html>";
    $msg = wordwrap($msg, 70, "\r\n");
    $header  = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header .= 'From: info@learningdonnie.cl' . "\r\n" .
        'Reply-To: info@learningdonnie.cl' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    if(mail($to, $subject,$msg,$header)){ //Comprobamos si el correo fue enviado
        $respuesta = TRUE;
    }else{
        $respuesta = FALSE;
    }

    return $respuesta;

}