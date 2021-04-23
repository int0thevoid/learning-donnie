<?php
class Pregunta
{
    var $id_pregunta;
    var $id_leccion;
    var $respuesta_c;
    var $enunciado;

    function Pregunta($id_pregunta, $id_leccion, $respuesta_c, $enunciado){
        $this->id_pregunta  = $id_pregunta;
        $this->id_leccion   = $id_leccion;
        $this->respuesta_c  = $respuesta_c;
        $this->enunciado    = $enunciado;
    }

    /**
     * @return mixed
     */
    public function getIdPregunta()
    {
        return $this->id_pregunta;
    }

    /**
     * @return mixed
     */
    public function getIdLeccion()
    {
        return $this->id_leccion;
    }

    /**
     * @return mixed
     */
    public function getRespuestaC()
    {
        return $this->respuesta_c;
    }

    /**
     * @return mixed
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }



}