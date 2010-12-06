<?php 
// Bibliotecas
	require_once('config.php');
	
// Helpers
	require('helpers/formataData.php');

// Sessão Login
	session_start();
	if(!isset($_SESSION['email']))
		header('location:' . 'index.php');
	
// Head
	require('includes/head.php');
	
// Categoria > Lista
	$categoria = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');

?>

<body>

   <div id="container">

      <?php require('includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <div id="navigation">
		   <ul>
				<?php if(!isset($_SESSION['email'])) : ?>
				<li ><a href="index.php" >Home</a></li>
				
				<?php else : ?>
				<li ><a href="index.php" >Home</a></li>
				<li><a href="#" >Posts</a></li>
				<li id="current_page_item"><a href="categoria.php" >Categorias</a></li>
				<li><a href="#" >Comentarios</a></li>
				<li><a href="#" >Usuarios</a></li>
				<li><a href="#" >Tags</a></li>
				<?php endif; ?>
		   </ul>           			  
			
		</div>    
        
        <div id="content-wrapper">
        
            <div id="content">
                <?php
				//função das para mostrar o principal da pagina
				function criar(){
				$ret = FALSE;
				if (isset($_GET["criar"])) $ret =TRUE;
				return $ret;
				}	
				
				function atualizar(){
				$ret = FALSE;
				if (isset($_GET["atualizar"])) $ret =TRUE;
				return $ret;
				}
				
				function excluir(){
				$ret = FALSE;
				if (isset($_GET["excluir"])) $ret =TRUE;
				return $ret;
				}
				
				//sequencia de IF para preencher o conteudo da div principal, dependendo da opção escolhida
				if(criar()){
					$main = "<h2 class=\"post-title\" ><u>Criar Categoria</u></h2><br/><br/>".
							"<form action=\"action/persistircategoria.php\" method=\"POST\">";
					echo $main;
					echo "<br/><h3 class=\"post-title\" >Nome da Categoria :<input type=\"text\" name=\"nome\" /><h3>";
					echo "<input type=\"hidden\" name=\"acao\" value=\"criar\">";
					echo "<br/><input type=\"submit\" value=\"Criar\" /></form>";
				
				}
				elseif(atualizar()){
					$main = "<h2 class=\"post-title\" ><u>Atualizar Categoria</u></h2><br/><br/>".
							"<form action=\"action/persistircategoria.php\" method=\"POST\"><h3 class=\"post-title\" >Escolha a categoria:".
							"<SELECT NAME=\"categoria\" >";
					foreach($categoria as $key=>$cate){
						$main .= "<OPTION NAME=\"opcao\" value=\"$cate->idCategoria\">$cate->nome </OPTION>";
					}
					$main .= "</SELECT></h3>";
					echo $main;
					echo "<br/><br/><h4 class=\"post-title\" >Novo nome:<input type=\"text\" name=\"nome\" /><h4>";
					echo "<input type=\"hidden\" name=\"acao\" value=\"atualizar\">";
					echo "<br/><input type=\"submit\" value=\"Atualizar\" /></form>";
				}
				elseif(excluir()){
					$main = "<h2 class=\"post-title\" ><u>Excluir Categoria</u></h2><br/><br/>".
							"<form action=\"action/persistircategoria.php\" method=\"POST\"><h3 class=\"post-title\" >Escolha a categoria:".
							"<SELECT NAME=\"categoria\" >";
					foreach($categoria as $key=>$cate){
						$main .= "<OPTION NAME=\"opcao\" value=\"$cate->idCategoria\">$cate->nome </OPTION>";
					}
					$main .= "</SELECT></h3>";
					echo $main;
					echo "<input type=\"hidden\" name=\"acao\" value=\"excluir\">";
					echo "<br/><br/><input type=\"submit\" value=\"Excluir\" /></form>";
				}
				else {
					echo "<h2 class=\"post-title\" ><u>Categorias</u></h4><br/><br/>";
					foreach($categoria as $key=>$cate){
						echo "<h3 class=\"post-title\" ><a href=\"index.php?cat=$cate->idCategoria\">$cate->nome</a></h3><br/><br/>";
					}
				
				}
				
				?>                                             	         
			</div>               
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
            <h3 style="text-transform: none;">Opções</h3>
           
			<ul id="sidenotes">
            
				<li><a href="categoria.php?criar">Criar</a></li>
				<li><a href="categoria.php?atualizar">Alterar</a></li>
				<li><a href="categoria.php?excluir">Excluir</a></li>
                
           </ul>
           
          </div> 
          
        </div>
        
        <?php require('includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>

