/**
 * Created by Int0.thevoid on 07-06-2016.
 */
/*
Lista de cursos:
1 = ADOO (UML)
2 = FUNDAMENTOS DE PROGRAMACION
 */
function goGrades(_idCurso){
    var connect, result, idCurso, form;
    idCurso = _idCurso;
    form = 'idCurso=' + idCurso;
    if(idCurso > 0){
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200) {
                if(connect.responseText == 1) {
                    result =    '<div class="alert alert-dismissible alert-success">';
                    result +=   '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result +=   '<h4>Listo!</h4>';
                    result +=   '<p><strong>Lo estamos redireccionando, espere un momento</strong></p>';
                    result +=   '</div>';
                    document.getElementById('idDivMsgGrades').innerHTML = result;
                    window.location.hash = '#idDivMsgGrades';
                    window.location.assign("/index.php?view=curso");
                }else{
                    document.getElementById('idDivMsg').innerHTML = connect.responseText;
                    window.location.hash = '#idDivMsgGrades';
                }
            }else if(connect.readyState != 4){
                result =    '<div class="alert alert-dismissible alert-info">';
                result +=   '<button type="button" class="close" data-dismiss="alert">x</button>';
                result +=   '<h4>Procesando...</h4>';
                result +=   '<p><strong>Se est&aacute;n cargando sus los contenidos</strong></p>';
                result +=   '</div>';
                document.getElementById('idDivMsgGrades').innerHTML = result;
                window.location.hash = '#idDivMsgGrades';
            }
        };
            connect.open('POST','ajax.php?mode=grades',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);
    }else{
        result =    '<div class="alert alert-dismissible alert-warning">';
        result +=   '<button type="button" class="close" data-dismiss="alert">x</button>';
        result +=   '<h4>Error:</h4>';
        result +=   '<p><strong>No ha seleccionado un curso</strong></p>';
        result +=   '</div>';
        document.getElementById('idDivMsgGrades').innerHTML = result;
        window.location.hash = '#idDivMsgGrades';
    }

}