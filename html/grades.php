<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 07-06-2016
 * Time: 15:01
 */?>
<?php include (HTML_DIR . '/overall/head.php');?>
<body>
<?php include(HTML_DIR . '/overall/navBar.php'); ?>
<section class="engine"><a rel="external" href="http://www.learningdonnie.cl">Learning Donnie</a>
</section>
<div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 50px; padding-bottom: 93px;">
    <section class="mbr-section mbr-section--relative mbr-after-navbar" id="msg-box4-0">
        <div class="container">
            <div class="row">
                    <div id="idDivMsgGrades">
                    </div>
                    <div class="row">
                        <div class="panel panel-info">
                            <div class="panel-heading col-md-12">
                                <h3 class="-align-justify">Cursos disponibles en el m&oacute;dulo de aprendizaje</h3>
                            </div>
                            <?php
                            $arraycursos = cursoFunctions::curso_getListadoCurso();
                            foreach ($arraycursos as $item) {
                                $item = get_object_vars($item);
                                echo '<div class="panel-body onclick="goGrades('.$item['id_curso'].')" panel-info col-md-12">';
                                    echo '<div class="col-md-2 col-lg-1 col-sm-2 col-xs-12">';
                                    echo '<a onclick="goGrades('.$item['id_curso'].')" class="pull-left"><img class="center-block img-circle media-object" src="/views/images/cursos/'.$item['id_curso'].'cursophp.png" height="64" width="64"></a>';
                                    echo '</div>';
                                    echo '<div class="col-md-10 col-lg-11 col-sm-10 col-xs-12">';
                                    echo '<a class="btn btn-success" style="margin-top:10px;" onclick="goGrades('.$item['id_curso'].')" >'.$item['nombre'].'</a>';
                                    echo '</div>';
                                echo '<div class="col-md-1">&nbsp;</div>';
                                    echo '<div class="col-md-10 col-lg-11 col-sm-10 col-xs-12 text-justify">';
                                    echo '<p>'.$item['descripcion'].'</p>';
                                    echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
</div>
<script src="/views/js/grades.js"></script>
<?php include (HTML_DIR."/overall/footer.php"); ?>
</body>
