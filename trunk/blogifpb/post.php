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
	
	//fun��es para login e blog para administrador
	if($_SESSION['logado'] == "off"){
		$logon = "<form action=\"index.php\" method=\"POST\" >Login :<input type=\"text\" name=\"nome\" />Senha :".
				 "<input type=\"password\" name=\"senha\"/><input type=\"submit\" value=\"OK\"/></form>";
		$menu =""; 
	}
	else {
		$menu = "<li><a href=\"#\">Posts</a></li><li><a href=\"categorias.php\">Categorias</a></li><li><a href=\"#\">Comentarios</a></li>".
				"<li><a href=\"#\">Usuarios</a></li>";
		$logon =" Logado : ".$_SESSION['logado']."<a style=\"float:right\" href=\"index.php?logoff=off\">Logout</a></li>";
	}
	
	//fun��o das para mostrar as categorias
	function showcategorias(){
		$c = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');
		foreach($c as $key=>$cate){
			echo "<li><a href=\"index.php?cat=$cate->idCategoria\">$cate->nome</a></li>";
		}
	}
	
	//fun��o para pegar o ID do post
	function getpost(){
	$post = "no";
	if (isset($_GET["post"])) $post =$_GET["post"];
	return $post;
	}
	
	
	//registro de comentarios
	if(isset($_POST["texto"])){
		$comet = new Comentario();
		$comet->idPost = getpost();
		$comet->texto = $_POST['texto'];
		if($_POST["nome"] != ""){
			$comet->nome = $_POST['nome'];}
		else 
			$comet->nome = "An�nimo";
		if(isset($_POST['email']))
			$comet->email = $_POST["email"];
		if(isset($_POST['site']))
			$comet->site = $_POST["site"];
		DAOFactory::getComentarioDAO()->insert($comet);	
	}
	
	//fun��o das para mostrar os posts com todas a variaveis
	
	function showpost(){
		$posti = getpost();
		$p = DAOFactory::getPostDAO()->queryAllOrderBy('data');
		if ($posti != "no") {
				foreach($p as $key=>$pos){
					if($pos->idPost == $_GET["post"]){
					
						echo "<h3 class=\"post-title\">$pos->titulo</h3>".
							 "<p>$pos->texto</p>";
						$u = DAOFactory::getUsuarioDAO()->load($pos->idUsuario);
						$c = DAOFactory::getCategoriaDAO()->load($pos->idCategoria);
						$com = DAOFactory::getComentarioDAO()->queryAll();
						$coms = 0;
						$s = "";
						echo "<div class=\"commentbox\">Postado por $u->email | $pos->data <br> Categoria : $c->nome</div>";
						foreach($com as $k=>$come){
							if ($come->idPost == $pos->idPost) {
								$coms++;
								$s .= "<div class=\"comment\"><cite>$come->nome</cite><cite> - $come->email</cite><br />".
									 "<cite>$come->site</cite><br /><p>$come->texto</p></div>";
							}
						}
						$s .="</div>";
						echo "<div id=\"comments\"><h4>$coms Respostas para &#8220;$pos->titulo&#8221;</h4>".$s;
						
						echo "<div id=\"comments\"><h5>Comentar: </h5><div class=\"comment\">".
						"<form action=\"post.php?post=$posti\" method=\"POST\">".
						"<cite>Nome: <input type=\"text\" name=\"nome\"/></cite><br />".
						"<cite>Email:<input type=\"text\" name=\"email\"/> </cite><br />".
						"<cite>Site: <input type=\"text\" name=\"site\"/></cite><br />Comentario:<br/>".
						"<textarea name=\"texto\" rows=\"4\" cols=\"40\"></textarea><br/>".
						"<input type=\"submit\" value=\"Enviar\"></form></div></div>";
						
						break;
					}
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
				<div class="logon" ><?php echo $logon; ?></div>
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