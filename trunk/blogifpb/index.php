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
	$post = DAOFactory::getPostDAO()->getPosts(1);

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
                
					<h3 class="post-title"><a href="post.php?id=<?php echo $valor->idPost ?>"><?php echo $valor->titulo ?></a></h3>
					<p><?php echo $valor->texto ?></p>
					<div class="commentbox">Postado por italonerd@gmail.com | 03/12/2010 | 3 comentarios <br> Categoria : Carros</div>                                             	         
			
					<?php endforeach; ?>

				
			</div>               
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Categorias</h3>
           
           <ul id="sidenotes">
           		
                <?php foreach($categoria as $chave => $valor) : ?>
                
                <li><a href="index.php?cat=<?php echo $valor->idCategoria ?>"><?php echo $valor->nome ?></a></li>
                
                <?php endforeach; ?>
                
           </ul>
           
          </div> 
          
        </div>
        
        <?php require('includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>

