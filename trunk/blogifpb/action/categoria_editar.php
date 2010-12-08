<?php
// Bibliotecas
require_once('..\config.php');

$id_categoria = $_POST['id_categoria'];
$nome = $_POST['nome'];

$categoria = new Categoria();

$categoria->nome = $nome;
$categoria->idCategoria = $id_categoria;

DAOFactory::getCategoriaDAO()->update($categoria);
	
	
header('location: ../admin/categoria.php');
?>