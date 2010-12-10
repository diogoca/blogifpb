<?php 
// Bibliotecas
	require_once('../config.php');

// Sessão Login
	session_start();

// Head
	require('../includes/head.php');
	
// Post > Lista
	$categoria = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');
?>

<body>

   <div id="container">

      <?php require('../includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <?php require('../includes/menu.php'); ?>    
        
        <div id="content-wrapper">
        
            <div id="content">
			
				<table>
				
					<?php foreach($categoria as $chave => $valor) : ?>
					
					<tr>
						<td><a href="categoria.php?id_categoria=<?php echo $valor->idCategoria; ?>"><?php echo $valor->nome ?></a></td>
						<td><a href="admin/categoria_editar.php?id_categoria=<?php echo $valor->idCategoria ?>">Editar</a></td>
						<td><a href="action/categoria_excluir.php?id_categoria=<?php echo $valor->idCategoria ?>" class="red">Excluir</a></td>
					</tr>
					
					<?php endforeach; ?>
				
				</table>
				
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

