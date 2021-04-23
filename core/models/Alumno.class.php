<?php
class Alumno
{
    var $id_alumno;
    var $nombre;
    var $apellido;
    var $email;
    var $contrasena;
    var $semestre;
    var $estado;
    var $keypass;

    function __construct($pId_alumno, $pNombre, $pApellido, $pEmail, $pContrasena, $pSemestre, $pEstado, $pKeypass)
    {
        $this->id_alumno = $pId_alumno;
        $this->nombre = $pNombre;
        $this->apellido = $pApellido;
        $this->email = $pEmail;
        $this->contrasena = $pContrasena;
        $this->semestre = $pSemestre;
        $this->estado = $pEstado;
        $this->keypass = $pKeypass;
    }

    function getId_alumno()
    {
        return $this->id_alumno;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getContrasena()
    {
        return $this->contrasena;
    }

    function getSemestre()
    {
        return $this->semestre;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function getKeypass()
    {
        return $this->keypass;
    }
    
    function setNombre($pNombre){
        $this->nombre = $pNombre;
    }
    
    function setApellido($pApellido){
        $this->apellido = $pApellido;
    }

    function setEmail($pEmail){
        $this->email = $pEmail;
    }

    function setContrasena($pContrasena){
        $this->contrasena = $pContrasena;
    }
    
    function setSemestre($pSemestre){
        $this->semestre = $pSemestre;
    }

    function setEstado($pEstado){
        $this->estado = $pEstado;
    }
    
    function setKeypass($pKeypass){
        $this->keypass = $pKeypass;
    }    
}
