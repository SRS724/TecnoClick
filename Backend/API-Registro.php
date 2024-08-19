<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

// Obtener datos del formulario
$nombre=$_GET["nombre"]; 
$apellido=$_GET["apellido"]; 
$email=$_GET["email"];
$usuario = $_GET["usuario"]; 
$contrasena=$_GET["password"]; 

// Funciones de validación
function validarNombre($nombre) {
    return preg_match("/^[a-zA-Z\s]+$/", $nombre); // Solo letras y espacios
}

function validarApellido($apellido) {
    return preg_match("/^[a-zA-Z\s]+$/", $apellido); // Solo letras y espacios
}


function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL); // Validar formato de email
}

function validarUsuario($usuario) {
    return preg_match("/^[a-zA-Z0-9_]{5,20}$/", $usuario); // Letras, números, y guiones bajos, longitud de 5 a 20 caracteres
}

function validarContrasena($contrasena) {
    return preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $contrasena); // Al menos una letra, un número, y longitud mínima de 8 caracteres
}

$errores = [];

// Validar cada campo
if (!validarNombre($nombre)) {
    $errores[] = "Nombre inválido. Solo se permiten letras y espacios.";
}
if (!validarApellido($apellido)) {
    $errores[] = "Apellido inválido. Solo se permiten letras y espacios.";
}

if (!validarEmail($email)) {
    $errores[] = "Email inválido.";
}
if (!validarUsuario($usuario)) {
    $errores[] = "Usuario inválido. Debe tener entre 5 y 20 caracteres y solo permitir letras, números y guiones bajos.";
}
if (!validarContrasena($contrasena)) {
    $errores[] = "Contraseña inválida. Debe tener al menos 8 caracteres, incluyendo al menos una letra y un número.";
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

$sql="INSERT INTO usuario  (NOMBRE,	APELLIDO, EMAIL, USUARIO, CONTRASENA) 
VALUES (:nombre, :apellido, :email, :usuario, :contrasena)"; 

$resultado=$base->prepare($sql); 

$resultado->execute(array(":nombre"=>$nombre, ":apellido"=>$apellido, ":email"=>$email, ":usuario"=>$usuario, ":contrasena"=>$contrasena)); //esto es el marcador en un buscador

 echo "registro exitoso";



if ($resultado) {


    header("location: ../Frontend/Pagina-Inicio-Sesion/login.php"); 

}
$resultado->CloseCursor(); 
}catch(Exception $e){ //exeption es un objeto. que tine sus propidedades y sus contras

  die ('Error: ' . $e->GetMessage()); 

}finally{//es como un if else que tuviera un do while

    $base=null; 
}



//en php, concretamente en esta libreria se generan erorres que no son de sintaxis  (ecepciones)

//aquí entra el try catch que parecen un if else
    ?> 
</body>
</html>