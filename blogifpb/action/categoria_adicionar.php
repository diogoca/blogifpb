<?php
require_once('..\config.php');

// Parametros
	$nome = $_POST['nome'];

$categoria = new Categoria();
$categoria->nome = $nome;

DAOFactory::getCategoriaDAO()->insert($categoria);	

		

header('location: ../admin/categoria.php');
?>