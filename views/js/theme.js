/**
 * Created by int0theVoid on 01-11-16.
 */
function iniciarForo(id_tema){
    var connect, result, form, tittle, desc, cont;
    tittle = document.getElementById("idNombreForo").value;
    desc = document.getElementById("idDescForo").value;
    cont = document.getElementById("idContForo").value;
    if(tittle.length>5 && cont.length>5){
        form = 'op=add&id_tema=' + id_tema + '&nombre=' + tittle + '&desc=' + desc + '&cont=' + cont;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200) {
                if(connect.responseText == 1){
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Listo!</h4>';
                    result += '<p><strong>Su tema ha sido agregado, espere un momento</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgModalForum').innerHTML = result;
                    document.getElementById('idBtnSubmitForum').className = "btn btn-default disabled";
                    throw setTimeout(function(){location.reload()},800);

                }else{
                    result = '<div class="alert alert-dismissible alert-danger">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Error!</h4>';
                    result += '<p><strong>No se ha podido agregar su tema</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgModalForum').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-info">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Se est&aacute;n cargando sus los contenidos</strong></p>';
                result += '</div>';
                document.getElementById('idDivMsgModalForum').innerHTML = result;
            }
        };
        connect.open('POST','ajax.php?mode=forum',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }else{
        result = '<div class="alert alert-dismissible alert-info">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Debe ingresar un t&iacute;tulo y contenido m&aacute;s descriptivos</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgModalForum').innerHTML = result;
    }
}

function insertarImagen_url(){
    var img_url = window.prompt("Ingrese el lunk de su imagen","link");
    if(img_url){
        var text = document.getElementById("idDescForo").value;
        img_url = '<img src='+ img_url +' height="100px" width="100px">';
        text = text + ' ' + img_url;
        document.getElementById("idDescForo").value = text;
    }
}
