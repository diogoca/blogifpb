<?php 
// Bibliotecas
	require_once('config.php');
	
// Helpers
	require('helpers/formataData.php');

// Sessão Login
	session_start();

// Head
	require('includes/head.php');
	
// Post
	
	// Parametros
	$id_post = $_GET['id_post'];
	
	// Lista
	$post = DAOFactory::getPostDAO()->getPosts(null, $id_post);

// Comentari

	// Lista
	$comentario = DAOFactory::getComentarioDAO()->getComentariosByIdPost($id_post);
	
	// Quantidade (Count)
	$totalComentarios = DAOFactory::getComentarioDAO()->getCountComentariosByIdPost($id_post);
	
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
			
				<h3 class="post-title"><?php echo $valor->titulo ?></h3>
				<p><?php echo $valor->texto ?></p>
				<div class="commentbox">Postado por <?php echo $valor->nomeUsuario ?> | <?php echo formataData($valor->data) ?> | Categoria : <?php echo $valor->nomeCategoria ?></div>                                             	         
		
				<?php endforeach; ?>
				
				<div id="comments">				
				
					<h4><?php echo $totalComentarios ?> respostas para <?php echo $valor->titulo ?></h4>
				
					<?php foreach($comentario as $chave => $v) : ?>
						
						<div class="comment">
							<cite><?php echo $v->nome ?></cite><cite> - <?php echo $v->email ?></cite><br />
							
							<?php if(!empty($v->site)) : ?>
							
								<cite><a href="<?php echo $v->site ?>"><?php echo $v->site ?></a></cite><br />
							
							<?php endif; ?>
							
							<p><?php echo $v->texto ?></p>
						</div>
					
					<?php endforeach; ?>
					
				</div>
				
				<div id="comments">
				
					<h5>Faça um comentário</h5>
					
					<div class="comment">
					
						 <form class="form" action="action/post_comentario.php" method="POST">
							<input type="hidden" name="id_post" value="<?php echo $valor->idPost ?>"/>
							<label>Nome:</label>
								<input type="text" name="nome" "/>
							<label>E-mail:</label>
								<input type="text" name="email"/>
							<label>Site:</label>
								<input type="text" name="site"/>
							<label>Comentario:</label>
								<textarea name="texto"></textarea>
							<input type="submit" value="Enviar" class="submit">
						</form>
						
					</div>
					
				</div>
				
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

