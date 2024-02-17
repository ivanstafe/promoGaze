<?php


include('conexion.php');

$obj = new conectar();
$conexion = $obj->conexion();





$sql = "SELECT * FROM ofertas";
$resultado = mysqli_query($conexion, $sql);


if ($resultado && mysqli_num_rows($resultado) > 0) {
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Distribuidora/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Ofertas del Día</title>

    <!-- navbar -->
    <nav>

        <div class="nav-items left-items">
            <div class="logo">
                <a href="../Distribuidora/index.php">
                    <span class="gradient-text">Distribuidora del Sur</span>
                </a>
            </div>

        </div>


        <div class="nav-items right-items">
            <a href="index.php" class="nav-item" style="text-decoration:none; color:white"><i
                    class="fas fa-shopping-cart"></i> Productos</a>
            <a href="promociones.php" class="nav-item" style="text-decoration:none; color:white"><i
                    class="fas fa-gift"></i>
                Promociones</a>

            <div class="nav-item" onclick="openModal()" style="color: green; cursor: pointer;"><i
                    class="fas fa-sign-in-alt"></i> Iniciar Sesión</div>

        </div>
    </nav>
    
    <div class="contact-bar">
    <div class="whatsapp" style="margin-right: auto;">
        <a href="https://web.whatsapp.com/send?phone=+54 9 3425 25-xxxx" target="_blank"
            style="text-decoration: none; color: white;">
            <img src="images/whatssapp-icon.png" alt="WhatsApp Icon"
                style="vertical-align: middle; height: 35px; width: 35px;">
            <span style="vertical-align: middle;">Haga su pedido por WhatsApp</span>
        </a>
    </div>

    </div>


    <br><br>

    <!-- modal -->

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <button class="close" onclick="closeModal()">Cerrar</button>
            <h2>Iniciar Sesión</h2>
            <form id="loginForm">
                <label for="username">Nombre:</label>
                <input type="text" id="username" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" required>
                <button type="button" onclick="checkLogin()">Iniciar Sesión</button>
            </form>
        </div>
    </div>

    <script>
    function openModal() {
        document.getElementById("loginModal").style.display = "flex";
    }


    function closeModal() {
        document.getElementById("loginModal").style.display = "none";
    }

    function checkLogin() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        fetch('verificar_credenciales.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Respuesta del servidor:', data);

                if (data.success) {
                    closeModal();
                    window.location.href = "formulario.php";
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
    </script>



    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .pizarra {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .titulo-ofertas {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .resaltado {
        background-color: #ffff99;
        font-weight: bold;
    }

    @media screen and (max-width: 600px) {

    
        .pizarra {
            padding: 10px;
        }

        .titulo-ofertas {
            font-size: 20px;
        }

        table {
            font-size: 14px;
        }
    }
    </style>
</head>

<body>
    <div class="pizarra">
        <div class="titulo-ofertas">Ofertas del Día</div>
        <table>
            <tr>
                <th>Nº</th>
                <th>Promociones</th>
            </tr>
            <?php
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $id = $fila['id'];
                    $textoOferta = $fila['texto_oferta'];
                ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td class="<?php echo ($id % 2 == 0) ? 'resaltado' : ''; ?>"><?php echo $textoOferta; ?></td>
            </tr>
            <?php
                }
                ?>
        </table>
    </div>




    <?php
} else {
    echo "No hay ofertas disponibles.";
}
?>


    <div class="contact-bar">
        <div class="contact-info">
            <i class="fas fa-clock" style="margin-right:8px"></i>
            <p>Horarios: Lunes a Viernes 9:00 AM - 6:00 PM</p>
        </div>
        <div class="contact-info">
            <i class="fas fa-location-arrow"></i>

            <p style="margin: 0 10px;">Dirección: San Juan 2243</p>
        </div>
    </div>

</body>

</html>