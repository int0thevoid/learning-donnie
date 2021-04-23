<?php
if(!empty($_POST['user']) and !empty($_POST['pass'])){
    $user = $_POST['user'];
    $pass = Encrypt($_POST['pass']);
    $logged = AlumnoFunctions::alumno_getLogin($user,$pass);
    if($logged){
        if($_POST["sesion"] == true){ ini_set('session.cookie_lifetime',time() + (60*60*24));}
        $_SESSION['logged'] = $logged;
        $_SESSION['time_online'] = time() - (60*6);
        echo 1;
    }else{
        if(AlumnoFunctions::alumno_comprobarMail($_POST['user'])){
            $result = '<div class="alert alert-dismissible alert-danger">';
            $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
            $result .= '<h4>Error:</h4>';
            $result .= '<p><strong>Los datos no coinciden</strong></p>';
            $result .= '</div>';
            echo $result;
        }else{
            $result = '<div class="alert alert-dismissible alert-warning">';
            $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
            $result .= '<h4>Error:</h4>';
            $result .= '<p><strong>Usuario no registrado</strong></p>';
            $result .= '</div>';
            echo $result;
        }

    }
}else{
    $result = '<div class="alert alert-danger" contenteditable="false">';
    $result .= '<br>';
    $result .= '<strong>ERROR: Debe ingresar todos los datos</strong>';
    $result .= '</div>';
    echo $result;
}
