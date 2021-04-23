/**
 * Created by Int0.thevoid on 07-06-2016.
 */
/*
 Lista de cursos:
 1 = ADOO (UML)
 2 = TALLER DE PROGRAMACIÓN I (JAVA)
 */

/*
$.noConflict();
jQuery(document).ready(function(){
    jQuery("tr.success").click(function(){
        var id_leccion = $(this).prop('id');
        var form = 'id_leccion=' + id_leccion;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange(function () {
            if(connect.readyState == 4 && connect.status = 200){

            }
        })
         connect.open('POST', 'ajax.php?mode=leccion',true);
        connect.setRequestHeader('Content-Type','aplication/x-www-form-urlencoded');
        connect.send();
    });
});*/


function goLeccion(id_leccion){


    var connect, result, form;
    form =  'id_leccion=' + id_leccion;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function () {
        if(connect.readyState == 4 && connect.status == 200) {
            $("#Leccion").modal();
            if(connect.responseText == 1) {
                result = '<div class="alert alert-dismissible alert-success">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Listo!</h4>';
                result += '<p><strong>Lea atentamente y conteste las preguntas</strong></p>';
                result += '</div>';

                document.getElementById('idDivMsgUnidad').innerHTML = result;
                        
            }else{
                document.getElementById('idDivMsgUnidad').innerHTML = connect.responseText;
            }
        }else if(connect.readyState != 4){
            result = '<div class="alert alert-dismissible alert-info">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Procesando...</h4>';
            result += '<p><strong>'+ connect.readyState +'</strong></p>';
            result += '</div>';
            document.getElementById('idDivMsgUnidad').innerHTML = result;
        }
    };
    connect.open('POST','ajax.php?mode=leccion',true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);
}




function evaluateLesson(id_pregunta) {
    var id_radio_checked, radios_alternativas, respuesta_correcta, lista_respuestas_correctas;
    radios_alternativas = document.getElementsByName("alternativas_radio");
    for(var i = 0;i < radios_alternativas.length;i++){
        if(radios_alternativas[i].checked){
            id_radio_checked = radios_alternativas[i].value;
        }
    }
    if(id_radio_checked > 0){
        var lista_respuestas_correctas = document.getElementsByName("respuesta_correcta");
        for(var i = 0;i < lista_respuestas_correctas.length;i++){
            if(lista_respuestas_correctas[i].id == id_pregunta){
                respuesta_correcta = lista_respuestas_correctas[i].value;
                lista_respuestas_correctas[i].checked = false;
            }
        }
        if(id_radio_checked == respuesta_correcta){
            progress_bar = document.getElementById("id_progress_bar");
            progress_bar.className = "progress-bar progress-bar-striped progress-bar-info";
            displayNewDiv(id_pregunta);
        }else{
            var element_oportunidades = document.getElementById("id_oportunidades").value;
            var oportunidades =  parseInt(element_oportunidades) - 1;
            alert(oportunidades);
            element_oportunidades.value = parseInt(element_oportunidades) - 1;
            if (oportunidades <= 0){
                var string = " No quedan intentos disponibles ";
                var progress_bar = document.getElementById("id_progress_bar");
                progress_bar.style.width = x+'%';
                progress_bar.innerHTML = string;
                progress_bar.className = "progress-bar progress-bar-striped progress-bar-danger";
                if(confirm("Haz agotado los intentos disponibles. ¿Desea intentarlo nuevamente? ")){

                }
            }else{
                progress_bar = document.getElementById("id_progress_bar");
                progress_bar.className = "progress-bar progress-bar-striped progress-bar-danger";
                displayNewDiv(id_pregunta);
            }
        }
    }
}

function displayNewDiv(id_pregunta) {
    var content_divs, cantidad_preguntas, lista_contador_preguntas, contador_pregunta, progress_bar;
    lista_contador_preguntas = document.getElementsByName("contador_pregunta");
    for(var i = 0;i < lista_contador_preguntas.length;i++){
        if(lista_contador_preguntas[i].id == id_pregunta){
            contador_pregunta = lista_contador_preguntas[i].value;
        }
    }
    cantidad_preguntas = document.getElementById("leccion_cantidad_preguntas").value;
    var x = contador_pregunta * 100 / cantidad_preguntas;
    var p = parseInt(contador_pregunta) + 1;
    if(p <= cantidad_preguntas){
        var string = "Pregunta n&uacute;mero "+ p +" de "+ cantidad_preguntas;
        progress_bar = document.getElementById("id_progress_bar");
        progress_bar.style.width = x+'%';
        progress_bar.innerHTML = string;

        content_divs = document.getElementsByName("content_div");

        if(content_divs[contador_pregunta].id == (cantidad_preguntas + 1)){
            finalizarLeccion();
        }
        for(var i = 0;i < content_divs.length;i++){
            content_divs[i].style.display = 'none';
        }
        for(var i = 0;i < content_divs.length;i++){
            if(content_divs[i].id == (id_pregunta + 1))
                content_divs[i].style.display = 'block';
        }
    }else{
        var string = "Lecci&oacute;n finalizada";
        progress_bar = document.getElementById("id_progress_bar");
        progress_bar.className = "progress-bar progress-bar-striped progress-bar-success";
        progress_bar.style.width = x+'%';
        progress_bar.innerHTML = string;
        finalizarLeccion();
    }
}

function finalizarLeccion() {
    alert("leccion finalizada");
}
