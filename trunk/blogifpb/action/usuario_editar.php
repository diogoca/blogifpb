<?php
//bibliotecas
	require_once('..\config.php');
//session
	session_start();

//email atual
$atual_email = $_SESSION['email'];
$usuario = DAOFactory::getUsuarioDAO()->search($atual_email);
$id_usuario = $usuario->idUsuario;

// Parametros
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$nova_senha = $_POST['nova_senha'];
	$confirme_nova_senha = $_POST['confirme_nova_senha'];

	
//testar usuario
$usuario = DAOFactory::getUsuarioDAO()->login($atual_email, $senha);


	
	if($usuario){
		if($nova_senha == $confirme_nova_senha){
			$usuario = new usuario();
			$usuario->email = $email;
			if($nova_senha !=  "") { $usuario->senha = $nova_senha; }
			else $usuario->senha = $senha;
			$usuario->idUsuario = $id_usuario;
			
			DAOFactory::getUsuarioDAO()->update($usuario);
			
			$_SESSION['email'] = $email;
			}
		else
			echo "<script>alert('Nova Senha Incopantivel!');</script>";
	}
	else
		echo "<script>alert('Usuário ou senha inválidos!');</script>";	
	
echo '<script>window.location = "' . $_SERVER['HTTP_REFERER'] .'"</script>';
?>