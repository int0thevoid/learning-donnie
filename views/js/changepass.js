/**
 * Created by int0theVoid on 05-11-16.
 */
function goChangePass(){
    var pass1, pass2, form;
    pass1 = document.getElementById('idTxtPassRecovery1').value;
    pass2 = document.getElementById('idTxtPassRecovery2').value;
    if(pass1 != pass2){
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Error:</h4>';
        result += '<p><strong>Debe ingresar un correo</strong></p>';
        result += '</div>';
        document.getElementById('idDivChangePassMsg').innerHTML = result;
    }else{
        form = 'pass=' + pass1;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200) {
                if(connect.responseText == 1) {
                    var btn = document.getElementById('btnSubmitChangePass');
                    btn.classList.add("disabled");
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<h4>Contrase&ntilde;a modificada</h4>';
                    result += '<p><strong>Por favor, inicie sesi&oacute;n</strong></p>';
                    result += '</div>';
                    document.getElementById('idDivChangePassMsg').innerHTML = result;
                }else{
                    document.getElementById('idDivChangePassMsg').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-info">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Se est&aacute; enviando la solicitud</strong></p>';
                result += '</div>';
                document.getElementById('idDivChangePassMsg').innerHTML = result;
            }
        };
        connect.open('POST','ajax.php?mode=changepass',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }
}