<div class="modal fade" id="Recoverypass" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="idDivRecoveryMsg"></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red;"><span class="fa fa-fw fa-lg fa-lock"></span> Recuperar Contrase&ntilde;a</h4>
            </div>
            <div class="modal-body">
                <div role="form" onkeypress="">
                    <div class="form-group">
                        <label for="idTxtEmail"><span class="fa fa-fw fa-lg fa-user"></span>Email</label>
                        <input type="email" class="form-control" id="idTxtEmailLostPass" name="txtEmail" placeholder="Ingrese Email" required="">
                    </div>
                    <button type="button" class="btn btn-default btn-success btn-block" onclick="goLostPass()"><span class="fa fa-fw fa-lg fa-mail-reply"></span>Enviar</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="fa fa-fw fa-lg fa-remove"></span> Cancelar</button>
            </div>
        </div>
        <script src="/views/js/recoverypass.js"></script>
    </div>
</div>