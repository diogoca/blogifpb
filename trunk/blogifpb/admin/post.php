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
	$post = DAOFactory::getPostDAO()->getPosts(null, null, $_SESSION['email']);
?>

<body>

   <div id="container">

      <?php require('../includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <?php require('../includes/menu.php'); ?>    
        
        <div id="content-wrapper">
        
            <div id="content">
			
				<table>
				
					<?php foreach($post as $chave => $valor) : ?>
					
					<tr>
						<td><a href="post.php?id_post=<?php echo $valor->idPost; ?>"> <?php echo $valor->titulo ?> </a></td>
						<td><a href="<?php echo $valor->idPost ?>">Editar</a></td>
						<td><a href="" class="red">Excluir</a></td>
					</tr>
					
					<?php endforeach; ?>
				
				</table>
				
			</div>               
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Posts</h3>
           
           <ul id="sidenotes">
	
				<li><a href="">Adicionar</a></li>
				
			</ul>
           
          </div> 
          
        </div>
        
        <?php require('../includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>

