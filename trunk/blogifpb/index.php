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
                <?php
					function showpost($valor){
						echo "<h3 class=\"post-title\"><a href=\"post.php?id=$valor->idPost\">$valor->titulo</a></h3>";
						echo "<p>$valor->texto</p>";
						$u = DAOFactory::getUsuarioDAO()->load($valor->idUsuario);
						$c = DAOFactory::getCategoriaDAO()->load($valor->idCategoria);
						$com = DAOFactory::getComentarioDAO()->queryAll();
						$coms = 0;
						$data = formataData($valor->data);
						foreach($com as $key =>$value)
							{if ($value->idPost == $valor->idPost) $coms++;}
						echo "<div class=\"commentbox\">Postado por $u->email | $data | $coms comentarios <br> Categoria : $c->nome</div>";
					}
				
					function getCategoria(){
						$ret = "no";
						if(isset($_GET['cat'])) 
							$ret = $_GET['cat'];
						return $ret;
					}
					
					foreach($post as $chave => $valor) :  
						$cat = getCategoria();
						if($cat != "no"){
							if($valor->idCategoria == $cat){
								showpost($valor); }
						}
						else{
							showpost($valor);
						}
					endforeach;
				?>                                             	         
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

