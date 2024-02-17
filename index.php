<?php include('conexion.php'); 

$obj = new conectar();
$conexion = $obj->conexion();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribuidora del Sur</title>
    <link rel="stylesheet" href="../Distribuidora/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>  -->
</head>

<body>

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
            <a href="promociones.php" class="nav-item" style="text-decoration:none; color:white"><i class="fas fa-gift"></i>
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


    <div class="productos-container" id="productosContainer">

        <!-- Producto 1 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 1";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>


        <div class="producto">
            <img src="../Distribuidora/images/1.jpg" alt="Producto 1">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 1";
    }
    ?>

        <!-- Producto 2 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 2";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/2.jpg" alt="Producto 2">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 12 unidades: $<?php echo $producto['precio_x12']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 2";
    }
    ?>

        <!-- Producto 3 -->

        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 3";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/heineken.jpg" alt="Producto 3">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 3";
    }
    ?>

        <!-- Producto 4 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
            FROM precios_productos
            WHERE id = 4";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/4.png" alt="Producto 4">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 4";
    }
    ?>
        <!-- Producto 5 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 5";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/imperial.jpg" alt="Producto 5">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 5";
    }
    ?>
    </div>


    <div class="productos-container">

        <!-- Producto 6 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 6";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/sprite.jpg" alt="Producto 6">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 6";
    }
    ?>

        <!-- Producto 7 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
            FROM precios_productos
            WHERE id = 7";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/7.jpg" alt="Producto 7">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 7";
    }
    ?>

        <!-- Producto 8 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 8";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/8.jpg" alt="Producto 8">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 8";
    }
    ?>


        <!-- Producto 9 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 9";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/9.jpg" alt="Producto 9">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 8 unidades: $<?php echo $producto['precio_x8']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 9";
    }
    ?>


        <!-- Producto 10 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 10";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/pepsi.jpg" alt="Producto 10">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 10";
    }
    ?>
        <!-- Producto 11 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 11";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/11.jpg" alt="Producto 11">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 11";
    }

    
    ?>


        <!-- Producto 12 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 12";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/12.jpg" alt="Producto 12">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 12";
    }

    
    ?>

        <!-- Producto 13 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
            FROM precios_productos
            WHERE id = 13";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/agua.jpg" alt="Producto 13">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 13";
    }

    
    ?>


        <!-- Producto 14 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 14";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/bidon.jpg" alt="Producto 14">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 3 unidades: $<?php echo $producto['precio_x3']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 14";
    }

    
    ?>
    </div>

    <div class="productos-container">
        <!-- Producto 15 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 15";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>


        <div class="producto">
            <img src="../Distribuidora/images/15.jpeg" alt="Producto 15">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 15";
    }
    ?>

        <!-- Producto 16 -->
        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
    FROM precios_productos
            WHERE id = 16";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/16.jpg" alt="Producto 16">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 16";
    }
    ?>

        <!-- Producto 17 -->

        <?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
            FROM precios_productos
            WHERE id = 17";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>



        <div class="producto">
            <img src="../Distribuidora/images/17.jpg" alt="Producto 17">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 17";
    }
    ?>


<!-- Producto 18 -->
<?php
    
    $sql = "SELECT nombre_producto, precio_unidad, precio_x3, precio_x6, precio_x8, precio_x12
            FROM precios_productos
            WHERE id = 18";
    
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $producto = mysqli_fetch_assoc($result);
    ?>


        <div class="producto">
            <img src="../Distribuidora/images/frizze.jpg" alt="Producto 18">
            <p style="font-weight: bold; text-transform: uppercase;"><?php echo $producto['nombre_producto'];?></p>
            <p>Precio por unidad: $<?php echo $producto['precio_unidad']; ?></p>
            <p>Precio por 6 unidades: $<?php echo $producto['precio_x6']; ?></p>
        </div>


        <?php
    } else {
        echo "No se encontraron datos para el Producto 18";
    }
    ?>


    </div>

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