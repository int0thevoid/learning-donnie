<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 23-10-16
 * Time: 01:24
 */

include(HTML_DIR.'/overall/head.php');
include(HTML_DIR.'/overall/navBar.php')?>
    <section class="engine"><a rel="external" href="http://www.learningdonnie.cl">Learning Donnie</a>
    </section>

    <section style="background-color: rgb(193, 193, 193);">
    <div class="mbr-section__container mbr-section__container--isolated" style="background-color: rgb(193, 193, 193);">
        <div class="container">
            <div class="row -align-center">
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-6 -align-center" style="margin-top: 40px">
                    <h1>¡Bienvenido a los foros!</h1>
                    <h3 style="text-align: justify">¡Ac&aacute; encontrar&aacute;s todos los espacios necesarios para aportar a la comunidad y resolver tus dudas!</h3>
                </div>
                <div class="col-md-6">
                    <img alt="LDonnie" class="mbr-figure__img img-responsive" src="/views/images/donnie-Na-forum.png">
                </div>
            </div>
        </div>
    </div>
    </section>
    <section>
    <div class="content" style="padding-top: 50px;">
        <?php
        $arrayCategorias = forumFunctions::forum_getListadoCategorias();
        ?>
        <div class="container panel panel-default">
            <div class="row">
                <div class="panel-heading text-white" style="background-color: #b8312f;"><strong><?php echo $arrayCategorias[0]['nombre'] ?></strong>&nbsp;
                    <?php if($arrayCategorias[0]['img_url'] == ""){ echo $arrayCategorias[0]['img_url']; }else{ echo '<i class="fa fa-lg fa-tag"></i>'; } ?>
                </div>
            </div>
            <div class="row">
                <?php $arrayTemas = forumFunctions::forum_getListadoTemas($arrayCategorias[0]['id_categoria']);
                    foreach ($arrayTemas as $tema){
                        echo '<a href="?view=forum&goto=theme&theme='.$tema['id_tema'].'">';
                        echo '<div class="panel-body" style="border-bottom-style: solid">';
                            echo '<div class="col-md-1">';
                            if($tema['img_url']){ echo $tema['img_url']; }else{ echo '<i class="fa fa-lg fa-tag"></i>'; }
                            echo '</div>';
                            echo '<div class="col-md-2">';
                                echo $tema['nombre'];
                            echo '</div>';
                            echo '<div class="col-md-6">';
                                echo $tema['descripcion'];
                            echo '</div>';
                            echo '<div class="col-md-2">';
                                echo 'Cantidad de foros:';
                            echo '</div>';
                            echo '<div class="col-md-1">';
                                echo $tema['cant_foro'];
                            echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }

                ?>
                <div class="panel-body"></div>
            </div>
        </div>
        <div class="container panel panel-default">
            <div class="row">
                <div class="panel-heading text-white" style="background-color: #b8312f;"><strong><?php echo $arrayCategorias[1]['nombre'] ?></strong>&nbsp;
                    <?php if($arrayCategorias[1]['img_url'] == ""){ echo '<img src='.$arrayCategorias[1]['img_url'].'>'; }else{ echo '<i class="fa fa-lg fa-tag"></i>'; } ?></div>
            </div>
            <div class="row">
                <?php $arrayTemas = forumFunctions::forum_getListadoTemas($arrayCategorias[1]['id_categoria']);
                foreach ($arrayTemas as $tema){
                    echo '<a href="?view=forum&goto=theme&theme='.$tema['id_tema'].'">';
                    echo '<div class="panel-body" style="border-bottom-style: solid">';
                    echo '<div class="col-md-1">';
                    if($tema['img_url']){ echo $tema['img_url']; }else{ echo '<i class="fa fa-lg fa-tag"></i>'; }
                    echo '</div>';
                    echo '<div class="col-md-2">';
                    echo $tema['nombre'];
                    echo '</div>';
                    echo '<div class="col-md-6">';
                    echo $tema['descripcion'];
                    echo '</div>';
                    echo '<div class="col-md-2">';
                    echo 'Cantidad de foros:';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo $tema['cant_foro'];
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                }

                ?>
                <div class="panel-body"></div>
            </div>
        </div>
        <div class="container panel panel-default">
            <div class="row">
                <div class="panel-heading text-white" style="background-color: #b8312f;"><strong><?php echo $arrayCategorias[2]['nombre'] ?></strong>&nbsp;
                    <?php if($arrayCategorias[2]['img_url'] == ""){ echo '<img src='.$arrayCategorias[2]['img_url'].'>'; }else{ echo '<i class="fa fa-lg fa-tag"></i>'; } ?></div>
            </div>
            <div class="row">
                <?php $arrayTemas = forumFunctions::forum_getListadoTemas($arrayCategorias[2]['id_categoria']);
                foreach ($arrayTemas as $tema){
                    echo '<a href="?view=forum&goto=theme&theme='.$tema['id_tema'].'">';
                    echo '<div class="panel-body" style="border-bottom-style: solid">';
                    echo '<div class="col-md-1">';
                    if($tema['img_url']){ echo $tema['img_url']; }else{ echo '<i class="fa fa-lg fa-tag"></i>'; }
                    echo '</div>';
                    echo '<div class="col-md-2">';
                    echo $tema['nombre'];
                    echo '</div>';
                    echo '<div class="col-md-6">';
                    echo $tema['descripcion'];
                    echo '</div>';
                    echo '<div class="col-md-2">';
                    echo 'Cantidad de foros:';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo $tema['cant_foro'];
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                }

                ?>
                <div class="panel-body"></div>
            </div>
        </div>

    </div>
    </section>









<?php include(HTML_DIR.'/overall/footer.php'); ?>