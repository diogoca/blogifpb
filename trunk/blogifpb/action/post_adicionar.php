<?php
//Bibliotecas
require_once('..\config.php');

//Sessão
	session_start();
	
// Parametros
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$id_categoria = $_POST['id_categoria'];
$data = date('Y-m-d');

//id do usuario
$email = $_SESSION['email'];
$usuario = DAOFactory::getUsuarioDAO()->search($email);	
$id_usuario = $usuario->idUsuario;

$post = new Post();

$post->titulo = $titulo;
$post->texto = $texto;
$post->idUsuario = $id_usuario;
$post->idCategoria = $id_categoria;
$post->data = $data;

DAOFactory::getPostDAO()->insert($post);	

		

header('location: ../admin/post.php');
?>