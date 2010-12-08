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
        
            <div id="content">
			
				<table>
							
					<tr>
						<td><a href="admin/post.php"> <?php echo $usuario->email ?> </a></td>
						<td><a href="admin/usuario_editar.php">Editar</a></td>
						<td><a href="action/usuario_excluir.php" class="red">Excluir</a></td>
					</tr>
											
				</table>
				
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

