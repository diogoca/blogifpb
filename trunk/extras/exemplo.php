<?php

// Include all DAO files
require_once('include_dao.php');

$categoria = new Categoria();
$categoria->nome = 'Carros';
DAOFactory::getCategoriaDAO()->insert($categoria);

$categoria = new Categoria();
$categoria->nome = 'Motos';
DAOFactory::getCategoriaDAO()->insert($categoria);

$categoria = new Categoria();
$categoria->nome = 'Bicicletas';
DAOFactory::getCategoriaDAO()->insert($categoria);

// Exibindo todos
$c = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');

print_r($c);

?>