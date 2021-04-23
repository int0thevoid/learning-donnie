<?php

/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 10-10-16
 * Time: 17:52
 */
class Curso
{
    var $id_curso;
    var $nombre;
    var $contenido;
    var $descripcion;
    var $cant_unidades;

    function __construct($id_curso, $nombre, $contenido, $descripcion, $cant_unidades)
    {
        $this->id_curso = $id_curso;
        $this->nombre = $nombre;
        $this->contenido = $contenido;
        $this->descripcion = $descripcion;
        $this->cant_unidades = $cant_unidades;
    }

    function getId_curso(){
        return $this->id_curso;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getContenido(){
        return $this->contenido;
    }
    function getDescripcion(){
        return $this->descripcion;
    }
    function getCant_unidades(){
        return $this->cant_unidades;
    }

}