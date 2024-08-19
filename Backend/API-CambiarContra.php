<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$cambiar_contrasena =$_POST["cambiar_contrasena"];
$usuario=$_POST["usuario"]; 

// Función de validación de contraseña
function validarContrasena($cambiar_contrasena) {
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$cambiar_contrasena); // Al menos una letra, un número, y longitud mínima de 8 caracteres
}

$errores = [];


if (!validarContrasena($cambiar_contrasena)) {
    $errores[] = "Contraseña inválida. Debe tener al menos 8 caracteres, incluyendo al menos una letra minuscula y mayuscula y un número.";
}


// Mostrar errores si los hay
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p>$error</p>";
    }
    exit; // Detener el script si hay errores
}

    try{

$base=new PDO('mysql:host=localhost; dbname=tecnoclick', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //METODO CON DOS PARAMETROS PREDE PARA LOS ERRORES 
//(HAY UN MONTON D EPARAMETROS PREDE EN PHP.NET)

$base->exec("SET CHARACTER SET utf8");

$sql="UPDATE usuario SET CONTRASENA='$cambiar_contrasena' WHERE USUARIO=:usuario"; 

$resultado1=$base->prepare($sql); 

$resultado1->execute(array(":usuario"=>$usuario));

$resultado1->closeCursor(); 

$registro1=$resultado1->fetch(PDO::FETCH_ASSOC); 

$numero_registro=$resultado1->rowCount();


    header("location: ../Frontend/Pagina-Inicio-Sesion/login.php"); 


}catch(Exception $e){ //exeption es un objeto. que tine sus propidedades y sus contras

  die ('Error: ' . $e->GetMessage()); 

}finally{//es como un if else que tuviera un do while

    $base=null; 
}

?>
</body>
</html>