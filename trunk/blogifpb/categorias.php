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
	if($_SESSION['logado'] == "off") header ('Location: index.php');
	
	$menu = "<li><a href=\"#\">Posts</a></li><li class=\"current_page_item\"><a  href=\"categorias.php\">Categorias</a></li>".
			"<li><a href=\"#\">Comentarios</a></li><li><a href=\"#\">Usuarios</a></li>";
	$logon =" Logado : ".$_SESSION['logado']."<a style=\"float:right\" href=\"index.php?logoff=off\">Logout</a></li>";
	
	//função das para mostrar o principal da pagina
	
	function create(){
	$ret = FALSE;
	if (isset($_GET["cre"])) $ret =TRUE;
	return $ret;
	}	
	
	function att(){
	$ret = FALSE;
	if (isset($_GET["att"])) $ret =TRUE;
	return $ret;
	}
	
	function delete(){
	$ret = FALSE;
	if (isset($_GET["del"])) $ret =TRUE;
	return $ret;
	}
	
	//persistencia das mudanças em categoria
	if(isset($_POST["tipo"]) ){
		$categoria = new Categoria();
		if( ($_POST["tipo"] == "create") and ($_POST["nome"] != "") ){
		$categoria->nome = $_POST["nome"];
		DAOFactory::getCategoriaDAO()->insert($categoria);	
		}
		if(($_POST["tipo"] == "att") and ($_POST["nome"] != "") ){
		$categoria->nome = $_POST["nome"];
		$categoria->idCategoria = $_POST["categorias"];
		DAOFactory::getCategoriaDAO()->update($categoria);	
		}
		if($_POST["tipo"] == "delete"){
		DAOFactory::getCategoriaDAO()->delete($_POST["categorias"]);
		}		
	}

	function showmain(){
		$c = DAOFactory::getCategoriaDAO()->queryAllOrderBy('nome');
		if(create()){
			$main = "<h2 class=\"post-title\" ><u>Criar Categoria</u></h2><br/><br/>".
					"<form action=\"categorias.php\" method=\"POST\">";
			echo $main;
			echo "<br/><h3 class=\"post-title\" >Nome da Categoria :<input type=\"text\" name=\"nome\" /><h3>";
			echo "<input type=\"hidden\" name=\"tipo\" value=\"create\">";
			echo "<br/><input type=\"submit\" value=\"Criar\" /></form>";
		
		}
		elseif(att()){
			$main = "<h2 class=\"post-title\" ><u>Atualizar Categoria</u></h2><br/><br/>".
					"<form action=\"categorias.php\" method=\"POST\"><h3 class=\"post-title\" >Escolha a categoria:".
					"<SELECT NAME=\"categorias\" >";
			foreach($c as $key=>$cate){
				$main .= "<OPTION NAME=\"opcao\" value=\"$cate->idCategoria\">$cate->nome </OPTION>";
			}
			$main .= "</SELECT></h3>";
			echo $main;
			echo "<br/><br/><h4 class=\"post-title\" >Novo nome:<input type=\"text\" name=\"nome\" /><h4>";
			echo "<input type=\"hidden\" name=\"tipo\" value=\"att\">";
			echo "<br/><input type=\"submit\" value=\"Atualizar\" /></form>";
		}
		elseif(delete()){
		$main = "<h2 class=\"post-title\" ><u>Excluir Categoria</u></h2><br/><br/>".
					"<form action=\"categorias.php\" method=\"POST\"><h3 class=\"post-title\" >Escolha a categoria:".
					"<SELECT NAME=\"categorias\" >";
			foreach($c as $key=>$cate){
				$main .= "<OPTION NAME=\"opcao\" value=\"$cate->idCategoria\">$cate->nome </OPTION>";
			}
			$main .= "</SELECT></h3>";
			echo $main;
			echo "<input type=\"hidden\" name=\"tipo\" value=\"delete\">";
			echo "<br/><br/><input type=\"submit\" value=\"Excluir\" /></form>";
		}
		else {
			echo "<h2 class=\"post-title\" ><u>Categorias</u></h4><br/><br/>";
			foreach($c as $key=>$cate){
				echo "<h3 class=\"post-title\" ><a href=\"index.php?cat=$cate->idCategoria\">$cate->nome</a></h3><br/><br/>";
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
                <li ><a href="index.php">Home</a></li>
				<?php echo $menu; 	?>
				<div class="logon"><?php echo $logon; ?></div>
			</ul>
		</div>
        

      
        <div id="content-wrapper">
            <div id="content">
                <?php showmain(); ?>

            </div> 			
        </div>
        
        <div id="sidebar-wrapper">
          <div id="sidebar">
           <h3 style="text-transform: none;">Opções</h3>
           <ul id="sidenotes">
            <li><a href="categorias.php?cre=on">Criar</a></li>
			<li><a href="categorias.php?att=on">Alterar</a></li>
			<li><a href="categorias.php?del=on">Excluir</a></li>
		   </ul>
          </div> 
        </div>
        
        <div id="footer">By <a href="http://kismet.blogsite.org">Kismet</a>. Original design <a href="http://www.nikhedonia.com/showcase/entry/one-penny/">here</a> by SimplyGold.</div>
        
      </div> 
      
   </div>
</body>

</html>
