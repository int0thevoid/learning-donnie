/**
 * Created by int0theVoid on 30-05-16.
 */
function goLogin(){
    var connect, result, user, pass, sesion = false;
    user = document.getElementById('idTxtEmail').value;
    pass = document.getElementById('idTxtPass').value;
    if(document.getElementById('chkSRecordar').checked){
        sesion = true;
    }
    form = 'user=' + user + '&pass=' + pass + '&sesion=' + sesion;
    if(user.length>0){
        if(pass.length > 5){
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            connect.onreadystatechange = function () {
                if(connect.readyState == 4 && connect.status == 200) {
                    if(connect.responseText == 1) {
                        result = '<div class="alert alert-dismissible alert-success">';
                        result += '<h4>Conectado!</h4>';
                        result += '<p><strong>Lo estamos redireccionando</strong></p>';
                        result += '</div>';
                        document.getElementById('idDivMsg').innerHTML = result;
                        window.location.hash = '#idDivMsg';
                        location.reload();
                    }else{
                        document.getElementById('idDivMsg').innerHTML = connect.responseText;
                        window.location.hash = '#idDivMsg';
                    }
                }else if(connect.readyState != 4){
                    result = '<div class="alert alert-dismissible alert-info">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Procesando...</h4>';
                    result += '<p><strong>se están comprobando sus datos</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsg').innerHTML = result;
                    window.location.hash = '#idDivMsg';
                }
            };
            connect.open('POST','ajax.php?mode=login',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);
        }else{
            result = '<div class="alert alert-dismissible alert-warning">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Error:</h4>';
            result += '<p><strong>Debe ingresar una contrase&ntilde;a de al menos 6 car&aacute;cteres</strong></p>';
            result += '</div>';
            document.getElementById('idDivMsg').innerHTML = result;
            window.location.hash = '#idDivMsg';
        }
    }else{
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Debe ingresar un correo</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsg').innerHTML = result;
        window.location.hash = '#idDivMsg';
    }

}

function runScriptLogin(e) {
    if(e.keyCode == 13) {
        goLogin();
    }
}

function mostrarChangePass() {
    document.getElementById("idDivInvite").style.display = "none";
    var div = document.getElementById("idDivChangePass");
    div.style.display = "block";
    window.location.hash = '#idChangePass_pass';
}

function goChangePass_(){
    var pass, pass1, pass2, form;
    pass = document.getElementById('idChangePass_pass').value;
    pass1 = document.getElementById('idChangePass_new1').value;
    pass2 = document.getElementById('idChangePass_new2').value;
    if(pass1 != pass2){
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Las contrase&ntilde;as ingresadas no coinciden</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgAccount').innerHTML = result;
        window.location.hash = '#idDivMsgAccount';
    }else{
        form = 'pass=' + pass + '&newpass=' + pass1;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200) {
                if(connect.responseText == 1) {
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<h4>Contrase&ntilde;a modificada</h4>';
                    result += '<p><strong>Por favor, inicie sesi&oacute;n</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgAccount').innerHTML = result;
                    window.location.hash = '#idDivMsgAccount';
                    window.setTimeout(function () { window.location.assign("/index.php?view=logout");}, 600);
                }else{
                    result = '<div class="alert alert-dismissible alert-warning">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Error</h4>';
                    result += '<p><strong>'+ connect.responseText +'</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgAccount').innerHTML = result;
                    window.location.hash = '#idDivMsgAccount';
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-info">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Se est&aacute; enviando la solicitud</strong></p>';
                result += '</div>';
                document.getElementById('idDivMsgAccount').innerHTML = result;
                window.location.hash = '#idDivMsgAccount';
            }
        };
        connect.open('POST','ajax.php?mode=changepass',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }
}
function reSendActivation(){
    var result;
    var form = 'op=reg';
    var connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function () {
        if(connect.readyState == 4 && connect.status == 200) {
            if(connect.responseText == 1) {
                result = '<div class="alert alert-dismissible alert-success">';
                result += '<h4>Listo!</h4>';
                result += '<p><strong>Se ha enviado un correo de validación a su cuenta asociada</strong></p>';
                result += '</div>';
                document.getElementById('idDivMsgAccount').innerHTML = result;
                window.location.hash = '#idDivMsgAccount';
            }else{
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Error</h4>';
                result += '<p><strong>'+ connect.responseText +'</strong></p>';
                result += '</div>';
                document.getElementById('idDivMsgAccount').innerHTML = result;
                window.location.hash = '#idDivMsgAccount';
            }
        }else if(connect.readyState != 4){
            result = '<div class="alert alert-dismissible alert-info">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Procesando...</h4>';
            result += '<p><strong>Se est&aacute; enviando la solicitud</strong></p>';
            result += '</div>';
            document.getElementById('idDivMsgAccount').innerHTML = result;
            window.location.hash = '#idDivMsgAccount';
        }
    };
    connect.open('POST','ajax.php?mode=mail',true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);
}

function showLogin(){
    $('#Login').modal();
}

function showAccount(){
    $('#Account').modal();
}

function comprobarExclusividadAmigo(){
    if(document.getElementById("idInviteMail").value.length > 0){
        try{
            var emailEx = document.getElementById("idInviteMail").value.split("@");
            var strSplt = emailEx[1].toLowerCase();
            if(strSplt == "inacapmail.cl"){
                return true;
            }else{
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Error:</h4>';
                result += '<p><strong>El correo debe ser exclusivo de INACAP</strong></p>';
                result += '</div>';
                document.getElementById('idDivMsgAccount').innerHTML = result;
                window.location.hash = '#idDivMsgAccount';
                return false;
            }
        }catch (error){
            result = '<div class="alert alert-dismissible alert-warning">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Error:</h4>';
            result += '<p><strong>Asegurese de que cumpla con el formato</strong></p>';
            result += '</div>';
            document.getElementById('idDivMsgAccount').innerHTML = result;
            window.location.hash = '#idDivMsgAccount';
            return false;
        }

    }
}

function mostrarInviteFriend() {
    document.getElementById("idDivChangePass").style.display = "none";
    document.getElementById("idDivInvite").style.display = "block";
    window.location.hash = '#idDivInvite';
}

function goInviteFriend(){
    if(comprobarExclusividadAmigo()){
        var email = document.getElementById("idInviteMail").value
        var result;
        var form = 'op=invite&to='+ email;
        var connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200) {
                if(connect.responseText == 1) {
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<h4>Listo!</h4>';
                    result += '<p><strong>Se ha enviado un correo de invitaci&oacute;n para su amigo</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgAccount').innerHTML = result;
                    window.location.hash = '#idDivMsgAccount';
                }else{
                    result = '<div class="alert alert-dismissible alert-warning">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Error</h4>';
                    result += '<p><strong>'+ connect.responseText +'</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgAccount').innerHTML = result;
                    window.location.hash = '#idDivMsgAccount';
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-info">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Se est&aacute; enviando el correo</strong></p>';
                result += '</div>';
                document.getElementById('idDivMsgAccount').innerHTML = result;
                window.location.hash = '#idDivMsgAccount';
            }
        };
        connect.open('POST','ajax.php?mode=mail',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }
}