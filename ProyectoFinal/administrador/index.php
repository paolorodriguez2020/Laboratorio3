<?php 
if($_POST){
    header('Location:inicio.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/stylesAdmin.css"/>
    <title>Administrador del sitio web</title>
</head>
<body >
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="celdas"> 
                <label for="">Usuario:</label>
                <input type="text" name="usuario" placeholder="Escribe tu Usuario"  required>
            </div>
            <div  class="celdas"> 
                <label for="">Contraseña:</label>
                <input type="password" name="contraseña" placeholder="Escribe tu contraseña" required>
            </div>
            <div class="container-button"> 
                <input type="submit" name="button-login" value="Entrar al administrador" class="button">
            </div>
        </form>
        </div>
    
</body>
</html>