<?php
require_once('..\config.php');

// Parametros
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$confirme_senha = $_POST['confirme_senha'];

	
	if($senha == $confirme_senha){
		$usuario = new usuario();
		$usuario->email = $email;
		$usuario->senha = $senha;
	
		DAOFactory::getUsuarioDAO()->insert($usuario);
		echo "<script>alert('Usuario $email adicionado com sucesso!');</script>";
		
	}else
		echo "<script>alert('Senhas incompatíveis!');</script>";
		
echo '<script>window.location = "' . $_SERVER['HTTP_REFERER'] .'"</script>';
?>