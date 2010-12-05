<div id="header"><h1><?php echo blog_titulo ?></h1></div>

<?php if(!isset($_SESSION['email'])) : ?>

    <form action="action/login.php" id="formlogin" method="post">
        <label>E-mail:</label>
        <input type="text" name="email" />
        <label>Senha:</label>
        <input type="text" name="email" />                        
        <input type="submit" value="OK" />
    </form>         

<?php else : ?>

	Olá, <strong><?php echo $_SESSION['email'] ?></strong>

<?php endif; ?>