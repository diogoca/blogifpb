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
	$post = DAOFactory::getPostDAO()->queryAllOrderBy('data');

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
                
                <h3 class="post-title"><a href="post.php?id=<?php echo $valor->idPost ?>"><?php echo $valor->titulo ?></a></h3> <span class="date"><?php echo formataData($valor->data) ?></span><br /><br />
                
                <?php endforeach; ?>                                                
                
             </div>               
             
        </div>
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Categorias</h3>
           
           <ul id="sidenotes">
           		
                <?php foreach($categoria as $chave => $valor) : ?>
                
                <li><a href="categoria.php?id=<?php echo $valor->idCategoria ?>"><?php echo $valor->nome ?></a></li>
                
                <?php endforeach; ?>
                
           </ul>
           
          </div> 
          
        </div>
        
        <?php require('includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>

