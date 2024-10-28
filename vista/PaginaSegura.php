<?php
require_once '../control/Session.php';
$session = new Session();

if (!$session->validar()) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Segura</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $session->getUsuario(); ?>!</h2>
    <p>Esta es una página protegida.</p>
    <a href="../accion/cerrarSesion.php">Cerrar sesión</a>
</body>
</html>
