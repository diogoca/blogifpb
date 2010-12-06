<div id="navigation">
   <ul>
        <?php if(!isset($_SESSION['email'])) : ?>
		<li id="current_page_item"><a href="index.php" >Home</a></li>
		
		<?php else : ?>
		<li id="current_page_item"><a href="index.php" >Home</a></li>
		<li><a href="#" >Posts</a></li>
		<li><a href="categoria.php" >Categorias</a></li>
		<li><a href="#" >Comentarios</a></li>
		<li><a href="#" >Usuarios</a></li>
		<li><a href="#" >Tags</a></li>
		<?php endif; ?>
   </ul>           			  
    
</div>