<?php
if($_POST){
    require ('core/core.php');
    switch (isset($_GET['mode']) ? $_GET['mode'] : null){
        case 'login':
            require ('core/bin/ajax/goLogin.php');
            break;
        case 'reg':
            require ('core/bin/ajax/goReg.php');
            break;
        case 'grades':
	        require ('core/bin/ajax/goGrades.php');
            break;
        case 'curso':
            require ('core/bin/ajax/goCurso.php');
            break;
        case 'unidad':
            require ('core/bin/ajax/goUnidad.php');
            break;
        case 'leccion':
            require ('core/bin/ajax/goLeccion.php');
            break;
        case 'recoverypass':
            require ('core/bin/ajax/goRecoverypass.php');
            break;
        case 'changepass':
            require ('core/bin/ajax/goChangepass.php');
            break;
        case 'preguntas':
            require ('core/bin/ajax/goPreguntas.php');
            break;
        case 'alternativas':
            require ('core/bin/ajax/goAlternativas.php');
            break;
        case 'cursando_unidad':
            require ('core/bin/ajax/goCursandoUnidad.php');
            break;
        case 'forum':
            require ('core/bin/ajax/goForum.php');
            break;
        case 'discuss':
            require ('core/bin/ajax/goDiscuss.php');
            break;
        case 'like':
            require ('core/bin/ajax/goLike.php');
            break;
        case 'mail':
            require ('core/bin/ajax/goMail.php');
            break;
        default:
            header('Location: /?view=home');
            die();
            break;
    }
}else{
    switch (isset($_GET['log']) ? $_GET['log'] : null){
        case 'out':
            unset($_SESSION['logged']);
            session_destroy();
            header('Location: /?view=home');
            die();
            break;
            break;
        default:
            ;
    }
}

