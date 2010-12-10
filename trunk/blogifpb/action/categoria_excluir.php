<?php
require_once('..\config.php');

$id_categoria = $_GET['id_categoria'];

DAOFactory::getCategoriaDAO()->delete($id_categoria);

header('location: ../admin/categoria.php');
?>