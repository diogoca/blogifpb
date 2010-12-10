<?php
/**
* Arquivo de instalação, deve ser deletado após o uso
*
*/


/**
 * Include do arquivo de configuração
 */

    require('config.php');

/**
 * Criação da tabela e populando o banco
 */
    $arquivo = file_get_contents('extras/sql.sql');
    $arquivo = explode(';', $arquivo);

    foreach($arquivo as $linha){        
        QueryExecutor::executeSimpleQuery($linha);
    }
    

/**
 * Retorno
 */

    echo 'Parabéns! Instalação efetuada com sucesso!<br /><br /><a href="' . blog_url . '">Ir para página inicial</a>';

?>