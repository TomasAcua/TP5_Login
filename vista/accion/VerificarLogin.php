<?php
require_once '../control/UsuarioController.php';

$nombre_usuario = $_POST['nombre_usuario'];
$password = $_POST['password'];

$usuarioController = new UsuarioController();
if ($usuarioController->login($nombre_usuario, $password)) {
    header("Location: ../vista/paginaSegura.php");
} else {
    header("Location: ../vista/login.php?error=1");
}

