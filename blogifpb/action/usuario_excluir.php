<?php
require_once('..\config.php');
//session
session_start();

//email atual
$email = $_SESSION['email'];
$usuario = DAOFactory::getUsuarioDAO()->search($email);
$id_usuario = $usuario->idUsuario;

DAOFactory::getUsuarioDAO()->delete($id_usuario);

header('location: ../action/logoff.php');
?>