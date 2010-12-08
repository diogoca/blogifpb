<?php
// Bibliotecas
	require_once('../config.php');
	
// Sessão Login
	session_start();

// Head
	require('../includes/head.php');

// JavaScript
	require('../includes/js_post.php');

// Post
	//parametro
	$id_post = $_GET['id_post'];
	//List
	$post = DAOFactory::getPostDAO()->getPosts(null, $id_post);
	
// Categoria > Lista
	$categoria = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');
?>

<body>
	
   <div id="container">

      <?php require('../includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <?php require('../includes/menu.php'); ?>    
        
        <div id="content-wrapper">
			
			
			<h3 class="categoria_title" >Editar Post: </h3></br></br>
            
			<div id="content">
				
				<?php foreach($post as $key=>$value) :?>
				
				<form class="form" action="action/post_editar.php" method="POST">
							<input type="hidden" name="id_post" value="<?php echo $value->idPost ?>">
							<label>Titulo: </label>
								<input type="text" name="titulo" value="<?php echo $value->titulo?>"/>
							
							<label>Categoria: </label>
							<SELECT NAME="id_categoria" >
								<?php foreach($categoria as $chave => $valor) :
									if($valor->idCategoria == $value->idCategoria): ?>
								<OPTION NAME="opcao" value="<?php echo $valor->idCategoria; ?>" selected><?php echo $valor->nome; ?> </OPTION>
								<?php else : ?>
								<OPTION NAME="opcao" value="<?php echo $valor->idCategoria; ?>"><?php echo $valor->nome; ?> </OPTION>
								<?php endif; ?>
								
								<?php endforeach; ?>
							</SELECT>
							
							<label>Conteudo: </label>
								<textarea name="texto" class="text_post" ><?php echo $value->texto?></textarea>
							<input type="submit" value="Enviar" class="submit">
				</form>		
				
				<?php endforeach; ?>
				
			</div>               
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Posts</h3>
           
           <ul id="sidenotes">
	
				<li><a href="admin/post_adicionar.php">Adicionar</a></li>
				
			</ul>
           
          </div> 
          
        </div>
        
        <?php require('../includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>