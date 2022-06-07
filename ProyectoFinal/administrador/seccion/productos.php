<?php include( '../template/cabecera.php')?>

<?php 
//obtener lo que hay que en los inputs y botones 
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
include("../config/bd.php");

echo "</br>";
 

switch($accion){

    case "Agregar":
        //preparo la conexion y inserto los datos a la bd 
        $sentenciaSQL=$conexion->prepare(" INSERT INTO libros (  nombre, imagen) VALUES (:nombre ,:imagen );");
        //isertardo la informacion de el usuario a mi base de datos 
        
        $sentenciaSQL->bindParam(':nombre',$txtNombre);   
        $sentenciaSQL->bindParam(':imagen',$txtImagen);  
        $sentenciaSQL->execute();
        
        break;

    case "Modificar":
        echo "Pesionado boton Modificar ";
        break; 

    case "Cancelar":
        echo "Pesionado boton Cancelar ";
        break; 

    case "Selecionar":
        //seleccionamos los registros de acuendo a lo que nos estan enviando 
        $sentenciaSQL= $conexion->prepare("SELECT * FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id' ,$txtID);
        $sentenciaSQL->execute();
        //cargar los datos uno a uno y pueda asignar las variables txtnombre y asignaler el atributo
        $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtNombre=$libro['nombre'];
        $txtImagen=$libro['imagen'];
        break;    
    case "Borrar":
        //borrar los libros cuando indentifica el ID
        //Selecciona los libros con el ID que le pasamos como parametros 
        $sentenciaSQL= $conexion->prepare("DELETE FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id' ,$txtID);
        $sentenciaSQL->execute();
        break;
}
//seleccionar todos los libros 
$sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
//ejecuto la instruccion
$sentenciaSQL->execute();
//metodo fetch (recupera todos los registros )
$listasLibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
        <form action="" method="POST" enctype="multipart/form-data" class="form1">

            <div class="container-input">
                <label for="">ID:</label>
                <input type="text" name="txtID" id="txtID" placeholder="ID" value="<?php echo $txtID; ?>">
            </div>

            <div class="container-input">
            <label for="">Nombre:</label>
                <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre" value="<?php echo $txtNombre; ?>" >
            </div>

            <div class="container-input">
            <label for="">Imagen:</label>
                <?php echo $txtImagen; ?>
                <input type="file" name="txtImagen" id="txtImagen" placeholder="Imagen" >
            </div>

            <div class="btn-group">
                <input type="submit" name="accion"  value="Agregar">
                <input type="submit" name="accion" value="Modificar">
                <input type="submit" name="accion" value="Cancelar">
            </div>
        </form>

    </br>

    <table class="table" style="border:1px solid black  ">
        <thead>
            <trs>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($listasLibros as $libro){ ?>
            <tr>
                <td><?php echo $libro['id'];?></td>
                <td><?php echo $libro['nombre'];?></td>
                <td><?php echo $libro['imagen'];?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $libro['id']; ?>">
                        <input type="submit" name="accion" value="Borrar">
                        <input type="submit" name="accion" value="Selecionar">

                    </form>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php include('../template/pie.php')?>