<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TecnoClick - Registro</title>
    <link rel="stylesheet" href="registro.css">
    <link rel="icon" href="../assets/favicon-32x32.png" type="image/png">
</head>
<body>
    <?php include '../Header/header.html'; ?>
    <main>
        <section class="registro">
            <h2>Registro de Usuario</h2>
            <form action="../../Backend/API-Registro.php" method="get">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="button-container">
                <button type="submit">Registrar</button>
                </div>
               
            </form>
        </section>
    </main>
    <?php include '../Footer/footer.html'; ?>
</body>
</html>