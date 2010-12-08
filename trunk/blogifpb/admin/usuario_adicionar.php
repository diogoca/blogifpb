<?php 
// Bibliotecas
	require_once('../config.php');
	
// Helpers
	require('../helpers/formataData.php');

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
        
            <h3 class="categoria_title" >Adicionar Usuario: </h3></br></br>
            
			<div id="content">
							
				<form class="form" action="action/usuario_adicionar.php" method="POST">
							<label>E-mail: </label>
								<input type="text" name="email" />
							<label>Senha: </label>
								<input type="password" name="senha" />
							<label>Confirme sua senha:</label>							
								<input type="password" name="confirme_senha" />
							<input type="submit" value="Enviar" class="submit">
				</form>		
			
			</div>              
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Usuarios</h3>
           
           <ul id="sidenotes">
	
				<li><a href="admin/usuario_adicionar.php">Adicionar</a></li>
				
			</ul>
           
          </div> 
          
        </div>
        
        <?php require('../includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>