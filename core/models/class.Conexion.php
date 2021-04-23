<?php
class Conexion extends \mysqli{
    public function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->connect_errno ? die('Error en la conexión a la base de datos') : null;
        $this->set_charset("utf8");
    }
    public function rows($query){
        return mysqli_num_rows($query);
    }
    public function liberar($query){
        return mysqli_free_result($query);
    }
    public function recorrer($query){
        return mysqli_fetch_array($query);
    }
    public function recorrer_assoc($query){
        return mysqli_fetch_assoc($query);
    }
    /*public function __construct(){
        $this->conexion = new mysqli($this->server, $this->usuario, $this->pass,$this->db);
        if($this->conexion->connect_errno){
            die("Fallo al tratar de conectar con MySQL: (".$this->conexion->connect_errno.")");
        }
    }
    public function getConexion(){ return $this->conexion;}
    public function cerrar(){
        $this->conexion->close();
    }*/
}
