<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 03-11-16
 * Time: 21:34
 */


$alumno = get_object_vars($_SESSION['logged']);
switch ($_POST['op']){
    case 'add':
        if(!empty($_POST['id_foro']) && !empty($_POST['comentario']) && $alumno['estado'] > 0){
            $id_foro = $_POST['id_foro'];
            $comentario = $_POST['comentario'];
            $resp = forumFunctions::forum_addComment($id_foro, $comentario);
            if($resp > 0){
                echo $resp;
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
        break;
    case 'delete':
        if(isset($_SESSION['logged']) && !empty($_POST['id_comentario'])){
            $id_comentario = $_POST['id_comentario'];
            if(forumFunctions::forum_deleteComment($id_comentario)){
                echo 1;
            }else{
                $result = '<div class="alert alert-dismissible alert-danger">';
                $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
                $result .= '<h4>Error!</h4>';
                $result .= '<p><strong>No se ha podido eliminar su comentario</strong></p>';
                $result .= '</div>';
                echo $result;
            }
        }
        break;
    case 'edit':
        if(isset($_SESSION['logged']) && !empty($_POST['id_comentario']) && !empty($_POST['comentario'])){
            $id_comentario = $_POST['id_comentario'];
            if(forumFunctions::forum_editComment($id_comentario, $_POST['comentario'])){
                echo 1;
            }else{
                $result = '<div class="alert alert-dismissible alert-danger">';
                $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
                $result .= '<h4>Error!</h4>';
                $result .= '<p><strong>No se ha podido modificar su comentario</strong></p>';
                $result .= '</div>';
                echo $result;
            }
        }
        break;
    case 'get':
        if(isset($_SESSION['logged']) && !empty($_POST['id_comentario'])){
            $id_comentario = $_POST['id_comentario'];
            $arrayComentario = forumFunctions::forum_getComment($id_comentario);
            if($arrayComentario){
                echo json_encode($arrayComentario);
            }else{
                $result = '<div class="alert alert-dismissible alert-danger">';
                $result .= '<button type="button" class="close" data-dismiss="alert">x</button>';
                $result .= '<h4>Error!</h4>';
                $result .= '<p><strong>No se ha podido eliminar su comentario</strong></p>';
                $result .= '</div>';
                echo FALSE;
            }
        }
        break;
    default:
        echo FALSE;
        break;
}
die();
