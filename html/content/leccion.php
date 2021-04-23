<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 11-09-16
 * Time: 9:31 PM
 */

?>
<div class="modal" id="modal_leccion" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="modalContextLesson">
                <div id="idDivMsgLeccion"></div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color:black;"><span class="fa fa-fw fa-lg fa-book"></span>Selecci&oacute;ne la alternativa correcta</h4>
                </div>
                <div class="modal-body modal-form">

                    <div class="progress" id="idDivProgress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" id="id_progress_bar"
                                           aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        </div>
                    </div>
                    
                    <div role="form" class="modal-body" name="content_div" style="margin-left:4%; display: block;" id='div_content_lesson'>
                        <span class="fa fa-lg fa-question-circle inline" style="display: inline;"><div style="margin-left:4%; display: inline;" class="  inline info" id="id_enunciado"></div></span>                        
                        <div style="margin-top: 3%; display: none;">

                        </div>                        
                        <div style="margin-top: 5%">
                            
                            <div class="form-group" onclick="document.getElementById('radio_1').checked = true"><input id="radio_1" type="radio" value="1" name="alternativas">&nbsp;&nbsp;<label id="lbl_1">      </label></div>
                            <div class="form-group" onclick="document.getElementById('radio_2').checked = true"><input id="radio_2" type="radio" value="2" name="alternativas">&nbsp;&nbsp;<label id="lbl_2">      </label></div>
                            <div class="form-group" onclick="document.getElementById('radio_3').checked = true"><input id="radio_3" type="radio" value="3" name="alternativas">&nbsp;&nbsp;<label id="lbl_3">      </label></div>
                            <div class="form-group" onclick="document.getElementById('radio_4').checked = true"><input id="radio_4" type="radio" value="4" name="alternativas">&nbsp;&nbsp;<label id="lbl_4">      </label></div>
                        </div>
                        <div class="div_evaluar_pregunta">
                            <button id="btn_evaluar_pregunta" type="button" class="btn btn-primary btn-block center-block" style="margin-top: 5%"><span class="fa fa-fw fa-lg fa-check-circle"></span> Evaluar</button>
                        </div>


                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-default pull-left" onclick="" data-dismiss="modal"><span class="fa fa-fw fa-lg fa-remove"></span> Cerrar</button>
        </div>
        </div>
    </div>
</div>