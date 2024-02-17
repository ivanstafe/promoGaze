<?php
session_start();

header('Content-Type: application/json'); // Asegura que la respuesta se interprete como JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        if ($username === "ivan" && $password === "1234") {
         
            $_SESSION['username'] = $username;

            // Redirige a formulario.php
            echo json_encode(array('success' => true));
            exit;
        } else {
           
            echo json_encode(array('success' => false, 'message' => 'Credenciales incorrectas. Inténtalo de nuevo.'));
            exit;
        }
    } else {
       
        echo json_encode(array('success' => false, 'message' => 'Credenciales no proporcionadas.'));
        exit;
    }
}
?>

