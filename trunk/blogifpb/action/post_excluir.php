<?php
require_once('..\config.php');

$id_post = $_GET['id_post'];

DAOFactory::getPostDAO()->delete($id_post);

header('location: ../admin/post.php');
?>