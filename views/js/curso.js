/**
 * Created by Int0.thevoid on 07-06-2016.
 */
/*
 Lista de cursos:
 1 = ADOO (UML)
 2 = TALLER DE PROGRAMACIÓN I (JAVA)
 */
function goUnidad(_idUnidad){
    var connect, result, form, id_unidad;
    id_unidad = _idUnidad;
    form = 'id_unidad=' + id_unidad;
    if(id_unidad > 0){
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200) {
                if(connect.responseText == 1) {
                    result = '<h3><span class="label label-success">';
                    result += 'Listo!';
                    result += '&nbsp;&nbsp;<strong>Lo estamos redireccionando, espere un momento</strong>';
                    result += '</span></h3>';
                    document.getElementById('idDivMsgCurso').innerHTML = result;
                    window.location.hash = '#idDivMsgCurso';
                    window.location.assign("/index.php?view=unidad");
                }else{
                    document.getElementById('idDivMsgCurso').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<h3><span class="label label-info">';
                result += 'Procesando...';
                result += '&nbsp;&nbsp;<strong>Se est&aacute;n cargando sus los contenidos</strong>';
                result += '</span></h3>';
                document.getElementById('idDivMsgCurso').innerHTML = result;
                window.location.hash = '#idDivMsgCurso';
            }
        };
        connect.open('POST','ajax.php?mode=curso',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }else{
        result = '<h3><span class="label label-warning">';
        result += 'Error:';
        result += '<h3>&nbsp;&nbsp;<strong>No ha seleccionado una unidad</strong></h3>';
        result += '</label>';
        document.getElementById('idDivMsgCurso').innerHTML = result;
        window.location.hash = '#idDivMsgCurso';
    }

}

function clossedSelected() {
    result = '<div class="alert alert-dismissible alert-warning">';
    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
    result += '<h4>Error:</h4>';
    result += '<p><strong>Debe seleccionar una unidad disponible</strong></p>';
    result += '</div>';
    document.getElementById('idDivMsgCurso').innerHTML = result;
}