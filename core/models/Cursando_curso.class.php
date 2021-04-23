<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 11-10-16
 * Time: 22:19
 */

class Cursando_curso
{
    var $id_alumno;
    var $id_curso;
    var $id_unidad_actual;
    var $fecha_inicial;
    function Cursando_curso($id_alumno, $id_curso, $id_unidad_actual, $fecha_inicial){
        $this->id_alumno        = $id_alumno;
        $this->id_curso         = $id_curso;
        $this->id_unidad_actual = $id_unidad_actual;
        $this->fecha_inicial    = $fecha_inicial;
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
    public function getIdCurso()
    {
        return $this->id_curso;
    }

    /**
     * @param mixed $id_curso
     */
    public function setIdCurso($id_curso)
    {
        $this->id_curso = $id_curso;
    }

    /**
     * @return mixed
     */
    public function getIdUnidadActual()
    {
        return $this->id_unidad_actual;
    }

    /**
     * @param mixed $id_unidad_actual
     */
    public function setIdUnidadActual($id_unidad_actual)
    {
        $this->id_unidad_actual = $id_unidad_actual;
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