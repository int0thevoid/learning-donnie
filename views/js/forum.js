/**
 * Created by int0theVoid on 03-11-16.
 */


function agregarComentario(id_foro, pagina){
    var connect, result, form, comentario;
    comentario = document.getElementById("idComentario").value;
    if(comentario.length>5){
        form = 'op=add&id_foro=' + id_foro + '&comentario=' + comentario;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200) {
                if(connect.responseText != 0){
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Listo!</h4>';
                    result += '<p><strong>Su comentario ha sido agregado, espere un momento</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgModalComment').innerHTML = result;
                    location.href = location.href;
                }else{
                    document.getElementById('idDivMsgModalComment').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-info">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Se est&aacute;n cargando sus los contenidos</strong></p>';
                result += '</div>';
                document.getElementById('idDivMsgModalComment').innerHTML = result;
            }
        };
        connect.open('POST','ajax.php?mode=discuss',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }else{
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Debe ingresar un comentario m&aacute;s descriptivo</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgModalComment').innerHTML = result;
    }
}


function openEditarForo(id_foro) {
    var connect;
    if(id_foro > 0){
        document.getElementById('idEditForo').value = id_foro;
        var form = 'op=get&id_foro=' + id_foro;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200){
                jQuery.noConflict();
                var obj = jQuery.parseJSON(connect.responseText);
                document.getElementById("idEditForoMensaje").value = obj['id_main_mensaje'];
                document.getElementById("idEditForoTema").value = obj['id_tema'];
                document.getElementById("idEditTituloForo").value = obj['nombre'];
                document.getElementById("idEditDescForo").value = obj['descripcion'];
                document.getElementById("idEditContenidoForo").value = obj['mensaje'];
                $('#editMainComment').modal();
            }
        };
        connect.open('POST','ajax.php?mode=forum',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }
}

function openEditarComentario(element) {
    var id_comentario = element.value;
    var connect;
    if(id_comentario > 0){
        var form = 'op=get&id_comentario=' + id_comentario;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
          if(connect.readyState == 4 && connect.status == 200){
              jQuery.noConflict();
              var obj = jQuery.parseJSON(connect.responseText);
              $("#idEditComment").val(id_comentario);
              $("#idEditTextAreaComment").val(obj[0]['mensaje']);
              $('#editComment').modal();
          }
        };

        connect.open('POST','ajax.php?mode=discuss',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }else{
        alert("id no válida");
    }
}

function editarForo(){
    var connect, result, form, titulo, descripcion, comentario, id_foro, id_mensaje;
    titulo = document.getElementById('idEditTituloForo').value;
    descripcion = document.getElementById('idEditDescForo').value;
    comentario = document.getElementById('idEditContenidoForo').value;
    id_foro = document.getElementById('idEditForo').value;
    id_mensaje = document.getElementById('idEditForoMensaje').value;
    if(titulo.length > 5){
        if(comentario.length > 5){
            if(id_foro > 0 && id_mensaje > 0){
                form = 'op=edit&id_foro='+id_foro+'&id_mensaje='+id_mensaje+'&titulo='+titulo+'&descripcion='+descripcion+'&comentario='+comentario;
                connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                connect.onreadystatechange = function () {
                    if(connect.readyState == 4 && connect.status == 200){
                        if(connect.responseText == 1){
                            result = '<div class="alert alert-dismissible alert-success">';
                            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                            result += '<h4>Listo!</h4>';
                            result += '<p><strong>Su tema se ha modificado, espere un momento</strong></p>';
                            result += '</div>';
                            document.getElementById('idDivMsgModalEditForum').innerHTML = result;
                            document.getElementById('idBtnEditForum').className = "btn btn-default btn-sm disabled";
                            document.getElementById('idBtnDeleteForum').className = "btn btn-default btn-sm disabled";
                            document.getElementById('btnDismissEditForumModal').className = "btn btn-default btn-sm disabled";
                            throw setTimeout(function(){location.reload()},800);

                        }else{
                            document.getElementById('idDivMsgModalEditForum').innerHTML = connect.responseText;
                        }
                    }else if(connect.readyState != 4){
                        result = '<div class="alert alert-dismissible alert-info">';
                        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                        result += '<h4>Cargando:</h4>';
                        result += '<p><strong>Se est&aacute;n cargando los datos</strong></p>';
                        result += '</div>';
                        document.getElementById("idDivMsgModalEditForum").value = result;
                    }
                };

                connect.open('POST','ajax.php?mode=forum',true);
                connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                connect.send(form);
            }
        }else{
            result = '<div class="alert alert-dismissible alert-info">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Cargando:</h4>';
            result += '<p><strong>Se est&aacute;n cargando los datos</strong></p>';
            result += '</div>';
            document.getElementById("idDivMsgModalEditForum").value = result;
        }
    }else{
        result = '<div class="alert alert-dismissible alert-info">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Cargando:</h4>';
        result += '<p><strong>Se est&aacute;n cargando los datos</strong></p>';
        result += '</div>';
        document.getElementById("idDivMsgModalEditForum").value = result;
    }
}

