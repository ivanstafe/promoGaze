<?php


include('conexion.php');

$obj = new conectar();
$conexion = $obj->conexion();


session_start();
if (!isset($_SESSION['username'])) {
    
    header('Location: index.php');
    exit;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    for ($i = 1; $i <= 5; $i++) {
        
        $campoTexto = "texto_oferta_" . $i;
        $campoId = "id_oferta_" . $i;

        
        $idOferta = $_POST[$campoId];
        $textoOferta = $_POST[$campoTexto];

        
        $sql = "UPDATE ofertas SET texto_oferta = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $textoOferta, $idOferta);
        $stmt->execute();
        $stmt->close();
    }

   
    header('Location: formulario.php?success=true');
    exit;
} else {
    
    header('Location: formulario.php');
    exit;
}
?>
