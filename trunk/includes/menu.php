<div id="navigation">
   <ul>
        <?php if(!isset($_SESSION['email'])) : ?>
			<li><a href="index.php" >Home</a></li>
		
		<?php else : ?>
			<li><a href="index.php" >Home</a></li>
			
			<li class="direita"><a href="admin/post.php" >Posts</a></li>
			<li class="direita"><a href="categoria.php" >Categorias</a></li>
			<li class="direita"><a href="#" >Comentarios</a></li>
			<li class="direita"><a href="#" >Usuarios</a></li>

		<?php endif; ?>
   </ul>           			  
    
</div>