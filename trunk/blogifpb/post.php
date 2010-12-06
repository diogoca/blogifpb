<?php 
// Bibliotecas
	require_once('config.php');
	
// Helpers
	require('helpers/formataData.php');

// Sessão Login
	session_start();

// Head
	require('includes/head.php');
	
// Post = unico
	$p = DAOFactory::getPostDAO()->getPostById($_GET["id"]);
// Categoria > Lista
	$categoria = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');

?>

<body>

   <div id="container">

      <?php require('includes/topo.php'); ?>          
	
      <div id="wrapper">
		
        <?php require('includes/menu.php'); ?>    
        
        <div id="content-wrapper">
        
            <div id="content">
                <?php
							
				//função das para mostrar o post 
				
					echo "<h3 class=\"post-title\">$p->titulo</h3>".
						 "<p>$p->texto</p>";
					
					$u = DAOFactory::getUsuarioDAO()->load($p->idUsuario);
					$c = DAOFactory::getCategoriaDAO()->load($p->idCategoria);
					$com = DAOFactory::getComentarioDAO()->queryAll();
					$coms = 0;
					$s = "";
					$data = formataData($p->data);
					echo "<div class=\"commentbox\">Postado por $u->email | $data <br> Categoria : $c->nome</div>";
					
					foreach($com as $k=>$come){
						if ($come->idPost == $p->idPost) {
							$coms++;
							$s .= "<div class=\"comment\"><cite>$come->nome</cite><cite> - $come->email</cite><br />".
							"<cite>$come->site</cite><br /><p>$come->texto</p></div>";
						}
					}
					
					$s .="</div>";
					echo "<div id=\"comments\"><h4>$coms Respostas para &#8220;$p->titulo&#8221;</h4>".$s;
							
					echo "<div id=\"comments\"><h5>Comentar: </h5><div class=\"comment\">".
						 "<form action=\"action/registrocomentario.php?id=$p->idPost\" method=\"POST\">".
						 "<cite>Nome: <input type=\"text\" name=\"nome\"/></cite><br />".
						 "<cite>Email:<input type=\"text\" name=\"email\"/> </cite><br />".
						 "<cite>Site: <input type=\"text\" name=\"site\"/></cite><br />Comentario:<br/>".
						 "<textarea name=\"texto\" rows=\"4\" cols=\"40\"></textarea><br/>".
						 "<input type=\"submit\" value=\"Enviar\"></form></div></div>";
							
					
											
			?>                                             	         
			
			</div>               
        
		</div>
        
        
        <div id="sidebar-wrapper">
        
          <div id="sidebar">
           
           <h3>Categorias</h3>
           
           <ul id="sidenotes">
           		
                <?php foreach($categoria as $chave => $valor) : ?>
                
                <li><a href="index.php?cat=<?php echo $valor->idCategoria ?>"><?php echo $valor->nome ?></a></li>
                
                <?php endforeach; ?>
                
           </ul>
           
          </div> 
          
        </div>
        
        <?php require('includes/rodape.php'); ?>
        
      </div> 
      
   </div>
</body>

</html>

