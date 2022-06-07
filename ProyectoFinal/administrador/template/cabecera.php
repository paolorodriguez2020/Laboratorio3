<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/stylesInicioHeader.css"/>
    <link rel="stylesheet" href="../../CSS/stylesInicioHeader.css"/>
    <link rel="stylesheet" href="../../CSS/stylesProductos.css"/>
    <title>Administrador</title>
</head>
<body>
    <?php $url="http://".$_SERVER['HTTP_HOST']."/ProyectoFinal" ?>
    <header >
        <nav class="nav-container">
            <a href="">Administrador del sitio web</a>
            <a href="<?php echo $url?>/administrador/inicio.php">Inicio</a>
            <a href="<?php echo $url?>/administrador/seccion/productos.php"">Libros</a>
            <a href="<?php echo $url?>/administrador/seccion/cerrar.php"">Cerrar</a>
            <a href="<?php echo $url;?>">Ver sitio web</a>
        </nav>
    </header>