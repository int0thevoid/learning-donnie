/**
 * Created by int0theVoid on 02-06-16.
 */

function goLostPass(){
    var email, form;
    email = document.getElementById('idTxtEmailLostPass').value;
    form = 'email=' + email;
    if(email.length>0){
        if(comprobarExclusividad(email)){
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            connect.onreadystatechange = function () {
                if(connect.readyState == 4 && connect.status == 200) {
                    if(connect.responseText == 1) {
                        result = '<div class="alert alert-dismissible alert-success">';
                        result += '<h4>Correo enviado!</h4>';
                        result += '<p><strong>Revise su correo electr&oacute;nico para instrucciones</strong></p>';
                        result += '</div>';
                        document.getElementById('idDivRecoveryMsg').innerHTML = result;
                    }else{
                        document.getElementById('idDivRecoveryMsg').innerHTML = connect.responseText;
                    }
                }else if(connect.readyState != 4){
                    result = '<div class="alert alert-dismissible alert-info">';
                    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                    result += '<h4>Procesando...</h4>';
                    result += '<p><strong>Se est&aacute; enviando la solicitud</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivRecoveryMsg').innerHTML = result;
                }
            };
            connect.open('POST','ajax.php?mode=recoverypass',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);
        }else{
            result = '<div class="alert alert-dismissible alert-danger">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Error:</h4>';
            result += '<p><strong>Debe ingresar un email v&aacute;lido</strong></p>';
            result += '</div>';
            document.getElementById('idDivRecoveryMsg').innerHTML = result;
        }
    }else{
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Debe ingresar un correo</strong></p>';
        result += '</div>';
        document.getElementById('idDivRecoveryMsg').innerHTML = result;
    }

}
function comprobarExclusividad(){
    if(document.getElementById("idTxtEmailLostPass").value.length > 0){
        try{
            var emailEx = document.getElementById("idTxtEmailLostPass").value.split("@");
            var strSplt = emailEx[1].toLowerCase();
            if(strSplt == "inacapmail.cl"){
                return true;
            }else{
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Error:</h4>';
                result += '<p><strong>El correo debe ser exclusivo de INACAP</strong></p>';
                result += '</div>';
                document.getElementById('idDivRecoveryMsg').innerHTML = result;
                return false;
            }
        }catch (error){
            result = '<div class="alert alert-dismissible alert-warning">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Error:</h4>';
            result += '<p><strong>Asegurese de que cumpla con el formato</strong></p>';
            result += '</div>';
            document.getElementById('idDivRecoveryMsg').innerHTML = result;
            return false;
        }

    }
}

function showRecoveryPass(){
    $('#Recoverypass').modal();
}