<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TecnoClick - Inicio</title>
    <link rel="stylesheet" href="inicio.css">
    <link rel="icon" href="../assets/favicon-32x32.png" type="image/png">
</head>
<body>
    <!-- Incluir el header -->
    <?php include '../Header/header.html'; ?>

    <main>
        <section class="inicio">
            <h2>Bienvenidos a TecnoClick</h2>
            <p>Los mejores productos tecnológicos a tu alcance.</p>

            <div class="productos">
                <img src="../assets/Camaras/C-Inicio.png" alt="Producto 1">
                <img src="../assets/Celulares/CLS-inicio.png" alt="Producto 2">
                <img src="../assets/Computadores/PC-Inicio.png" alt="Producto 3">
                <img src="../assets/Smartwatch/R-01.png" alt="Producto 4">
                <img src="../assets/Tablets/T-01.png" alt="Producto 5">
            </div>
             
            <div class="btn-container">
                <a href="../Pagina-Registro/registro.php" class="btn">Regístrate Ahora</a>
            </div>
        </section>
    </main>

    <!-- Incluir el footer -->
    <?php include '../Footer/footer.html'; ?>
</body>
</html>