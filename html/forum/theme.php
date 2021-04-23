<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 24-10-16
 * Time: 09:12
 */

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

            if(isset($_GET['theme']) && $_GET['theme']>0){
                $id_tema = $_GET['theme'];
            }else{
                header('location: ?view=home');
            }

            $cantidad_foros = forumFunctions::forum_getTotalRegistroForos($id_tema);
            $total_paginas = ceil($cantidad_foros / 10);
            if(isset($_GET['pag']) && $_GET['pag'] > 0 && $_GET['pag'] <= $total_paginas){$pagina = $_GET['pag'];}else{$pagina = 1;};

            if($pagina < 2){
                $inicio = 0;
            }else{
                $inicio = (10 * ($pagina - 1));
            }
            $arrayForos = forumFunctions::forum_getListadoForos($id_tema, $inicio);
            $tema = forumFunctions::forum_getTema($id_tema);
            ?>
            <div class="row container" style="margin: auto; align-content: center;">
                <ul class="breadcrumb" style="background-color: #b8312f">
                    <li><a class="text-white" style="cursor: pointer" href="?view=forum&goto=index">Learning Donnie</a></li>
                    <li class="active text-white" ><?php echo $tema['nombre'] ?></li>
                </ul>
            </div>
            <div class="row container" style="margin: auto; align-content: center;" id="idDivMsgForumTheme">
                <?php
                $usuario = get_object_vars($_SESSION['logged']);
                if($usuario['estado'] < 1){
                    echo '<div class="alert alert-dismissible alert-warning">';
                    echo '<button type="button" class="close" data-dismiss="alert">x</button>';
                    echo '<h4>Usuario no activado</h4>';
                    echo '<p><strong>Debe activar su cuenta para crear temas en los foros</strong></p>';
                    echo '</div>';
                }?>
            </div>
            <div class="container panel panel-default">
                <div class="row">
                    <div class="panel-heading text-white" style="background-color: #b8312f;"><strong><?php echo $tema['nombre'] ?></strong>&nbsp;
                        <?php if($tema['img_url'] == ""){ echo $tema['img_url']; }else{ echo '<i class="fa fa-lg fa-tag"></i>'; } ?>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if($arrayForos){
                        foreach ($arrayForos as $foro){
                            $alumno_creador = AlumnoFunctions::getAlumno($foro['id_alumno']);
                            $alumno_creador = get_object_vars($alumno_creador);
                            echo '<a href="?view=forum&goto=discuss&discuss='.$foro['id_foro'].'">';
                            echo '<div class="panel-body" style="border-bottom-style: solid">';
                            echo '<div class="col-md-1">';
                            if($foro['n_rol'] != 0){ echo '<i class="fa fa-2x fa-lock"></i>';}else{ echo '<i class="fa fa-2x fa-comments"></i>'; }
                            echo '</div>';
                            echo '<div class="col-md-2">';
                            echo $foro['nombre'];
                            echo '</div>';
                            echo '<div class="col-md-3">';
                            echo $foro['descripcion'];
                            echo '</div>';
                            echo '<div class="col-md-1">';
                            echo 'Creado por:';
                            echo '</div>';
                            echo '<div class="col-md-2">';
                            echo $alumno_creador['nombre']." ".$alumno_creador['apellido'];
                            echo '</div>';
                            echo '<div class="col-md-2">';
                            echo 'Cantidad de mensajes:';
                            echo '</div>';
                            echo '<div class="col-md-1">';
                            echo $foro['cant_mensajes'];
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                        }
                    }else{

                        echo '<div class="panel-body" style="border-bottom-style: solid">';
                        echo '<div class="col-md-12 text-center"><h3> No hay temas en este foro</h3></div>';
                        echo '</div>';


                    }
                    $total_paginas = ceil($cantidad_foros / 10);
                    $paginas = ($total_paginas == 0) ? 1 : $total_paginas;
                    ?>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="pagination pagination-sm">
                                <?php
                                for ($i = 1; $i <= $paginas; $i++){
                                    if($i == $pagina){
                                        echo '<li class="active">';
                                        echo '<a>';
                                    }else{
                                        echo '<li>';
                                        echo '<a href="?view=forum&goto=theme&theme='.$tema['id_tema'].'&pag='.$i.'">';
                                    }
                                    echo $i;
                                    echo '</a>';
                                    echo '</li>';
                                }
                                ?>
                                </ul>
                            </div>
                            <div class="col-md-4 -align-right">
                            <?php if($usuario['estado'] > 0){
                                echo '<a style="float: right" class="btn btn-primary -align-right" data-toggle="modal" data-target="#forumModal">';
                            }else{
                                echo '<a style="float: right" class="btn btn-primary -align-right disabled">';

                            } ?>
                                Agregar tema
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>




<!-- agregar foros -->

    <div id="forumModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div id="idDivMsgModalForum"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Iniciar nuevo tema &nbsp;<i class="fa fa-plus-circle"></i></h4>
                </div>
                <div class="modal-body form -align-center">

                    <div class="form-group"><input class="form-control" id="idNombreForo" minlength="5" maxlength="70" placeholder="T&iacute;tulo del tema"></div>
                    <div class="form-group"><input class="form-control" id="idDescForo" maxlength="70" placeholder="Decsripci&oacute;n del tema"></div>
                    <!--
                    <div class="form-inline" style="margin-bottom: 5px;margin-top: 5px;">
                        <a onclick="insertarImagen_url()"><i title="Insertar Imagen desde una URL" class="fa fa-2x fa-image -align-left"></i></a>
                        &nbsp;
                        <a onclick="insertarLink()" title="Insertar Link"><i class="fa fa-link fa-2x"></i></a>
                    </div>
                    -->
                    <textarea placeholder="Ingrese el contenido aqu&iacute;" id="idContForo" class="form-control" style="resize: none"></textarea>

                </div>
                <div class="modal-footer">

                    <?php echo '<button type="submit" id="idBtnSubmitForum" class="btn btn-default" onclick="iniciarForo('.$id_tema.')">Iniciar tema</button>'; ?>
                    <button type="button" class="btn btn-default" id="btnDismissForumModal" data-dismiss="modal">Salir</button>
                </div>
            </div>

        </div>
    </div>
    <script src="/views/js/theme.js"></script>

<?php include(HTML_DIR.'/overall/footer.php'); ?>