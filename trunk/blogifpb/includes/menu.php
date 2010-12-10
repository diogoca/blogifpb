<div id="navigation">
   <ul>
        <?php if(!isset($_SESSION['email'])) : ?>
			<li><a href="index.php" >Home</a></li>
		
		<?php else : ?>
			<li><a href="index.php" >Home</a></li>
			
			<li class="direita"><a href="admin/post.php" >Posts</a></li>
			<li class="direita"><a href="admin/categoria.php" >Categorias</a></li>
			<li class="direita"><a href="admin/comentario.php" >Comentarios</a></li>
			<li class="direita"><a href="admin/usuario.php" >Usuarios</a></li>

		<?php endif; ?>
   </ul>           			  
    
</div>