<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 01-11-16
 * Time: 19:01
 */

if(isset($_SESSION['logged'])){
    $alumno = get_object_vars($_SESSION['logged']);
    switch ($_POST['op']){

        case 'add':
            if(!empty($_POST['id_tema']) &&!empty($_POST['nombre']) && !empty($_POST['cont']) && $alumno['estado'] > 0){
                $id_tema = $_POST['id_tema'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['desc'];
                $contenido = $_POST['cont'];
                $resp = forumFunctions::forum_addForum($id_tema, $nombre, $descripcion, $contenido);
                if($resp){
                    echo 1;
                }else{
                    echo $resp;
                }
            }
            break;
        case 'edit':
            if(!empty($_POST['titulo']) && !empty($_POST['comentario']) && !empty($_POST['id_foro']) && !empty($_POST['id_mensaje'])  && $alumno['estado'] > 0){
                $id_foro = $_POST['id_foro'];
                $id_mensaje = $_POST['id_mensaje'];
                $nombre = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $contenido = $_POST['comentario'];
                $resp = forumFunctions::forum_editForum($id_foro,$id_mensaje, $nombre, $descripcion, $contenido);
                if($resp){
                    echo 1;
                }else{
                    echo $resp;
                }
            }
            break;
        case 'get':
            if(!empty($_POST['id_foro']) && $alumno['estado'] > 0){
                echo json_encode(forumFunctions::forum_getForo($_POST['id_foro']));
            }
            break;
        case 'delete':
            if(!empty($_POST['id_foro'])){
                echo forumFunctions::forum_deleteForum($_POST['id_foro']);
            }
            break;
        default:
            echo false;
            break;
    }
}

die();