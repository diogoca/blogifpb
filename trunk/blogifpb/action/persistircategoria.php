<?php
require_once('..\config.php');

$acao = $_POST["acao"];
$nome = $_POST["nome"];
$categ = $_POST["categoria"];

$categoria = new Categoria();

if( ($acao == "criar") and ($nome != "") ){
	$categoria->nome = $nome;
	DAOFactory::getCategoriaDAO()->insert($categoria);	
}
elseif(($acao == "atualizar") and ($nome != "") ){
	$categoria->nome = $nome;
	$categoria->idCategoria = $categ;
	DAOFactory::getCategoriaDAO()->update($categoria);	
}
elseif($acao == "excluir"){
	DAOFactory::getCategoriaDAO()->delete($categ);
}		

header('location:' . $_SERVER['HTTP_REFERER']);
?>