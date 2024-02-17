<?php


include('conexion.php');

$obj = new conectar();
$conexion = $obj->conexion();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['id']) && isset($_POST['nombre'])) {
        
        $ids = $_POST['id'];
        $nombres = $_POST['nombre'];
        $preciosUnidad = $_POST['precio_unidad'];
        $preciosX3 = $_POST['precio_x3'];
        $preciosX6 = $_POST['precio_x6'];
        $preciosX8 = $_POST['precio_x8'];
        $preciosX12 = $_POST['precio_x12'];

        // Iterar sobre los datos y actualizar cada producto
        for ($i = 0; $i < count($ids); $i++) {
            $id = $ids[$i];
            $nombre = $nombres[$i];
            $precioUnidad = $preciosUnidad[$i] !== '' ? $preciosUnidad[$i] : 'NULL';
            $precioX3 = $preciosX3[$i] !== '' ? $preciosX3[$i] : 'NULL';
            $precioX6 = $preciosX6[$i] !== '' ? $preciosX6[$i] : 'NULL';
            $precioX8 = $preciosX8[$i] !== '' ? $preciosX8[$i] : 'NULL';
            $precioX12 = $preciosX12[$i] !== '' ? $preciosX12[$i] : 'NULL';

           
            $sql = "UPDATE precios_productos SET 
                    nombre_producto = '$nombre', 
                    precio_unidad = $precioUnidad, 
                    precio_x3 = $precioX3,
                    precio_x6 = $precioX6,
                    precio_x8 = $precioX8,
                    precio_x12 = $precioX12 
                    WHERE id = $id";

            $resultado = mysqli_query($conexion, $sql);

            if (!$resultado) {
                echo "Error al actualizar los datos del producto con ID $id: " . mysqli_error($conexion);
                exit;
            }
        }

        echo "Datos actualizados correctamente";

        echo '<br><br> <button type="button" style="background-color: orange; color: white;" class="btn btn-primary" onclick="location.href=\'index.php\';">Volver al inicio</button>';
        echo '<br><br>  <button type="button" style="background-color: orange; color: white;" class="btn btn-secondary" onclick="location.href=\'formulario.php\';">Volver al formulario</button>';

    } else {
        echo "Datos insuficientes para actualizar";
    
        echo '<br><br> <button type="button" style="background-color: orange; color: white;" class="btn btn-primary" onclick="location.href=\'index.php\';">Volver al inicio</button>';
        echo '<br><br>  <button type="button" style="background-color: orange; color: white;" class="btn btn-secondary" onclick="location.href=\'formulario.php\';">Volver al formulario</button>';
    }
    
} else {
    echo "Acceso no permitido";
}
?>
