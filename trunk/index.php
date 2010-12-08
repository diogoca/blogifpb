<?php 
// Bibliotecas
	require_once('config.php');
	
// Helpers
	require('helpers/formataData.php');

// Sessão Login
	session_start();

// Head
	require('includes/head.php');
	
// Post > Lista
	$post = DAOFactory::getPostDAO()->getPosts();

// Categoria > Lista
	$categoria = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');

?>

<body>

   <div id="container">
		
      <?php require('includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <?php require('includes/menu.php'); ?>    
        
        <div id="content-wrapper">
        
            <div id="content">
			
					<?php foreach($post as $chave => $valor) : ?>
                
					<h3 class="post-title"><a href="post.php?id_post=<?php echo $valor->idPost ?>"><?php echo $valor->titulo ?></a></h3>
					<p><?php echo $valor->texto ?></p>
					<div class="commentbox">Postado por <?php echo $valor->nomeUsuario ?> | <?php echo formataData($valor->data) ?> | <?php echo DAOFactory::getComentarioDAO()->getCountComentariosByIdPost($valor->idPost) ?> comentarios <br> Categoria : <?php echo $valor->nomeCategoria ?></div>                                             	         
			
					<?php endforeach; ?>

				
			</div>               
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Categorias</h3>
           
           <?php require('includes/menu_categoria.php') ?>
           
          </div> 
          
        </div>
        
        <?php require('includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>

