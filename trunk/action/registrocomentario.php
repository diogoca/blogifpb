<?php
require_once('..\config.php');

session_start();

$id = $_POST['id_post'];
$texto = $_POST['texto'];
$nome = $_POST['nome'];
$site = $_POST['site'];
$email = $_POST['email'];

$comet = new Comentario();
$comet->idPost = $id;
$comet->texto = $texto;
if($nome != ""){
	$comet->nome = $nome;}
else 
	$comet->nome = "Anônimo";

$comet->email = $email;
$comet->site = $site;

DAOFactory::getComentarioDAO()->insert($comet);	

header('location:' . $_SERVER['HTTP_REFERER']);

?>