<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 11-10-16
 * Time: 20:44
 */
class Unidad
{
    var $id_unidad;
    var $id_curso;
    var $numero;
    var $cant_lecciones;
    var $descripcion;

    function Unidad($id_unidad, $id_curso, $numero, $cant_lecciones, $descripcion){
        $this->id_unidad = $id_unidad;
        $this->id_curso = $id_curso;
        $this->numero = $numero;
        $this->cant_lecciones = $cant_lecciones;
        $this->descripcion = $descripcion;
    }

    function getId_unidad(){
        return $this->id_unidad;
    }

    function getId_curso(){
        return $this->id_curso;
    }

    function getNumero(){
        return $this->numero;
    }

    function getCant_lecciones(){
        return $this->cant_lecciones;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    /**
     * @param mixed $id_unidad
     */
    public function setIdUnidad($id_unidad)
    {
        $this->id_unidad = $id_unidad;
    }

    /**
     * @param mixed $id_curso
     */
    public function setIdCurso($id_curso)
    {
        $this->id_curso = $id_curso;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @param mixed $cant_lecciones
     */
    public function setCantLecciones($cant_lecciones)
    {
        $this->cant_lecciones = $cant_lecciones;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }



}