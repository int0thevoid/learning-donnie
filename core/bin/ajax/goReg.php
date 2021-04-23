<?php
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contrasena = Encrypt($_POST["pass"]);
    $semestre = $_POST["semestre"];
    $control = AlumnoFunctions::alumno_comprobarMail($email);
    if(!$control){
        $resp = AlumnoFunctions::alumno_addAlumno($nombre,$apellido,$email,$contrasena,$semestre);
        if($resp){
            switch ($resp){
                case 1:
                    $result = '<div class="alert alert-dismissible alert-success">';
                    $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
                    $result .= '<h4>Listo!:</h4>';
                    $result .= '<p><strong>Se ha registrado el usuario pero no se ha enviado el correo de validaci&oacute;n</strong></p>';
                    $result .= '</div>';
                    echo $result;
                    break;
                case 2:
                    $result = '<div class="alert alert-dismissible alert-danger">';
                    $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
                    $result .= '<h4>Error:</h4>';
                    $result .= '<p><strong>No se ha realizado el registro de usuario</strong></p>';
                    $result .= '</div>';
                    echo $result;
                    break;
                case 3:
                    $result = '<div class="alert alert-dismissible alert-warning">';
                    $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
                    $result .= '<h4>Error:</h4>';
                    $result .= '<p><strong>Se ha realizado el registro pero hubo un problema al insertar el codigo de registro</strong></p>';
                    $result .= '</div>';
                    echo $result;
                    break;
                case 4:
                    echo 1;
                    break;
                default:
                    echo "ERROR";
                    break;
            }
        }else{
            $result = '<div class="alert alert-dismissible alert-danger">';
            $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
            $result .= '<h4>Error:</h4>';
            $result .= '<p><strong>No identificado, contacte al administrador del sistema</strong></p>';
            $result .= '</div>';
        }
    }else{
        $result = '<div class="alert alert-dismissible alert-danger">';
        $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
        $result .= '<h4>Error:</h4>';
        $result .= '<p><strong>El correo electronico ya se encuentra en uso</strong></p>';
        $result .= '</div>';
        echo $result;
    }


