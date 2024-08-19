<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TecnoClick - Iniciar Sesión</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="../assets/favicon-32x32.png" type="image/png">
</head>

<body>
    <!-- Incluir el header -->
    <?php include '../Header/header.html'; ?>


    <main>
        <section class="login">
            <h2>Iniciar Sesión</h2>
            <form action="../../Backend/API-InicioSesion.php" method="post">

            <p><?php if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
            {echo "<div id='login-mensaje'>Usuario o contraseña invalido </div>";}?></p>

                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

            <div class="button-container">
                 <button type="submit">Iniciar Sesión</button>
            </div>
            
            <div class="btn-container">
                <p><a href="../Cambiar-Contrasena/Cambiar-Contrasena.php">Cambiar contraseña</a></p>
            </div>

            <div class="btn-container">
                <p><a href="../Eliminar-Usuario/Eliminar-Usuario.php">Eliminar usuario</a></p>
            </div>
        </form>
        </section>
    </main>

    <!-- Incluir el footer -->
    <?php include '../Footer/footer.html'; ?>
</body>
</html>