/**
 * Created by int0theVoid on 30-05-16.
 */
function goReg() {
    if(camposVacios() && inacapMail() && comprobarEmail() && comprobarPass() && comprobarSemestre()){
        var connect, result, nombre, apellido, email, pass, ddlSemestre, form;
        nombre = document.getElementById("idRegTxtNombre").value;
        apellido = document.getElementById("idRegTxtApellidos").value;
        email = document.getElementById("idRegTxtEmail1").value;
        pass = document.getElementById("idRegTxtPass1").value;
        ddlSemestre = document.getElementById("idRegDdlSemestre").value;
        form = 'nombre=' + nombre + '&apellido='+ apellido + '&email=' + email + '&pass=' + pass + '&semestre=' + ddlSemestre;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200) {
                if(connect.responseText == 1) {
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<h4>Registrado!</h4>';
                    result += '<p><strong>Se ha enviado un correo para la activaci&oacute;n</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivMsgReg').innerHTML = result;
                    window.location.hash = '#idDivMsgReg';
                    window.setTimeout(function(){window.location.assign("/?view=home");},800);
                }else{
                    document.getElementById('idDivMsgReg').innerHTML = connect.responseText;
                    window.location.hash = '#idDivMsgReg';
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-info">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Se est&aacute;n cargando los datos del reigstro</strong></p>';
                result += '</div>';
                document.getElementById('idDivMsgReg').innerHTML = result;
                window.location.hash = '#idDivMsgReg';
            }
        };
        connect.open('POST','ajax.php?mode=reg',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }
}

function showReg(){
    $('#Register').modal();
}
function camposVacios() {
    if(document.getElementById("idRegTxtNombre").value != ""
        && document.getElementById("idRegTxtApellidos").value != ""
        && document.getElementById("idRegTxtEmail1").value != ""
        && document.getElementById("idRegTxtEmail2").value != ""
        && document.getElementById("idRegTxtPass1").value.length > 5
        && document.getElementById("idRegTxtPass2").value.length > 5
        && document.getElementById("idRegDdlSemestre").value > 0){
        return true;
    }else{
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Todos los campos son requeridos</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgReg').innerHTML = result;
        window.location.hash = '#idDivMsgReg';
        return false;
    }
}

function inacapMail(){
    var emailEx = document.getElementById("idRegTxtEmail1").value.split("@");
    var strSplt = emailEx[1].toLowerCase();
    if(strSplt == "inacapmail.cl"){
        return true;
    }else{
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>El correo debe ser exclusivo de INACAP</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgReg').innerHTML = result;
        window.location.hash = '#idDivMsgReg';
    }
}

function comprobarEmail(){
    if(document.getElementById("idRegTxtEmail1").value.length > 0  && document.getElementById("idRegTxtEmail2").value.length > 0){
        var email1 = document.getElementById("idRegTxtEmail1").value;
        var email2 = document.getElementById("idRegTxtEmail2").value;
        if(email1 == email2){
            return true;
        }else{
            result = '<div class="alert alert-dismissible alert-warning">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Error:</h4>';
            result += '<p><strong>Los correos ingresados no coinciden</strong></p>';
            result += '</div>';
            document.getElementById('idDivMsgReg').innerHTML = result;
            window.location.hash = '#idDivMsgReg';
            return false;
        }
    }else{
        return false;
    }

}
function comprobarPass(){
    var pass1 = document.getElementById("idRegTxtPass1").value;
    var pass2 = document.getElementById("idRegTxtPass2").value;
    if(pass1 == pass2 && pass1.length >= 6){
        return true;
    }else{
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Las contraseñas ingresadas no coinciden</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgReg').innerHTML = result;
        window.location.hash = '#idDivMsgReg';
        return false;
    }
}
function comprobarSemestre(){
    var semestre = document.getElementById("idRegDdlSemestre").value;
    if(semestre != 0){
        return true;
    }else{
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Debe seleccionar un semestre</strong></p>';
        result += '</div>';
        document.getElementById('idDivMsgReg').innerHTML = result;
        window.location.hash = '#idDivMsgReg';
        return false;
    }
}
function runScriptReg(e) {
    if(e.keyCode == 13) {
        goReg();
    }
}
