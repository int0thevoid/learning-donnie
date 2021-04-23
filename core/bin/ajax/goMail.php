<?php

if(isset($_SESSION['logged']) && !empty($_POST['op'])){
    switch ($_POST['op']){
        case 'reg':
            $registro = RegistroFunctions::registro_getRegistroAlumno();
            $code = $registro['codigo'];
            $alumno = get_object_vars($_SESSION['logged']);
            $to = $alumno['email'];
            $nombre = $alumno['nombre'];
            if(sendMail('reg', $to, $nombre, $code)){
                echo 1;
            }else{
                echo 'No se ha podido re-enviar el correo de registro';
            }
            break;
        case 'invite':
            $to = $_POST['to'];
            if(AlumnoFunctions::alumno_comprobarMail($to)){
                echo 'El alumno ya se encuentra registrado en Learning Donnie';
            }else{
                $alumno = get_object_vars($_SESSION['logged']);
                $nombre = $alumno['nombre'].' '.$alumno['apellido'];
                if(sendMail('invite', $to, $nombre, null)){
                    echo 1;
                }else{
                    echo 'No se ha podido enviar la invitaci&oacute;n';
                }
            }
            break;
    }
}
die();