function editarComentario() {
    var id_comentario, comentario, form, result, connect;
    id_comentario = document.getElementById("idEditComment").value;
    comentario = document.getElementById("idEditTextAreaComment").value;
    if(id_comentario > 0){
        if(comentario.length > 5){
            form = 'op=edit&id_comentario=' + id_comentario + '&comentario=' + comentario;
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            connect.onreadystatechange = function () {
                if(connect.readyState == 4 && connect.status == 200){
                    if(connect.responseText == 1){
                        result = '<div class="alert alert-dismissible alert-success">';
                        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                        result += '<h4>Listo!</h4>';
                        result += '<p><strong>Su comentario ha modificado, espere un momento</strong></p>';
                        result += '</div>';
                        document.getElementById('idDivMsgModalEditComment').innerHTML = result;
                        document.getElementById('idBtnEditDiscuss').className = "btn btn-default btn-sm disabled";
                        document.getElementById('idBtnDeleteDiscuss').className = "btn btn-default btn-sm disabled";
                        throw setTimeout(function(){location.reload()},800);
                    }else{
                        document.getElementById('idDivMsgModalEditComment').innerHTML = connect.responseText;
                    }
                }else if(connect.readyState != 4){
                    result = '<div class="alert alert-dismissible alert-info">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Cargando:</h4>';
                    result += '<p><strong>Se est&aacute;n cargando los datos</strong></p>';
                    result += '</div>';
                    document.getElementById("idDivMsgModalEditComment").value = result;
                }
            };

            connect.open('POST','ajax.php?mode=discuss',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);
        }else{
            result = '<div class="alert alert-dismissible alert-warning">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Error:</h4>';
            result += '<p><strong>Debe ingresar un comentario m&aacute;s descriptivo</strong></p>';
            result += '</div>';
            document.getElementById('idDivMsgModalEditComment').innerHTML = result;
        }
    }else{
        result = '<div class="alert alert-dismissible alert-info">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Hubo un problema al editar el comentario, intente nuevamente</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgModalEditComment').innerHTML = result;
    }
}

function eliminarComentario() {
    var id_comentario, confirmacion, form, connect, result;
    id_comentario = document.getElementById("idEditComment").value;
    confirmacion = confirm("¿Está seguro en eliminar el comentario?");
    if(confirmacion){
      form = 'op=delete&id_comentario=' + id_comentario;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200){
                if(connect.responseText == 1){
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Listo!</h4>';
                    result += '<p><strong>Su comentario ha sido eliminado, espere un momento</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgModalEditComment').innerHTML = result;
                    document.getElementById('idBtnEditDiscuss').className = "btn btn-default btn-sm disabled";
                    document.getElementById('idBtnDeleteDiscuss').className = "btn btn-default btn-sm disabled";
                    throw setTimeout(function(){location.reload()},800);
                }else{
                    document.getElementById('idDivMsgModalEditComment').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-info">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Cargando:</h4>';
                result += '<p><strong>Se est&aacute; eliminando su comentario</strong></p>';
                result += '</div>';
                document.getElementById("idDivMsgModalEditComment").value = result;
            }
        };
        connect.open('POST','ajax.php?mode=discuss',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }
}

function eliminarForo(){
    var id_foro, confirmacion, form, connect, result;
    id_foro = document.getElementById("idEditForo").value;
    confirmacion = confirm("¿Está seguro en eliminar el tema y todos sus comentarios?");
    if(confirmacion){
        form = 'op=delete&id_foro=' + id_foro;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200){
                if(connect.responseText == 1){
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Listo!</h4>';
                    result += '<p><strong>Su tema ha sido eliminado, espere un momento</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgModalEditForum').innerHTML = result;
                    document.getElementById('idBtnEditForum').className = "btn btn-default btn-sm disabled";
                    document.getElementById('idBtnDeleteForum').className = "btn btn-default btn-sm disabled";
                    var id_tema = document.getElementById("idEditForoTema").value;
                    window.setTimeout(function(){window.location = "?view=forum&goto=theme&theme="+id_tema;},800);
                }else{
                    document.getElementById('idDivMsgModalEditForum').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-info">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Cargando:</h4>';
                result += '<p><strong>Se est&aacute; eliminando su tema</strong></p>';
                result += '</div>';
                document.getElementById("idDivMsgModalEditForum").value = result;
            }
        };
        connect.open('POST','ajax.php?mode=forum',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }
}

function goLike(element){
    var id_mensaje, form, connect;
    id_mensaje = element.id;
    form = 'id_mensaje=' + id_mensaje;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function () {
        if(connect.readyState == 4 && connect.status == 200){
            element.innerHTML = connect.responseText;
        }
    };
    connect.open('POST','ajax.php?mode=like',true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);
}















