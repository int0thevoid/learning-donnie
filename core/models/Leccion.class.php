<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 12-10-16
 * Time: 23:10
 */
class Leccion
{
    var $id_leccion;
    var $id_unidad;
    var $cant_preguntas;
    var $descripcion;

    function Leccion($id_leccion, $id_unidad, $cant_preguntas, $descripcion){
        $this->id_leccion = $id_leccion;
        $this->id_unidad = $id_unidad;
        $this->cant_preguntas = $cant_preguntas;
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getIdLeccion()
    {
        return $this->id_leccion;
    }

    /**
     * @param mixed $id_leccion
     */
    public function setIdLeccion($id_leccion)
    {
        $this->id_leccion = $id_leccion;
    }

    /**
     * @return mixed
     */
    public function getIdUnidad()
    {
        return $this->id_unidad;
    }

    /**
     * @param mixed $id_unidad
     */
    public function setIdUnidad($id_unidad)
    {
        $this->id_unidad = $id_unidad;
    }

    /**
     * @return mixed
     */
    public function getCantPreguntas()
    {
        return $this->cant_preguntas;
    }

    /**
     * @param mixed $cant_preguntas
     */
    public function setCantPreguntas($cant_preguntas)
    {
        $this->cant_preguntas = $cant_preguntas;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }



}