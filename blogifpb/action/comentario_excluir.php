<?php
require_once('..\config.php');

$id_comentario = $_GET['id_comentario'];
$id_post = $_GET['id_post'];

DAOFactory::getComentarioDAO()->delete($id_comentario, $id_post);

header('location: ../admin/comentario.php');
?>