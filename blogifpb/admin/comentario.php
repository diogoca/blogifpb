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
				<table style="width:auto">
					<?php foreach($post as $key => $value) : 
							//Comentario > lista>
								$comentario = DAOFactory::getComentarioDAO()->getComentariosByIdPost($value->idPost); 		
								if(!empty($comentario)) : ?>

								<tr><td><h4><a href="post.php?id_post=<?php echo $value->idPost; ?>"> <?php echo $value	->titulo ?> </a></h4></tr></td>
									<?php foreach($comentario as $chave => $valor) : ?>						
										<tr>
											<td style="float:left; width:450px"><?php echo $valor->texto ?></td>
											<td><a href="action/comentario_excluir.php?id_comentario=<?php echo $valor->idComentario ?>&id_post=<?php echo $valor->idPost; ?>" class="red">Excluir</a></td>
										</tr>
									<?php endforeach;?>
								
								<?php endif; 
					endforeach; ?>
				</table>
			</div>                 
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Comentários</h3>
           
          </div> 
          
        </div>
        
        <?php require('../includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>

