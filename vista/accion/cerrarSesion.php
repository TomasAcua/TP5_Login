<?php
require_once '../control/Session.php';
$session = new Session();
$session->cerrar();

header("Location: ../vista/login.php");
