<?php 
// Bibliotecas
	require_once('../config.php');
	
// Sessão Login
	session_start();

// Head
	require('../includes/head.php');

// JavaScript
	require('../includes/js_post.php');

// Categoria > Lista
	$categoria = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');
?>

<body>
	
   <div id="container">

      <?php require('../includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <?php require('../includes/menu.php'); ?>    
        
        <div id="content-wrapper">
			
			
			<h3 class="categoria_title" >Adicionar Post: </h3></br></br>
            
			<div id="content">
							
				<form class="form" action="action/post_adicionar.php" method="POST">
							<label>Titulo: </label>
								<input type="text" name="titulo" />
							<label>Categoria: </label>
							<SELECT NAME="id_categoria" >
								<?php foreach($categoria as $chave => $valor) : ?>
								
								<OPTION NAME="opcao" value="<?php echo $valor->idCategoria; ?>"><?php echo $valor->nome; ?></OPTION>
								
								<?php endforeach; ?>
							</SELECT>
							<label>Conteudo: </label>
								<textarea name="texto" class="text_post" ></textarea>
							<input type="submit" value="Enviar" class="submit">
				</form>		
			
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