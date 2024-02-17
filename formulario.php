<?php


include('conexion.php');

$obj = new conectar();
$conexion = $obj->conexion();


session_start();
if (!isset($_SESSION['username'])) {
    
    header('Location: index.php');
    exit;
}


$sql = "SELECT * FROM precios_productos";
$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
   
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos y Ofertas</title>

</head>

<body>
    <h2>Editar Productos</h2>
    <form action="actualizar_productos.php" method="POST">
        <?php
            
            while ($producto = mysqli_fetch_assoc($result)) {
            ?>
        <div>
            <input type="hidden" name="id[]" value="<?php echo $producto['id']; ?>">
            <label for="nombre_<?php echo $producto['id']; ?>">Nombre:</label>
            <input type="text" id="nombre_<?php echo $producto['id']; ?>" name="nombre[]"
                value="<?php echo $producto['nombre_producto']; ?>">
            <label for="precio_unidad_<?php echo $producto['id']; ?>">Unidad:</label>
            <input type="text" id="precio_unidad_<?php echo $producto['id']; ?>" name="precio_unidad[]"
                value="<?php echo $producto['precio_unidad']; ?>">
            <label for="precio_x3_<?php echo $producto['id']; ?>">X3:</label>
            <input type="text" id="precio_x3_<?php echo $producto['id']; ?>" name="precio_x3[]"
                value="<?php echo $producto['precio_x3']; ?>">
            <label for="precio_x6_<?php echo $producto['id']; ?>">X6:</label>
            <input type="text" id="precio_x6_<?php echo $producto['id']; ?>" name="precio_x6[]"
                value="<?php echo $producto['precio_x6']; ?>">
            <label for="precio_x8_<?php echo $producto['id']; ?>">X8:</label>
            <input type="text" id="precio_x8_<?php echo $producto['id']; ?>" name="precio_x8[]"
                value="<?php echo $producto['precio_x8']; ?>">
            <label for="precio_x12_<?php echo $producto['id']; ?>">X12:</label>
            <input type="text" id="precio_x12_<?php echo $producto['id']; ?>" name="precio_x12[]"
                value="<?php echo $producto['precio_x12']; ?>">
        </div>
        <?php
            }
            ?>
        <br>
        <button type="submit" style="background-color: green; color: white;">Guardar Cambios</button>
    </form>

    <?php
} else {
    echo "No se encontraron productos";
}
?>


    <?php

$sql = "SELECT * FROM ofertas";
$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Ofertas</title>
    </head>

    <body>
        <h2>Editar Ofertas</h2>
        <form action="actualizar_ofertas.php" method="POST">
            <?php
            // Iterar sobre los resultados y mostrar un campo de entrada para cada oferta
            $count = 1;
            while ($oferta = mysqli_fetch_assoc($result)) {
            ?>
            <div>
                <label for="texto_oferta_<?php echo $count; ?>">Oferta <?php echo $count; ?>:</label>
                <input type="text" id="texto_oferta_<?php echo $count; ?>" name="texto_oferta_<?php echo $count; ?>"
                    value="<?php echo $oferta['texto_oferta']; ?>">
                <input type="hidden" name="id_oferta_<?php echo $count; ?>" value="<?php echo $oferta['id']; ?>">
            </div>
            <?php
                $count++;
            }
            ?>
            <br>
            <button type="submit" style="background-color: green; color: white;">Guardar Cambios</button>
        </form>

        <br><br>

        <button type="button" style="background-color: orange; color: white;" class="btn btn-primary"
            onclick="location.href='index.php';">Volver al inicio</button>


        <button type="button" style="background-color: orange; color: white;" class="btn btn-secondary"
            onclick="location.href='formulario.php';">Volver al
            formulario</button>


        <?php
} else {
    echo "No se encontraron ofertas";
}
?>
    </body>

    </html>