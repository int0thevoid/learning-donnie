<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 13-11-16
 * Time: 23:31
 */

if(!empty($_SESSION['logged']) and !empty($_POST["id_mensaje"])){
    $id_mensaje = $_POST['id_mensaje'];
    $cant_likes = 0;
    if($id_mensaje > 0){
        if(forumFunctions::getLike($id_mensaje)){
            forumFunctions::deleteLike($id_mensaje);
        }else{
            forumFunctions::addLike($id_mensaje);
        }
        $cant_likes = forumFunctions::getLikes($id_mensaje);
    }

    echo $cant_likes;

}
die();