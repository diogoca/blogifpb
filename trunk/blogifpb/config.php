<?php
// Configurações do blog
define('blog_titulo', 'BlogIFPB');
define('blog_url', 'http://localhost:8080/blogifpb/');

// Configurações do Banco de Dados
define('bd_host', 'localhost');
define('bd_user', 'root');
define('bd_password', '');
define('bd_database', 'blogifpb');

// Include all DAO files
require_once('class/sql/Connection.class.php');
require_once('class/sql/ConnectionFactory.class.php');
require_once('class/sql/ConnectionProperty.class.php');
require_once('class/sql/QueryExecutor.class.php');
require_once('class/sql/Transaction.class.php');
require_once('class/sql/SqlQuery.class.php');
require_once('class/core/ArrayList.class.php');
require_once('class/dao/DAOFactory.class.php');

require_once('class/dao/CategoriaDAO.class.php');
require_once('class/dto/Categoria.class.php');
require_once('class/mysql/CategoriaMySqlDAO.class.php');
require_once('class/mysql/ext/CategoriaMySqlExtDAO.class.php');
require_once('class/dao/ComentarioDAO.class.php');
require_once('class/dto/Comentario.class.php');
require_once('class/mysql/ComentarioMySqlDAO.class.php');
require_once('class/mysql/ext/ComentarioMySqlExtDAO.class.php');
require_once('class/dao/PostDAO.class.php');
require_once('class/dto/Post.class.php');
require_once('class/mysql/PostMySqlDAO.class.php');
require_once('class/mysql/ext/PostMySqlExtDAO.class.php');
require_once('class/dao/UsuarioDAO.class.php');
require_once('class/dto/Usuario.class.php');
require_once('class/mysql/UsuarioMySqlDAO.class.php');
require_once('class/mysql/ext/UsuarioMySqlExtDAO.class.php');
	

?>