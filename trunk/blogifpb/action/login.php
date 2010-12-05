<?php

$email = $_POST['email'];
$senha = $_POST['senha'];

$_SESSION['email'] = $email;

header('location:' . $_SERVER['HTTP_REFERER']);

?>