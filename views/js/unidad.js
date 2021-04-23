
function goLeccion(id_leccion, cant_preguntas){
    document.getElementById("idModalLeccion").value = id_leccion;
    document.getElementById('idModalCant_preguntas').value = cant_preguntas;

    /*alert(id_leccion);
    var connect, result, form;
    form = 'id_leccion=' + id_leccion;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function () {
    if(connect.readyState == 4 && connect.status == 200) {
        result = '<div class="alert alert-dismissible alert-success">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Listo!</h4>';
        result += '<p><strong>Se ha cargado la lecci&oacute;n seleccionada</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgUnidad').innerHTML = result;
        $("#modal_leccion").modal();
        document.getElementById('cant_preguntas').value = cant_preguntas;
        if(connect.responseText == "ok"){
            location.reload();
        }else{
            document.getElementById('cant_preguntas').value = parseInt(connect.responseText);
        }

    }else if(connect.readyState != 4){
        result = '<div class="alert alert-dismissible alert-info">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Procesando...</h4>';
        result += '<p><strong>Se est&aacute;n cargando sus los contenidos</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgUnidad').innerHTML = result;
    }
    };
    connect.open('POST','ajax.php?mode=leccion',true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);*/
}

