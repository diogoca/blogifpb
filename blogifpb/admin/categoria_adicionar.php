<?php 
// Bibliotecas
	require_once('../config.php');
	
// Sessão Login
	session_start();

// Head
	require('../includes/head.php');
	
?>

<body>

   <div id="container">

      <?php require('../includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <?php require('../includes/menu.php'); ?>    
        
        <div id="content-wrapper">
			
			
			<h3 class="categoria_title" >Adicionar Categoria: </h3></br></br>
            
			<div id="content">
							
				<form class="form" action="action/categoria_adicionar.php" method="POST">
							<label>Nome: </label>
								<input type="text" name="nome" />
							<input type="submit" value="Enviar" class="submit">
				</form>		
			
			</div>               
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Categorias</h3>
           
           <ul id="sidenotes">
	
				<li><a href="admin/categoria_adicionar.php">Adicionar</a></li>
				
			</ul>
           
          </div> 
          
        </div>
        
        <?php require('../includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>