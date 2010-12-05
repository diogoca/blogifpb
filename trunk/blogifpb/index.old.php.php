<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
	<meta name="description" content="An minimal site format" />
	<meta name="keywords" content="blog" />
 <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />  
<title>Blog IFPB</title>
</head>
<?php 
	// Include all DAO files
	require_once('include_dao.php');
	session_start();
	
	//funções para login e blog para administrador
	if(!isset($_SESSION['logado']))
	$_SESSION['logado'] = "off";
	
	if( ( isset($_POST['nome'])) and (isset($_POST['senha'])) ){
		$nome=$_POST['nome']; 
		$senha=$_POST['senha'];
		
		$u = DAOFactory::getUsuarioDAO()->queryAll();
		foreach($u as $key=>$usu){
			if ( ($usu->email == $nome) and ($usu->senha == $senha) ){
				$_SESSION['logado'] = $nome; 
				break; 
			}
		}
	}
	if(isset($_GET['logoff']))$_SESSION['logado']="off";
	
	if($_SESSION['logado'] == "off"){
		$logon = "<form action=\"index.php\" method=\"POST\" id=\"login\" >E-mail: <input type=\"text\" name=\"nome\" /> Senha: ".
				 "<input type=\"password\" name=\"senha\"/><input type=\"submit\" value=\"Ok\"/></form>";
		$menu =""; 
	}
	else {
		$menu = "<li><a href=\"#\">Posts</a></li><li><a href=\"categorias.php\">Categorias</a></li>".
				"<li><a href=\"#\">Comentarios</a></li><li><a href=\"#\">Usuarios</a></li>";
		$logon =" Logado : ".$_SESSION['logado']."<a style=\"float:right\" href=\"index.php?logoff=off\">Logout</a></li>";
	}	
	
	//função das para mostrar as categorias
	function showcategorias(){
		$c = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');
		foreach($c as $key=>$cate){
			echo "<li><a href=\"index.php?cat=$cate->idCategoria\">$cate->nome</a></li>";
		}
	}
	
	//função das para mostrar os posts com todas a variaveis

	function showpost(){
		$p = DAOFactory::getPostDAO()->queryAllOrderBy('data');		
		if (isset($_GET["cat"])) {
			foreach($p as $key=>$pos){
				if($pos->idCategoria == $_GET["cat"]){				
					echo "<h3 class=\"post-title\"><a href=\"post.php?post=$pos->idPost\">$pos->titulo</a></h3>";
					echo "<p>$pos->texto</p>";
					$u = DAOFactory::getUsuarioDAO()->load($pos->idUsuario);
					$c = DAOFactory::getCategoriaDAO()->load($pos->idCategoria);
					$com = DAOFactory::getComentarioDAO()->queryAll();
					$coms = 0;
					
					foreach($com as $k=>$come){if ($come->idPost == $pos->idPost) $coms++;}
					echo "<div class=\"commentbox\">Postado por $u->email | $pos->data | $coms comentarios <br> Categoria : $c->nome</div>";
				}
			}
		}
		else{
			foreach($p as $key=>$pos){
				echo "<h3 class=\"post-title\"><a href=\"post.php?post=$pos->idPost\">$pos->titulo</a></h3>";
				echo "<p>$pos->texto</p>";				
				$u = DAOFactory::getUsuarioDAO()->load($pos->idUsuario);
				$c = DAOFactory::getCategoriaDAO()->load($pos->idCategoria);
				$com = DAOFactory::getComentarioDAO()->queryAll();
				$coms = 0;
				
				foreach($com as $k=>$come){if ($come->idPost == $pos->idPost) $coms++;}
				echo "<div class=\"commentbox\">Postado por $u->email | $pos->data | $coms comentarios <br> Categoria : $c->nome</div>";
				
			}
	    }
	}
	
?>

<body>
   <div id="container">
   
        

        <div id="header"><h1>Blog <span>IFPB</span></h1></div>

      <div id="wrapper">

        <div id="navigation">
           <ul >
                <li class="current_page_item"><a href="index.php">Home</a></li>
				<?php echo $menu; 	?>
				<div class="logon"><?php echo $logon; ?></div>
			</ul>
		</div>
        

      
        <div id="content-wrapper">
            <div id="content">
                <?php showpost(); ?>

            </div> 			
        </div>
        
        <div id="sidebar-wrapper">
          <div id="sidebar">
           <h3>Categorias</h3>
           <ul id="sidenotes">
            <?php showcategorias(); ?>
           </ul>
          </div> 
        </div>
        
        <div id="footer">By <a href="http://kismet.blogsite.org">Kismet</a>. Original design <a href="http://www.nikhedonia.com/showcase/entry/one-penny/">here</a> by SimplyGold.</div>
        
      </div> 
      
   </div>
</body>

</html>

