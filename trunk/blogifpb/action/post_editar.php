<?php
//Bibliotecas
require_once('..\config.php');

//Sessão
	session_start();

// Post
$id_post = $_POST['id_post'];

	
// Parametros
$id_categoria = $_POST['id_categoria'];

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$data = date('Y-m-d');



$post = new Post();

$post->titulo = $titulo;
$post->texto = $texto;
$post->data = $data;

$post->idPost = $id_post;
$post->idCategoria = $id_categoria;


DAOFactory::getPostDAO()->update($post);	

header('location: ../admin/post.php');
?>