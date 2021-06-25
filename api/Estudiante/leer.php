<?php
//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// conexión a base de datos
// incluir los archivos de la base de datos y los objetos creados
include_once '../config/database.php';
include_once '../objects/estudiante.php';
  
// se instancian
$database = new Database();
$db = $database->getConnection();
  
// inicializa el objeto
$estudiante = new Estudiante($db);


// query estudiantes
$stmt = $estudiante->leer();
$num = $stmt->rowCount();
  
// chekea que hayan más de 0 estudiantes
if($num>0){
  
    // arreglo de estudiantes
    $estudiantes_arr=array();
    $estudiantes_arr["records"]=array();
  
    //declaracion de las variables
    $id = null;
    $nombre = null;
    $apellidos = null;
    $edad = null;

    // recibe los datos de la tabla
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $estudiante_usuario=array(
            "Id" => $id,
            "Nombre" => $nombre,
            "Apellidos" => $apellidos,
            "Edad" => $edad
        );
  
        array_push($estudiantes_arr["records"], $estudiante_usuario);
    }
  
    // si todo salió bien - 200 OK
    http_response_code(200);
  
    // muestra los estudiantes en formato JSON
    echo json_encode($estudiantes_arr);
}

else{
  
    // si no hay estudiantes envía un código 404
    http_response_code(404);
  
    // Envía un JSON mencionando que no hay estudiantes
    echo json_encode(
        array("message" => "No existen estudiantes.")
    );
}

?>