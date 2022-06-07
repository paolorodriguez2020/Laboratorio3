
<?php 
$host = "localhost"; 
$bd = "sitio"; 
$usuario ="root"; 
$contrasenia = "";

try {
    //crear una conexion a la base de datos y valida la conexion
    $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
   
} catch ( Exception $ex){
    //imprime el error 
    echo $ex->getMessage();
   
}
?>