<?php 
// Bibliotecas
	require_once('../config.php');
	
// Helpers
	require('../helpers/formataData.php');

// Sessão Login
	session_start();

// Head
	require('../includes/head.php');
	
// Post > Lista
	$email = $_SESSION['email'];
	$usuario = DAOFactory::getUsuarioDAO()->search($email);
	
?>

<body>

   <div id="container">

      <?php require('../includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <?php require('../includes/menu.php'); ?>    
        
        <div id="content-wrapper">
        
            <h3 class="categoria_title" >Editar Usuario: </h3></br></br>
            
			<div id="content">
							
				<form class="form" action="action/usuario_editar.php" method="POST">
							<label>E-mail: </label>
								<input type="text" name="email" value="<?php echo $usuario->email; ?>" />
							<label>Senha: </label>
								<input type="password" name="senha" />
							<label>Nova Senha: </label>
								<input type="password" name="nova_senha" />
							<label>Confirme a Nova Senha: </label>							
								<input type="password" name="confirme_nova_senha" />
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