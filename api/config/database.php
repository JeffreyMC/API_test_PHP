<?php

//crea la clase que se contectará a la base de datos
class Database{
    //se especifican las credenciales de la base de datos
    private $host = "localhost";
    private $db_name = "Estudiante";
    private $nombre_usuario = "root";
    private $password = 1234;

    //conexión
    public $con;
    //obtener la coneción de la base de datos
    public function getConnection(){
        $this->con = null;

        try{
            $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->nombre_usuario, $this->password);
            $this->con->exec("set names utf8"); 
        }catch(PDOException $exception){
            echo "Error de conneción: " . $exception->getMessage(); 
        }
        return $this->con;
    }
}
?>