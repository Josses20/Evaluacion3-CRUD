<?php

Class Conexion{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conexion;


    public function __construct(){
        require_once "DB_CFG.php";
        $this->host = host;        
        $this->user = user;        
        $this->pass = pass;        
        $this->db = db;        
    }

    public function Conecta(){

        $this->conexion = new mysqli($this->host,$this->user,$this->pass,$this->db);

        if($this->conexion->connect_errno){
            die("Conexion Error: (". $this->conexion->connect_errno. ") " . $this->conexion->connect_error);
        }
    }

    public function Desconecta($conexion){
        $this->conexion->close();
    }

    public function Ejecuta($consulta){
        $result = $this->conexion->query($consulta);
        return $result;
    }
 
}   


?>