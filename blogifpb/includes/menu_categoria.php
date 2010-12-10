<ul id="sidenotes">
           		
	<?php foreach($categoria as $chave => $valor) : ?>
	
	<li><a href="categoria.php?id_categoria=<?php echo $valor->idCategoria ?>"><?php echo $valor->nome ?></a></li>
	
	<?php endforeach; ?>
	
</ul>