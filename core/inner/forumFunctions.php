<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 23-10-16
 * Time: 19:37
 */

class forumFunctions
{

    static function forum_getListadoCategorias(){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM foro_categoria ORDER BY id_categoria ASC");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_categoria   = $row[0];
                    $nombre         = $row[1];
                    $img_url        = $row[2];

                    $temp = Array(
                        'id_categoria'  => $id_categoria,
                        'nombre'        => $nombre,
                        'img_url'       => $img_url
                    );

                    $arrayCategorias[] = $temp;
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $arrayCategorias;
    }

    static function forum_getListadoTemas($id_categoria){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM foro_tema WHERE id_categoria = $id_categoria ORDER BY id_tema ASC");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_tema        = $row[0];
                    $id_categoria   = $row[1];
                    $nombre         = $row[2];
                    $descripcion    = $row[3];
                    $img_url        = $row[4];
                    $cant_foro      = $row[5];

                    $temp = Array(
                        'id_tema'       => $id_tema,
                        'id_categoria'  => $id_categoria,
                        'nombre'        => $nombre,
                        'descripcion'   => $descripcion,
                        'img_url'       => $img_url,
                        'cant_foro'     => $cant_foro
                    );

                    $arrayTemas[] = $temp;
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $arrayTemas;
    }

