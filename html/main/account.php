<?php
if(isset($_SESSION['logged'])){
    $alumno = get_object_vars($_SESSION['logged']);
}else{
    header('Location: ?view=home');
}
 ?>
<div class="modal fade" id="Account" role="dialog" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="idDivMsgAccount"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="fa fa-1x fa-times-circle"></span></button>
                <h4 style="color:black;"><span class="fa fa-fw fa-lg fa-user"></span>&nbsp; Informaci&oacute;n de la cuenta</h4>
            </div>
            <div class="modal-body -align-center">
                <div class="col-md-12" style="text-align: center; display: inherit">
                    <div style="display: inline-block; margin-top: 20px">
                        <img style="height: 150px;width: 150px; display: inline-block" src="/views/assets/images/profiles/avatar.png" alt="avatar">
                    </div>
                </div>
                <div class="col-md-12">&nbsp;</div>
                <div class="" style="display: inherit">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            &nbsp;
                        </div>
                        <div class="panel-footer">
                            <h3><span class="label label-default">Datos del usuario:</span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-3"><h4>Nombre:</h4></div>
                            <div class="col-md-9"><h4><span class="label label-info"><?php echo $alumno['nombre'].' '.$alumno['apellido']; ?></span></h4><hr></div>
                            <div class="col-md-3"><h4>Email: </h4></div>
                            <div class="col-md-9"><h4><span class="label label-info"><?php echo $alumno['email']; ?></span></h4><hr></div>
                            <div class="col-md-3"><h4>Cursando: </h4></div>
                            <div class="col-md-9"><h4><span class="label label-info"><?php echo $alumno['semestre'] ?>&deg; Semestre</span></h4><hr></div>
                            <div class="col-md-3"><h4>Estado de la cuenta: </h4></div>
                            <div class="col-md-9"><h4>
                                    <?php
                                    if($alumno['estado'] > 0){
                                        echo '<span class="label label-success"> Correctamente activada</span>';
                                    }else{
                                        echo '<span class = "label label-danger"> Sin activar</span>';
                                    }
                                    ?>
                                </h4><hr></div>
                        </div>
                        <div class="panel-footer" style="text-align: center">
                            <button class="btn btn-xs btn-info" onclick="mostrarChangePass()">Cambiar contrase&ntilde;a</button>&nbsp;
                            <button class="btn btn-xs btn-info" onclick="mostrarInviteFriend()">Invitar a un amigo</button>
                            <?php
                            if($alumno['estado'] == 0){
                                echo '<button class="btn btn-xs btn-info" onclick="reSendActivation()">Enviar correo de activaci&oacute;n</button>&nbsp;';
                            }
                            ?>
                        </div>
                        <div class="panel-body" style="display: none" id="idDivChangePass">
                            <div class="form-group">
                                <label for="idChangePass_pass"><span class="fa fa-fw fa-lg fa-lock"></span> Contrase&ntilde;a</label>
                                <input class="form-control" placeholder="Ingrese su contrase&ntilde;a" type="password" id="idChangePass_pass">
                            </div>
                            <div class="form-group">
                                <label for="idChangePass_new1"><span class="fa fa-fw fa-lg fa-lock"></span> Ingrese su nueva contrase&ntilde;a</label>
                                <input class="form-control" placeholder="Ingrese nueva contrase&ntilde;a" type="password" id="idChangePass_new1">
                            </div>
                            <div class="form-group">
                                <label for="idChangePass_new2"><span class="fa fa-fw fa-lg fa-lock"></span> Repita su nueva contrase&ntilde;a</label>
                                <input class="form-control" placeholder="Repita su nueva contrase&ntilde;a" type="password" id="idChangePass_new2">
                            </div>
                            <div class="form-group">
                                <button class="form-control btn btn-sm btn-default" onclick="goChangePass_()">Cambiar contrase&ntilde;a</button>
                            </div>
                        </div>


                        <div class="panel-body" style="display: none;" id="idDivInvite">
                            <div class="form-group">
                                <label for="idChangePass_new2"><span class="fa fa-fw fa-lg fa-lock"></span>Ingrese el correo electr&oacute;nico de su amigo</label>
                                <input class="form-control" placeholder="Ingrese correo electronico" type="email" id="idInviteMail">
                            </div>
                            <div class="form-group">
                                <button class="form-control btn btn-sm btn-default" onclick="goInviteFriend()">Enviar invitaci&oacute;n</button>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-default pull-right" data-dismiss="modal"><span class="fa fa-fw fa-lg fa-times"></span> Salir</button>
            </div>
        </div>
    </div>
</div>
<script src="/views/js/login.js"></script>