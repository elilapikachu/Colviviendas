<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/variables-form.css" />
    <link rel="shortcut icon" href="./img/iconos/cerrar.png" type="image/x-icon">
    <title>Registro</title>
</head>

<body>
    <div class="register">
        <div class="register__box">
            <div class="register__value">
                <?php

                session_start();
                if (empty($_SESSION)) {
                    // La variable de sesión no está definida, es decir, la sesión no ha sido iniciada
                    //echo "La sesión no ha sido iniciada";
                
                } else {
                    // La variable de sesión está definida, es decir, la sesión ha sido iniciada
                    //echo "La sesión ha sido iniciada con el usuario: ".$_SESSION['id']." refresque para borrar";
                    session_unset();
                }
                include_once "../modulo/conexion.php";
                ?>

                <form action="registro-sql.php" class="register__form" id="signupForm" method="POST">
                    <div class="register__text">
                        <h2 class="tittle__registro">Registro</h2>

                        <p class="texto">
                            Registrate para disfrutar de nuestros ¡servicios!
                        </p>

                    </div>
                    <div class="register__input">
                        <ion-icon class="register__icon" name="finger-print"></ion-icon>
                        <label for="identificacion" class="register__label">Identificación</label>
                        <input type="text" name="identificacion" id="identificacion" class="register__input-text"
                            value="" required />
                    </div>
                    <div class="register__input">
                        <ion-icon class="register__icon" name="person-circle-outline"></ion-icon>
                        <label for="nombre" class="register__label">Nombres</label>
                        <input type="text" name="nombre" id="nombre" class="register__input-text" value="" required />
                    </div>
                    <div class="register__input">
                        <ion-icon class="register__icon" name="person-circle-outline"></ion-icon>
                        <label for="apellido" class="register__label">apellidos</label>
                        <input type="text" name="apellido" id="apellido" class="register__input-text" value=""
                            required />
                    </div>
                    <div class="register__input">
                        <ion-icon class="register__icon" name="mail-outline"></ion-icon>
                        <label for="email" class="register__label" class="register__label">Email</label>
                        <input type="email" name="email" class="register__input-text" id="email" value="" required />
                    </div>
                    <div class="register__input">
                        <?php

                        echo '<label for="tipo" class="register__label" >Tipo de persona</label>';
                        // echo "<input type='text' id='tipo' name='tipo' value=''>";
                        try {
                            // Ejecutando sql
                        
                            $matriz = $conexion->query("select * from tipo_persona where codigo_tipo != '03' Order by codigo_tipo;");

                            echo "<select id=tipo name=tipo class='register__select'>";
                            while ($row = $matriz->fetch()) {
                                echo "<option value=" . $row['codigo_tipo'] . ">" . $row['descripcion'] . "</option>";
                            }
                        } catch (PDOException $e) {
                            //Casa de que ocurra algun error
                            echo "Fallo el select " . $e->getMessage();
                        }

                        echo "</select>";

                        ?>
                    </div>
                    <div class="register__input">
                        <ion-icon id="togglePassword" class="register__icon" name="lock-closed-outline"></ion-icon>
                        <label for="contrasena" class="register__label">contraseña</label>
                        <input type="password" name="contrasena" class="register__input-text" id="contrasena"
                            required />
                    </div>
                    <div class="register__text">
                        <p class="register__texto">
                            ¿ya tienes cuenta? <a href="login.php" class="register__link" id="p">¡inicia sesión!</a>
                        </p>
                    </div>
                    <button class="register__button" type="submit">Registrarse</button>
                </form>

            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Agregar el script para mostrar y ocultar la contraseña -->

    <script src="./js/candado.js"></script>

</body >

</html >