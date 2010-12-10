<?php 
// Bibliotecas
	require_once('../config.php');
	
// Sessão Login
	session_start();

// Head
	require('../includes/head.php');

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
							<select name="id_categoria">

								<?php foreach($categoria as $chave => $valor) : ?>
								
								<option name="opcao" value="<?php echo $valor->idCategoria; ?>"><?php echo $valor->nome; ?></option>
								
								<?php endforeach; ?>

							</select>
							<label>Conteudo: </label>
								<textarea name="texto" class="textareapost"></textarea>
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
   
   <!-- Javascript //-->
   
   <script type="text/javascript" src="admin/js/tiny_mce/tiny_mce.js"></script>
   <script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "simple"
    });
    </script>
      
</body>

</html>