<?php
require_once('..\config.php');

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$u = DAOFactory::getUsuarioDAO()->queryAll();
foreach($u as $key=>$usu){
	if ( ($usu->email == $email) and ($usu->senha == $senha) ){
		$_SESSION['email'] = $email; 
		break; 
		}
}


header('location:' . $_SERVER['HTTP_REFERER']);

?>