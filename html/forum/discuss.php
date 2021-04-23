<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 02-11-16
 * Time: 22:22
 */

if(isset($_GET['discuss']) && $_GET['discuss']>0){
    $id_foro = $_GET['discuss'];
}else{
    header('location: ?view=home');
}
$foro = forumFunctions::forum_getForo($id_foro);
if($foro == false){
    header('Location: ?view=forum&goto=index');
}
$tema = forumFunctions::forum_getTema($foro['id_tema']);
$usuario = get_object_vars($_SESSION['logged']);
include(HTML_DIR.'/overall/head.php');
include(HTML_DIR.'/overall/navBar.php')?>
    <section class="engine"><a rel="external" href="http://www.learningdonnie.cl">Learning Donnie</a>
    </section>

    <section style="background-color: rgb(193, 193, 193);">
        <div class="mbr-section__container mbr-section__container--isolated" style="background-color: rgb(193, 193, 193);">
            <div class="container">
                <div class="row -align-center">

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="content" style="padding-top: 50px;">
            <?php

            $cantidad_comentarios = forumFunctions::forum_getTotalComentariosForo($id_foro);
            $total_paginas = ceil($cantidad_comentarios / 10);
            if(isset($_GET['pag']) && $_GET['pag'] > 0 && $_GET['pag'] <= $total_paginas){$pagina = $_GET['pag'];}else{$pagina = 1;};
            $cantidad_comentarios = forumFunctions::forum_getTotalRegistroForos($id_foro);

            if($pagina < 2){
                $inicio = 0;
            }else{
                $inicio = (10 * ($pagina - 1));
            }
            $arrayComentarios = forumFunctions::forum_getListadoComentarios($id_foro, $inicio, $foro['id_main_mensaje']);
            $alumno_creador = AlumnoFunctions::getAlumno($foro['id_alumno']);
            $alumno_creador = get_object_vars($alumno_creador);
            ?>
            <div class="row container" style="margin: auto; align-content: center;" id="idDivMsgForumDiscuss">
                <?php

                if($usuario['estado'] < 1){
                    echo '<div class="alert alert-dismissible alert-warning">';
                    echo '<button type="button" class="close" data-dismiss="alert">x</button>';
                    echo '<h4>Usuario no activado</h4>';
                    echo '<p><strong>Debe activar su cuenta para poder aportar en este tema</strong></p>';
                    echo '</div>';
                }?>
            </div>
            <div class="row container" style="margin: auto; align-content: center;">
                <ul class="breadcrumb" style="background-color: #b8312f">
                    <?php echo '<li><a class="text-white" style="cursor: pointer" href="?view=forum&goto=index">Learning Donnie</a></li>';
                     echo '<li><a class="text-white" style="cursor: pointer" href="?view=forum&goto=theme&theme='.$tema['id_tema'].'">'.$tema['nombre'].'</a></li>'; ?>
                    <li class="active text-white" ><?php echo $foro['nombre'] ?></li>
                </ul>
            </div>
            <div class="container panel panel-default">
                <div class="row">
                    <div class="panel-heading text-white" style="background-color: #b8312f;">
                        <i class="fa fa-lg fa-comments"></i>
                        <strong><?php echo $foro['nombre'] ?></strong>&nbsp;&nbsp;-&nbsp;
                        <strong> <?php echo $foro['descripcion'] ?></strong>
                    </div>
                    <div class="panel-body " style="background-color: #b8312f;">
                        <div class="col-md-1 col-lg-1 col-sm-2 col-xs-2 text-white" style="background-color: #b8312f; margin-bottom: 10px" >
                            <div class="short-div">
                                <img class="img-responsive" src="/views/assets/images/profiles/avatar.png">
                            </div>
                        </div>
                        <div class="short-div text-white" style="margin-left: 10px">&nbsp;&nbsp;&nbsp;<?php echo $alumno_creador['nombre'].' '.$alumno_creador['apellido'];
                            if($foro['id_alumno'] == $usuario['id_alumno']){ echo '<button class="btn btn-xs btn-warning pull-right" onclick="openEditarForo('.$id_foro.')">Editar tema</button>'; }?></div>
                        <div class="short-div text-white" style="margin-left: 10px">&nbsp;&nbsp;&nbsp;<?php echo $alumno_creador['semestre'].'&deg; Semestre'; ?></div>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="padding-top: 13px;padding-bottom: 13px; background-color: white"> <?php echo $foro['mensaje'] ?> </div>
                        <div class="col-md-12 col-xs-12 -align-right text-white" style="background-color: #b8312f; height: 35px;">
                            <label style="margin-top: 15px;">Publicado el <?php echo $foro['fecha']; ?> a las <?php echo $foro['hora']; ?></label>
                            <div class="pull-right" style="margin-top: 5px;">
                            <label class="" onclick="goLike(this)" id="<?php echo $foro["id_main_mensaje"]?>" style="margin-top: 5px; cursor: pointer"> <?php echo $foro['cant_like']; ?></label>&nbsp;&nbsp;
                                <span class="fa fa-2x fa-thumbs-up"></span>&nbsp;
                                <span class="fa fa-1x fa-plus-circle"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body"></div>

                    <?php
                    if($arrayComentarios){
                        foreach ($arrayComentarios as $comentario){
                            echo '<div class="row">';
                            $alumno_creador = AlumnoFunctions::getAlumno($comentario['id_alumno']);
                            $alumno_creador = get_object_vars($alumno_creador);

                            echo '<div class="panel-body " style="background-color: #b8312f;">';
                                echo '<div class="col-md-1 col-lg-1 col-sm-2 col-xs-2 text-white" style="background-color: #b8312f; margin-bottom: 10px">';
                                    echo '<div class="short-div">';
                                        echo '<img class="img-responsive" src="/views/assets/images/profiles/avatar.png">';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="short-div text-white" style="margin-left: 10px">&nbsp;&nbsp;&nbsp;'.$alumno_creador['nombre'].' '.$alumno_creador['apellido'];
                                    if($alumno_creador['id_alumno'] == $usuario['id_alumno']) {
                                        echo '<button class="btn btn-xs btn-warning pull-right" value='.$comentario['id_mensaje'].' onclick="openEditarComentario(this)">Editar contenido</button>';
                                    }
                                    echo '</div>';
                                    echo '<div class="short-div text-white" style="margin-left: 10px">&nbsp;&nbsp;&nbsp;'.$alumno_creador['semestre'].'&deg; Semestre</div>';
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="padding-top: 13px;padding-bottom: 13px; background-color: white">'.$comentario['mensaje'].'</div>';
                                echo '<div class="col-md-12 col-xs-12 -align-right text-white" style="background-color: #b8312f; height: 35px;">';
                                    echo '<label style="margin-top: 15px;">Publicado el '.$comentario['fecha'].' a las '.$comentario['hora'].'</label>';
                    echo '<div class="pull-right" style="margin-top: 5px;">';
                        echo '<label class="" onclick="goLike(this)" id="'.$comentario['id_mensaje'].'" style="margin-top: 5px; cursor: pointer">'.$comentario['cant_like'].'</label>&nbsp;&nbsp;';
                        echo '<span class="fa fa-2x fa-thumbs-up"></span>&nbsp;';
                        echo '<span class="fa fa-1x fa-plus-circle"></span>';
                    echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="panel-body"></div>';

                        }
                    }else{

                        echo '<div class="panel-body">';
                        echo '<div class="col-md-12 text-center"><h3> No hay r&eacute;plicas en este tema</h3></div>';
                        echo '</div>';
                    }
                                    echo '</div>';
                    $paginas = ($total_paginas == 0) ? 1 : $total_paginas;
                    ?>

                    <div class="container panel-footer">
                        <ul class="pagination pagination-sm list-inline" style="margin-top: 0px; padding-top: 0px; border-top: 0px;">
                        <?php
                            for ($i = 1; $i <= $paginas; $i++){

                                if($i == $pagina){
                                    echo '<li class="active">';
                                    echo '<a>';
                                }else{
                                    echo '<li>';
                                    echo '<a href="?view=forum&goto=discuss&discuss='.$foro['id_foro'].'&pag='.$i.'">';
                                }
                                echo $i;
                                echo '</a>';
                                echo '</li>';
                            }
                        ?>
                        </ul>
                        <?php
                        if($usuario['estado'] > 0){
                            echo '<a class="btn btn-primary btn-md pull-right"  data-toggle="modal" data-target="#commentModal">';
                        }else{
                            echo '<a class="btn btn-primary disabled btn-md pull-right">';
                        }
                        ?>
                        Agregar comentario
                        </a>
                    </div>
                    <div class="panel-body"></div>
                </div>
            </div>

        </div>
    </section>




    <!-- agregar foros -->

    <div id="commentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div id="idDivMsgModalComment"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar comentario &nbsp;<i class="fa fa-plus-circle"></i></h4>
                </div>
                <div class="modal-body form -align-center">

                    <!--
                    <div class="form-inline" style="margin-bottom: 5px;margin-top: 5px;">
                        <a onclick="insertarImagen_url()"><i title="Insertar Imagen desde una URL" class="fa fa-2x fa-image -align-left"></i></a>
                        &nbsp;
                        <a onclick="insertarLink()" title="Insertar Link"><i class="fa fa-link fa-2x"></i></a>
                    </div>
                    -->
                    <textarea placeholder="Ingrese el contenido aqu&iacute;" id="idComentario" class="form-control" style="resize: none"></textarea>

                </div>
                <div class="modal-footer">

                    <?php echo '<button type="submit" id="idBtnSubmitDiscuss" class="btn btn-default" onclick="agregarComentario('.$id_foro.','.$pagina.')">Agregar comentario</button>'; ?>
                    <button type="button" class="btn btn-default" id="btnDismissForumModal" data-dismiss="modal">Salir</button>
                </div>
            </div>

        </div>
    </div>

    <div id="editMainComment" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div id="idDivMsgModalEditForum"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar tema &nbsp;<i class="fa fa-edit"></i></h4>
                </div>
                <div class="modal-body form -align-center">
                    <input type="hidden" id="idEditForo">
                    <input type="hidden" id="idEditForoMensaje">
                    <input type="hidden" id="idEditForoTema">
                    <div class="form-group"><input class="form-control" id="idEditTituloForo" minlength="5" maxlength="70" placeholder="T&iacute;tulo del tema"></div>
                    <div class="form-group"><input class="form-control" id="idEditDescForo" maxlength="70" placeholder="Decsripci&oacute;n del tema"></div>
                    <!--
                    <div class="form-inline" style="margin-bottom: 5px;margin-top: 5px;">
                        <a onclick="insertarImagen_url()"><i title="Insertar Imagen desde una URL" class="fa fa-2x fa-image -align-left"></i></a>
                        &nbsp;
                        <a onclick="insertarLink()" title="Insertar Link"><i class="fa fa-link fa-2x"></i></a>
                    </div>
                    -->
                    <textarea placeholder="Ingrese el contenido aqu&iacute;" maxlength="500" id="idEditContenidoForo" class="form-control" style="resize: none"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="idBtnEditForum" class="btn btn-default btn-sm" onclick="editarForo()"><i class="fa fa-edit"></i> Editar</button>&nbsp;
                    <button type="submit" id="idBtnDeleteForum" class="btn btn-default btn-sm" onclick="eliminarForo()"><i class="fa fa-trash"></i> Eliminar</button>&nbsp;
                    <button type="button" class="btn btn-default btn-sm" id="btnDismissEditForumModal" data-dismiss="modal"><i class="fa fa-close"></i> Salir</button>
                </div>
            </div>

        </div>
    </div>


    <div id="editComment" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div id="idDivMsgModalEditComment"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle"></i></button>
                    <h4 class="modal-title">Edite comentario &nbsp;<i class="fa fa-edit"></i></h4>
                </div>
                <div class="modal-body form -align-center">
                    <input type="hidden" id="idEditComment" value="">
                    <!--
                    <div class="form-inline" style="margin-bottom: 5px;margin-top: 5px;">
                        <a onclick="insertarImagen_url()"><i title="Insertar Imagen desde una URL" class="fa fa-2x fa-image -align-left"></i></a>
                        &nbsp;
                        <a onclick="insertarLink()" title="Insertar Link"><i class="fa fa-link fa-2x"></i></a>
                    </div>
                    -->
                    <textarea placeholder="Ingrese el contenido aqu&iacute;" id="idEditTextAreaComment" class="form-control" style="resize: none"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="idBtnEditDiscuss" class="btn btn-default btn-sm" onclick="editarComentario()"><i class="fa fa-edit"></i> Editar</button>&nbsp;
                    <button type="submit" id="idBtnDeleteDiscuss" class="btn btn-default btn-sm" onclick="eliminarComentario()"><i class="fa fa-trash"></i> Eliminar</button>&nbsp;
                    <button type="button" class="btn btn-default btn-sm" id="btnDismissForumModal" data-dismiss="modal"><i class="fa fa-close"></i> Salir</button>
                </div>
            </div>

        </div>
    </div>
    <script src="/views/js/forum.js"></script>
<?php include(HTML_DIR.'/overall/footer.php'); ?>