    static function forum_getForo($id_foro){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM foro_foro INNER JOIN foro_mensaje ON id_main_mensaje WHERE foro_foro.id_main_mensaje = foro_mensaje.id_mensaje AND foro_foro.id_foro = $id_foro");
        $temp = false;
        if($query){
            if($db->rows($query) > 0){
                while ($row = $db->recorrer($query)){
                    $id_foro = $row[0];
                    $id_alumno = $row[1];
                    $id_tema = $row[2];
                    $id_main_mensaje = $row[3];
                    $nombre = $row[4];
                    $descripcion = $row[5];
                    $cant_mensajes = $row[6];
                    $fecha = $row[10];
                    $hora = $row[11];
                    $mensaje = $row[12];
                    $cant_like = $row[13];

                    $temp = Array(
                        'id_foro' => $id_foro,
                        'id_alumno' => $id_alumno,
                        'id_tema' => $id_tema,
                        'id_main_mensaje' => $id_main_mensaje,
                        'nombre' => $nombre,
                        'descripcion' => $descripcion,
                        'cant_mensajes' => $cant_mensajes,
                        'fecha' => $fecha,
                        'hora' => $hora,
                        'mensaje' => $mensaje,
                        'cant_like' => $cant_like
                    );
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $temp;
    }

    static function forum_getTema($id_tema){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM foro_tema WHERE id_tema = $id_tema LIMIT 1");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_tema        = $row[0];
                    $id_categoria   = $row[1];
                    $nombre         = $row[2];
                    $descripcion    = $row[3];
                    $img_url        = $row[4];
                    $cant_foro      = $row[5];

                    $temp = Array(
                        'id_tema'       => $id_tema,
                        'id_categoria'  => $id_categoria,
                        'nombre'        => $nombre,
                        'descripcion'   => $descripcion,
                        'img_url'       => $img_url,
                        'cant_foro'     => $cant_foro
                    );
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $temp;
    }

    static function forum_getTotalForosTema($id_tema){
        $db = new Conexion();

        $query = $db->query("SELECT COUNT(id_foro) FROM foro_foro WHERE id_tema = $id_tema");
        $totalForosTema = $db->recorrer($query)[0];
        return $totalForosTema;
    }

    static function forum_getTotalComentariosForo($id_foro){
        $db = new Conexion();

        $query1 = $db->query("SELECT COUNT(id_mensaje) FROM foro_mensaje WHERE id_foro = $id_foro");
        while ($row = $db->recorrer($query1)){
            $total_mensajes = $row[0];
        }

        $db->liberar($query1);
        $db->close();
        return $total_mensajes;
    }

    static function forum_getListadoComentarios($id_foro, $inicio, $main_mensaje){
        $db = new Conexion();

        $query = $db->query("SELECT * FROM foro_mensaje WHERE id_foro = $id_foro AND id_mensaje NOT LIKE $main_mensaje ORDER BY id_mensaje DESC LIMIT $inicio, 10");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_mensaje = $row[0];
                    $id_alumno  = $row[1];
                    $fecha      = $row[2];
                    $hora       = $row[3];
                    $mensaje    = $row[4];
                    $cant_like  = $row[5];
                    $id_foro    = $row[6];

                    $temp = Array(
                        'id_mensaje'    => $id_mensaje,
                        'id_alumno'     => $id_alumno,
                        'fecha'         => $fecha,
                        'hora'          => $hora,
                        'mensaje'       => $mensaje,
                        'cant_like'     => $cant_like,
                        'id_foro'       => $id_foro
                    );

                    $arrayMensajes[] = $temp;
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $arrayMensajes;
    }

    static function forum_getTotalRegistroForos($id_tema){
        $db = new Conexion();

        $query1 = $db->query("SELECT COUNT(id_foro) FROM foro_foro WHERE id_tema = $id_tema");
        while ($row = $db->recorrer($query1)){
            $total_foros = $row[0];
        }
        return $total_foros;

    }


    static function forum_getListadoForos($id_tema, $inicio){
        $db = new Conexion();

        $query = $db->query("SELECT * FROM foro_foro WHERE id_tema = $id_tema ORDER BY id_foro DESC LIMIT $inicio, 10");
        if($query){
            if ($db->rows($query) < 1) {
                return false;
                /** @noinspection PhpUnreachableStatementInspection */
                exit;
            } else {
                while ($row = $db->recorrer($query)) {
                    $id_foro         = $row[0];
                    $id_alumno       = $row[1];
                    $id_tema         = $row[2];
                    $id_main_mensaje = $row[3];
                    $nombre          = $row[4];
                    $descripcion     = $row[5];
                    $cant_mensajes   = $row[6];
                    $n_rol           = $row[7];

                    $temp = Array(
                        'id_foro'         => $id_foro,
                        'id_alumno'       => $id_alumno,
                        'id_tema'         => $id_tema,
                        'id_main_mensaje' => $id_main_mensaje,
                        'nombre'          => $nombre,
                        'descripcion'     => $descripcion,
                        'cant_mensajes'   => $cant_mensajes,
                        'n_rol'           => $n_rol
                    );

                    $arrayForos[] = $temp;
                }
            }
            $db->liberar($query);
            $db->close();
        }
        return $arrayForos;
    }

    static function forum_addComment($id_foro, $contenido){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];
        $date = $db->real_escape_string(date('Y-m-d'));
        $time = $db->real_escape_string(date("H:i:s"));
        $mensaje = $db->real_escape_string($contenido);


        $db->query("INSERT INTO foro_mensaje (id_alumno, fecha, hora, mensaje, id_foro) VALUES ($id_alumno, '$date', '$time', '$mensaje', $id_foro)");
        $id_mensaje = mysqli_insert_id($db);
        $total_comentarios = self::forum_getTotalComentariosForo($id_foro);
        $db->query("UPDATE foro_foro SET cant_mensajes = $total_comentarios WHERE id_foro = $id_foro");

        return $id_mensaje;
    }

    static function forum_addForum($id_tema, $nombre, $descripcion, $contenido){
        $db = new Conexion();
        $nombre = $db->real_escape_string($nombre);
        $descripcion = $db->real_escape_string($descripcion);
        $control = false;
        if($id_tema > 0 && strlen($nombre) > 0 && strlen($contenido) > 0){
            $alumno = get_object_vars($_SESSION['logged']);
            $id_alumno = $alumno['id_alumno'];
            $db->query("INSERT INTO foro_foro (id_alumno, id_tema, nombre, descripcion, n_rol) VALUES ($id_alumno, $id_tema, '$nombre', '$descripcion', 0)");
            $id_foro = mysqli_insert_id($db);

            $totalForosTema = self::forum_getTotalForosTema($id_tema);
            $db->query("UPDATE foro_tema SET cant_foro = $totalForosTema WHERE id_tema = $id_tema");

                $id_mensaje = self::forum_addComment($id_foro, $contenido);
                if($id_mensaje > 0){
                    $db->query("UPDATE foro_foro SET id_main_mensaje = $id_mensaje WHERE id_foro = $id_foro");
                    $control = true;
                }

        }
        $db->close();
        return $control;
    }

    static function forum_editForum($id_foro, $id_mensaje, $nombre, $descripcion, $contenido){
        $db = new Conexion();
        $nombre = $db->real_escape_string($nombre);
        $descripcion = $db->real_escape_string($descripcion);
        $mensaje = $db->real_escape_string($contenido);
        $db->query("UPDATE foro_foro SET nombre = '$nombre', descripcion = '$descripcion' WHERE id_foro = $id_foro");
        $db->query(("UPDATE foro_mensaje SET mensaje = '$mensaje' WHERE id_mensaje = $id_mensaje"));
        $db->close();
        return 1;
    }

    static function forum_deleteComment($id_comentario){
        $comentario = self::forum_getComment($id_comentario);
        $db = new Conexion();

        $id_foro = $comentario[0]['id_foro'];
        $resp = $db->query("DELETE FROM foro_mensaje WHERE id_mensaje = $id_comentario");

        $total_comentarios = self::forum_getTotalComentariosForo($id_foro);
        $total_comentarios -= 1;

        $db->query("UPDATE foro_foro SET cant_mensajes = $total_comentarios WHERE id_foro = $id_foro");

        $db->close();
        return $resp;
    }

    static function forum_deleteForum($id_foro){
        $foro = self::forum_getForo($id_foro);
        $id_tema = $foro['id_tema'];
        $db = new Conexion();
        $db->query("DELETE FROM foro_mensaje WHERE id_foro = $id_foro");
        $db->query("DELETE FROM foro_foro WHERE id_foro = $id_foro");
        $total_foros = self::forum_getTotalForosTema($id_tema);
        $total_foros -= 1;
        $db->query("UPDATE foro_tema SET cant_foro = $total_foros WHERE id_tema = $id_tema");
        $db->close();
        return 1;
    }

    static function forum_getComment($id_comentario){
        $db = new Conexion();
        $query = $db->query("SELECT * FROM foro_mensaje WHERE id_mensaje = $id_comentario ");
        if ($db->rows($query) < 1) {
            return false;
            /** @noinspection PhpUnreachableStatementInspection */
            exit;
        } else {
            $array_mensaje = array();
            while ($row = $db->recorrer_assoc($query)){
                $array_mensaje[] = $row;
            }
        }
        $db->liberar($query);
        $db->close();
        return $array_mensaje;
    }

    static function forum_editComment($id_comentario, $comentario){
        $db = new Conexion();
        $comentario = $db->real_escape_string($comentario);
        $resp = $db->query("UPDATE foro_mensaje SET mensaje = '$comentario' WHERE id_mensaje = $id_comentario");
        $db->close();
        return $resp;
    }

    static function getLikes($id_mensaje){
        $db = new Conexion();
        $query = $db->query("SELECT COUNT(id_like) FROM foro_like WHERE id_mensaje = $id_mensaje");
        $cant_likes = 0;
        if ($db->rows($query) > 0) {

            while ($row = $db->recorrer($query)){
                $cant_likes = $row[0];
            }
        }
        $db->liberar($query);
        $db->close();
        return $cant_likes;
    }

    static function getLike($id_mensaje){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];
        $query = $db->query("SELECT id_like FROM foro_like WHERE id_mensaje = $id_mensaje AND id_alumno = $id_alumno");
        $like = false;
        if ($db->rows($query) < 1) {
            return false;
            /** @noinspection PhpUnreachableStatementInspection */
            exit;
        } else {

            while ($row = $db->recorrer_assoc($query)){
                $like = true;
            }
        }
        $db->liberar($query);
        $db->close();
        return $like;
    }

    static function addLike($id_mensaje){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];

        $db->query("INSERT INTO foro_like (id_alumno, id_mensaje) VALUES ($id_alumno, $id_mensaje)");
        $id_like = mysqli_insert_id($db);
        $cant_like = self::getLikes($id_mensaje);
        $db->query("UPDATE foro_mensaje SET cant_like = $cant_like WHERE id_mensaje = $id_mensaje");

        return $id_like;
    }

    static function deleteLike($id_mensaje){
        $db = new Conexion();
        $alumno = get_object_vars($_SESSION['logged']);
        $id_alumno = $alumno['id_alumno'];
        $resp = $db->query("DELETE FROM foro_like WHERE id_mensaje = $id_mensaje AND id_alumno = $id_alumno");
        $cant_likes = self::getLikes($id_mensaje);
        $db->query("UPDATE foro_mensaje SET cant_like = $cant_likes WHERE id_mensaje = $id_mensaje");
        $db->close();
        return $resp;
    }

}