<?php
class Estudiante{
  
    // conexión de la base de datos
    private $con;
    private $table_name = "Usuario";
  
    // propiedades de la tabla
    public $id;
    public $nombre;
    public $apellidos;
    public $edad;
  
    // constructor con la conexión a la base de datos
    public function __construct($db){
        $this->con = $db;
    }

//lee a los estudiantes
function leer(){
  
    // hace la consulta
    $query = "SELECT Id, Nombre, Apellidos, Edad FROM Usuario";
  
    // prepara la consulta
    $stmt = $this-> con->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
}
?>