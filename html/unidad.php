<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 13-06-16
 * Time: 4:06 PM
 */
if(!isset($_SESSION["logged"]) and !isset($_SESSION["id_curso"]) and !isset($_SESSION['unidad_seleccionada']) ){
    header('location: ?view=home');
}
$cursando_unidad = unidadFunctions::unidad_getCursandoUnidad($_SESSION['unidad_seleccionada']);
$unidad = unidadFunctions::unidad_getUnidad($_SESSION['unidad_seleccionada']);
$arrayLecciones = leccionFunction::leccion_getListadoLeccion($unidad->getId_unidad());
$curso = cursoFunctions::curso_getCurso($_SESSION["id_curso"]);
$usuario = get_object_vars($_SESSION["logged"]);
if($cursando_unidad->getIdUnidad() < $unidad->getId_unidad()){
    header('Location: /index.php?view=curso');
}
?>
<?php include (HTML_DIR . '/overall/head.php');?>
<body>
<?php include(HTML_DIR . '/overall/navBar.php'); ?>
<section class="engine"><a rel="external" href="http://www.learningdonnie.cl">Learning Donnie</a>
</section>
<div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 50px; padding-bottom: 50px;">

    <section class="mbr-section mbr-section--relative mbr-after-navbar" id="msg-box4-0">
        <div class="container row" style="margin: auto; align-content: center;">
            <ul class="breadcrumb" style="background-color: #b8312f">
                <?php
                echo '<li><a class="text-white" style="cursor: pointer" href="?view=grades">Cursos</a></li>';
                echo '<li><a class="text-white" style="cursor: pointer" href="?view=curso">'.$curso->getNombre().'</a></li>';
                echo '<li class="text-white" ><strong>Unidad N&deg;'.$unidad->getNumero().'</strong></li>';
                ?>
            </ul>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="table-responsive" align="center">
                    <h2 class="text-center">Datos de la unidad:</h2>
                    <table class="table-condensed" >
                        <?php
                        echo '<tr>';
                        echo '<td rowspan="2"><img style=" width: 40px;height: 40px;" src="/views/images/cursos/'.$_SESSION['id_curso'].'cursophp.png" ></td>';
                        echo '<td>Unidad N&uacute;mero:</td>';
                        echo '<td>'.$unidad->getNumero().'</td>';
                        echo '<td align="right">Cantidad de lecciones:</td>';
                        echo '<td>'.$unidad->getCant_lecciones().'</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Descripci&oacute;n:</td>';
                        echo '<td colspan="3">'.$unidad->getDescripcion().'</td>';
                        echo '</tr>';
                        ?>
                    </table>
                </div>
                <br><br>
                <div id="idDivMsgUnidad">
                </div>
                <h3 class="text-center pull-left">Lecciones:</h3>
                <div class="" align="center">
                    <table class="table table-hover" border="0">
                        <thead class=""><td></td><td align="center">N. de lecci&oacute;n</td><td >Descripci&oacute;n</td><td align="center">Cantidad de preguntas</td></thead>
                        <?php
                        $leccionActual = $cursando_unidad->getIdLeccionActual();
                        $i = 1;
                        ?><input type="hidden" id="leccion_actual" value="<?php echo $leccionActual; ?>">
                        <?php
                        foreach ($arrayLecciones as $item) {

                            $item = get_object_vars($item);
                            if($item['id_leccion'] > $leccionActual){
                                echo '<tr class="danger" style="cursor: pointer" onclick="goClossed()" id='.$item['id_leccion'].'><td align="center"><i class="fa fa-fw fa-lg fa-lock"></i></td><td align="center">'.$i.'</td><td>'.$item['descripcion'].'</td><td align="center">'.$item['cant_preguntas'].'</td></tr>';
                            }else{
                                echo '<tr class="success" style="cursor: pointer" id='.$item['id_leccion'].' onclick="goLeccion('.$item['id_leccion'].','.$item['cant_preguntas'].')"><td align="center"><i class="fa fa-fw fa-lg fa-unlock-alt"></i></td><td align="center">'.$i.'</td><td>'.$item['descripcion'].'</td><td align="center">'.$item['cant_preguntas'].'</td></tr>';
                            }
                            $i++;
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>


<?php include (HTML_DIR."/overall/footer.php");?>

<div class="modal" id="modal_leccion" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="modalContextLesson">
                <div id="idDivMsgLeccion"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color:black;"><span class="fa fa-fw fa-lg fa-book"></span>Selecci&oacute;ne la alternativa correcta</h4>
                </div>
                <div class="modal-body modal-form">

                    <div class="progress" id="idDivProgress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" id="id_progress_bar"
                             aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        </div>
                    </div>

                    <input type="hidden" id="idModalCant_preguntas" value="0">
                    <input type="hidden" id="idModalLeccion">
                    <div role="form" class="modal-body" name="content_div" style="margin-left:4%; display: block;" id='div_content_lesson'>
                        <span class="fa fa-lg fa-question-circle inline" style="display: inline;"><div style="margin-left:4%; display: inline;" class="  inline info" id="id_enunciado"></div></span>

                        <div id="idDivDisplayImg" style="text-align: center; margin-top: 5%; display: block;">
                            <img id="idImgQuestion" src="" alt="">
                        </div>

                        <div class="row" style="margin-top: 5%">
                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12" style="margin-top: 5%" onclick="document.getElementById('radio_1').checked = true">
                                <div class="col-sm-1 col-xs-2 col-lg-1 col-md-1"><input class="radio-inline" id="radio_1" type="radio" value="1" name="alternativas"></div>
                                <div class="col-sm-11 col-xs-10 col-lg-11 col-md-11"><label id="lbl_1"></label></div>
                            </div>
                            <br>
                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12" style="margin-top: 5%" onclick="document.getElementById('radio_2').checked = true">
                                <div class="col-sm-1 col-xs-2 col-lg-1 col-md-1"><input class="radio-inline" id="radio_2" type="radio" value="2" name="alternativas"></div>
                                <div class="col-sm-11 col-xs-10 col-lg-11 col-md-11"><label id="lbl_2"></label></div>
                            </div>
                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12" style="margin-top: 5%" onclick="document.getElementById('radio_3').checked = true">
                                <div class="col-sm-1 col-xs-2 col-lg-1 col-md-1"><input class="radio-inline" id="radio_3" type="radio" value="3" name="alternativas"></div>
                                <div class="col-sm-11 col-xs-10 col-lg-11 col-md-11"><label id="lbl_3"></label></div>
                            </div>
                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12" style="margin-top: 5%" onclick="document.getElementById('radio_4').checked = true">
                                <div class="col-sm-1 col-xs-2 col-lg-1 col-md-1"><input class="radio-inline" id="radio_4" type="radio" value="4" name="alternativas"></div>
                                <div class="col-sm-11 col-xs-10 col-lg-11 col-md-11"><label id="lbl_4"></label></div>
                            </div>
                        </div>
                        <div class="" style="margin-top: 7%" >
                            <button id="btn_evaluar_pregunta" type="button" class="btn btn-primary btn-block center-block" style="margin-top: 5%"><span class="fa fa-fw fa-lg fa-check-circle"></span> Evaluar</button>
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-default pull-left" onclick="" data-dismiss="modal"><span class="fa fa-fw fa-lg fa-remove"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>

    var goLeccion = function(id_leccion, cant_preguntas){
        $('#idModalLeccion').val(id_leccion);
        $("idModalCant_preguntas").val(cant_preguntas);
        document.getElementById('idModalCant_preguntas').value = cant_preguntas;
        var msg = '<h3><span class="label label-info">Un segundo, se est&aacute;n cargando los contenidos...</span></h3>';
        $('#idDivMsgUnidad').html(msg);
        setVals();
        cargarPregunta();
        msg = '<h3><span class="label label-success">Listo!</span></h3>';
        window.setTimeout(function () {$("#modal_leccion").modal();}, 800);
        window.setTimeout(function () {$('#idDivMsgUnidad').html(msg);}, 500);
    };

    var contador = 1;
    var oportunidades = 0;
    var cantidad_preguntas = 0;
    var id_leccion = 0;
    var ajax;


    var setVals = function () {
        id_leccion = $('#idModalLeccion').val();
        cantidad_preguntas = $('#idModalCant_preguntas').val();
        oportunidades = Math.trunc(cantidad_preguntas - ((70 * cantidad_preguntas) / 100));
    };

    var cargarPregunta = function(){
        if(contador <= cantidad_preguntas){
            if(oportunidades >= 0){
                ajax = $.ajax({
                    type:"POST",
                    url:"ajax.php?mode=preguntas",
                    data: 'op=get&id_leccion='+id_leccion+'&id_pregunta='+contador
                }).done(function (data) {
                    var obj = jQuery.parseJSON(data);
                    if(obj){
                        $('#id_enunciado').html(obj.pregunta['enunciado']);
                        if(obj.pregunta['img'] == 1){
                            var id_pregunta, id_leccion, source;
                            id_pregunta = obj.pregunta['id_pregunta'];
                            id_leccion = obj.pregunta['id_leccion'];
                            source = "/views/assets/images/questions/"+id_pregunta +"_"+ id_leccion +".png";
                            $('#idImgQuestion').attr("src",source);
                        }else{
                            $('#idImgQuestion').attr("src","");
                        }
                        cargarAlternativas();
                    }else{
                        $('#modal_leccion').hide();
                    }
                });
            }else{
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>;c!</h4>';
                result += '<p><strong>Al parecer no te ha ido muy bien, intenta nuevamente</strong></p>';
                result += '</div>';
                $('#div_content_lesson').html(result);
                window.location.hash = '#div_content_lesson';
                throw setTimeout(function(){location.reload()},1200);
            }
        }
    };

    var cargarAlternativas = function () {
        $.ajax({
            type:"POST",
            url:"ajax.php?mode=alternativas",
            data: 'id_leccion='+id_leccion+'&id_pregunta='+contador
        }).done(function (data) {
            var obj = jQuery.parseJSON(data);
            if(obj){
                for(i=0; i < 4; i++){
                    randomVal = Math.floor(Math.random()*(obj.length));
                    $('#lbl_'+(i+1)).html(obj[randomVal]['label']);
                    $('#radio_'+(i+1)).val(obj[randomVal]['id_alternativa']);
                    obj.splice(randomVal, 1);
                }
            }else{
                $('#modal_leccion').hide();
            }
        });
    };



    $( "#btn_evaluar_pregunta" ).click(function() {
        if(contador <= cantidad_preguntas){
            var radios_alternativas = document.getElementsByName('alternativas');
            var id_radio_checked = 0;
            for(var i = 0;i < radios_alternativas.length;i++){
                if(radios_alternativas[i].checked){
                    id_radio_checked = radios_alternativas[i].value;
                    radios_alternativas[i].checked = false;
                }
            }
            $.ajax({
                type:"POST",
                url:"ajax.php?mode=preguntas",
                data: "op=eval&id_alternativa="+id_radio_checked
            }).done(function (data) {
                if(data == 1){
                    update(true)
                }else{
                    oportunidades = oportunidades - 1;
                    update(false)
                }
            });
        }
    });

    var update = function (control) {
        contador = contador + 1;
        if(contador <= cantidad_preguntas){
            var string = "Pregunta n&uacute;mero "+ contador +" de "+ cantidad_preguntas;
            progress_bar = document.getElementById("id_progress_bar");
            var x = (contador -1) * 100 / cantidad_preguntas;
            progress_bar.style.width = x+'%';
            progress_bar.innerHTML = string;
            if(control){
                progress_bar.className = "progress-bar progress-bar-striped progress-bar-success";
            }else{
                progress_bar.className = "progress-bar progress-bar-striped progress-bar-danger";
            }
        }
        if(contador <= cantidad_preguntas){
            cargarPregunta();
        }else{
            result = '<div class="alert alert-dismissible alert-success">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Felicidades!</h4>';
            result += '<p><strong>haz superado la lecci&oacute;n</strong></p>';
            result += '</div>';
            $('#div_content_lesson').html(result);
            window.location.hash = '#div_content_lesson';
            var string = "LISTO!";
            progress_bar = document.getElementById("id_progress_bar");
            progress_bar.style.width = '100%';
            progress_bar.innerHTML = string;
            progress_bar.className = "progress-bar progress-bar-striped progress-bar-success";
            updateLeccion();
        }
    };

    var updateLeccion = function () {
        $.ajax({
            type:"POST",
            url:"ajax.php?mode=cursando_unidad",
            data: "op=leccion&id_leccion="+id_leccion
        }).done(function (data) {
            if(data == 1){
                throw setTimeout(function(){location.reload()},800);
            }else{
                window.location.assign("/index.php?view=curso");
            }

        })
    }

</script>