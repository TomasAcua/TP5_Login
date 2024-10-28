<?php
require_once '../modelo/BaseDatos.php';
require_once '../modelo/Usuario.php';
require_once '../control/Session.php';

$session = new Session();
if (!$session->validar() || $session->getRol() != 'admin') {
    header("Location: ../vista/login.php");
    exit();
}

if (isset($_GET['id'])) {
    $database = new BaseDatos();
    $db = $database->conectar();
    $usuarioModel = new Usuario($db);

    $usuarioModel->eliminarUsuario($_GET['id']);
}

header("Location: ../vista/listarUsuarios.php");
