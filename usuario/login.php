<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/variables-form.css">
    <link rel="shortcut icon" href="./img/iconos/usuario.png" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="login">
        <div class="login__box">
            <div class="login__value">
                <form class="register__form" id="loginForm" action="login.php">
                    <div class="login__text">
                        <h2 class="tittle">Inicio de sesión</h2>
                    </div>
                    <div class="login__input">
                        <ion-icon class="login__icon" name="finger-print"></ion-icon>
                        <input type="text" name="identificacion" class="login__input-text" id="identificacion"
                            placeholder="Ingresa tu Identificación" required />
                    </div>
                    <div class="login__input">
                        <ion-icon id="togglePassword" class="login__icon" name="lock-closed-outline"></ion-icon>
                        <input type="password" name="contrasena" class="login__input-text" id="contrasena"
                            placeholder="Ingresa tu contraseña" required />
                    </div>
                    <div class="login__text">
                        <p class="login__texto">
                            ¿No tienes cuenta? <a href="registro.php" class="login__link">¡Regístrate!</a>
                        </p>
                    </div>
                    <button class="login__button" type="submit">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (empty($_GET['identificacion'])) {
        $vusuario = '';
    } else {
        $vusuario = $_GET['identificacion'];
    }

    if (empty($_GET['contrasena'])) {
        $vclave = '';
    } else {
        $vclave = $_GET['contrasena'];
    }

    if (!empty($_GET['contrasena']) && !empty($_GET['identificacion'])) {
        // Conexión a la base de datos
        $mysql_host = 'localhost';
        $mysql_user = 'root';
        $password = '';

        $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexión con DB');
        $selected = mysqli_select_db($dbhandle, 'colviviendas') or die("No se encontró el esquema");

        // Consulta para verificar las credenciales
        $result = mysqli_query($dbhandle, "SELECT identificacion, nombre, apellido, contrasena, tipo_persona FROM persona WHERE identificacion = '" . $vusuario . "' AND contrasena = '" . $vclave . "';");

        $vregistros = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($vregistros > 0) {
            session_start();
            $_SESSION['identificacion'] = $row['identificacion'];
            $_SESSION['usuario'] = $row['nombre'];
            $_SESSION['usuario-apellido'] = $row['apellido'];
            $_SESSION['tipo_persona'] = $row['tipo_persona'];

            if ($row['tipo_persona'] == '03') {
                header("location: ../read/botones.php");
                exit;
            } else {
                header("location: ./index.php");
                exit;
            }

        } else {
            echo "<script>alert('Identificación o Contraseña incorrectos.')</script>";
        }
    }
    ?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Agregar el script para mostrar y ocultar la contraseña -->

    <script src="./js/candado.js"></script>

</body >

</html >