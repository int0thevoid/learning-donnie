<?php

/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 08-10-16
 * Time: 4:25 PM
 */
class Alternativa
{
    var $id_alternativa;
    var $id_pregunta;
    var $id_leccion;
    var $label;


    function Alternativa($id_alternativa, $id_pregunta, $id_leccion, $label)
    {
        $this->id_alternativa = $id_alternativa;
        $this->id_pregunta = $id_pregunta;
        $this->id_leccion = $id_leccion;
        $this->label = $label;
    }

    function get_idAlternativa()
    {
        return ($this->id_alternativa);
    }

    function get_idLeccion()
    {
        return ($this->id_leccion);
    }

    function get_idPregunta()
    {
        return ($this->id_pregunta);
    }

    function get_label()
    {
        return ($this->label);
    }
}