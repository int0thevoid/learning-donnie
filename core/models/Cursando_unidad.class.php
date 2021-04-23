<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 13-10-16
 * Time: 07:57
 */

class Cursando_unidad
{
    var $id_alumno;
    var $id_unidad;
    var $id_leccion_actual;
    var $fecha_inicial;

    function Cursando_unidad($id_alumno, $id_unidad, $id_leccion_actual, $fecha_inicial){
        $this->id_alumno            = $id_alumno;
        $this->id_unidad            = $id_unidad;
        $this->id_leccion_actual    = $id_leccion_actual;
        $this->fecha_inicial        = $fecha_inicial;
    }

    /**
     * @return mixed
     */
    public function getIdAlumno()
    {
        return $this->id_alumno;
    }

    /**
     * @param mixed $id_alumno
     */
    public function setIdAlumno($id_alumno)
    {
        $this->id_alumno = $id_alumno;
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
    public function getIdLeccionActual()
    {
        return $this->id_leccion_actual;
    }

    /**
     * @param mixed $id_leccion_actual
     */
    public function setIdLeccionActual($id_leccion_actual)
    {
        $this->id_leccion_actual = $id_leccion_actual;
    }

    /**
     * @return mixed
     */
    public function getFechaInicial()
    {
        return $this->fecha_inicial;
    }

    /**
     * @param mixed $fecha_inicial
     */
    public function setFechaInicial($fecha_inicial)
    {
        $this->fecha_inicial = $fecha_inicial;
    }


}