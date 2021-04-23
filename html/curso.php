<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 07-06-2016
 * Time: 22:34
 */
$cursando_curso = cursoFunctions::curso_getCursandoCurso($_SESSION["id_curso"]);
$curso = cursoFunctions::curso_getCurso($_SESSION["id_curso"]);
include (HTML_DIR . '/overall/head.php');?>
<body>
<?php include(HTML_DIR . '/overall/navBar.php'); ?>
<section class="engine"><a rel="external" href="http://www.learningdonnie.cl">Learning Donnie</a>
</section>
<div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 90px; padding-bottom: 93px;">
    <section class="mbr-section mbr-section--relative mbr-after-navbar" id="msg-box4-0">
        <ul class="breadcrumb" style="background-color: #b8312f">
            <?php
            echo '<li><a class="text-white" style="cursor: pointer" href="?view=grades">Cursos</a></li>';
            echo '<li class="text-white" ><strong>'.$curso->getNombre().'</strong></li>';
            ?>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <h2 class="text-left -align-left">Datos del curso:</h2>
                        <table class="table-condensed" border="0">
                            <?php
                            $cursando_curso = cursoFunctions::curso_getCursandoCurso($_SESSION["id_curso"]);
                            $curso = cursoFunctions::curso_getCurso($_SESSION["id_curso"]);
                            $usuario = get_object_vars($_SESSION["logged"]);
                            echo '<tr>';
                            echo '<td><img style="float: left; width: 40px;height: 40px;" src="/views/images/cursos/'.$cursando_curso->getIdCurso().'cursophp.png" ></td>';
                            echo '<td align="right">Asignatura:</td>';
                            echo '<td>'.$curso->getNombre().'</td>';
                            echo '<td align="center">Cantidad de unidades:</td>';
                            echo '<td align="left"><label>'.$curso->getCant_unidades().'</label></td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>Descripci&oacute;n:</td>';
                            echo '<td colspan="4" class="text-justify" style="text-justify: auto">'.$curso->getDescripcion().'</td>';
                            echo '</tr>';
                            ?>
                        </table>
                    </div>
                    <br><br>
                    <div id="idDivMsgCurso"></div>
                    <h3 class="text-left -align-left">Unidades:</h3>
                    <div class="table table-hover">
                        <table class="table table-hover">
                            <thead><td></td><td align="center">Numero de unidad</td><td colspan="3">Descripci&oacute;n</td><td align="center">Cantidad de lecciones</td></thead>
                            <?php
                            $id_unidad_actual = $cursando_curso->getIdUnidadActual();
                            $arrayUnidad = unidadFunctions::unidad_getListadoUnidad($_SESSION["id_curso"]);
                            foreach ($arrayUnidad as $item) {
                                $item = get_object_vars($item);
                                if($item['id_unidad'] > $id_unidad_actual){
                                    echo '<tr class="danger" style="cursor: pointer" onclick="clossedSelected()"><td align="center"><i class="fa fa-fw fa-lg fa-lock"></i></td><td align="center">'.$item['numero'].'</td><td colspan="3">'.$item['descripcion'].'</td><td align="center">'.$item['cant_lecciones'].'</td></tr>';
                                }else{
                                    echo '<tr class="success" style="cursor: pointer" onclick="goUnidad('.$item['id_unidad'].')"><td align="center"><i class="fa fa-fw fa-lg fa-unlock-alt"></i></td><td align="center">'.$item['numero'].'</td><td colspan="3">'.$item['descripcion'].'</td><td align="center">'.$item['cant_lecciones'].'</td></tr>';
                                }
                            }
                            ?>
                            <script src="/views/js/curso.js"></script>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include (HTML_DIR."/overall/footer.php"); ?>
</body>

