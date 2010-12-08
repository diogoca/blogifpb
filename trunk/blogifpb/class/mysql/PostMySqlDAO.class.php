<?php
/**
 * Class that operate on table 'post'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2010-12-03 22:02
 */
class PostMySqlDAO implements PostDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PostMySql 
	 */
	public function load($idPost, $idCategoria, $idUsuario){
		$sql = 'SELECT * FROM post WHERE id_post = ?  AND id_categoria = ?  AND id_usuario = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPost);
		$sqlQuery->setNumber($idCategoria);
		$sqlQuery->setNumber($idUsuario);

		return $this->getRow($sqlQuery);
	}
	
	/**
	 * Get Domain object by IdPost
	 *
	 * @param String $idPost 
	 * @return PostMySql 
	 */
	public function getPosts($idCategoria = null, $idPost = null, $emailUsuario = null){
	
		$sql = 'SELECT p.id_post, p.titulo, p.texto, p.data, p.id_categoria, u.email, c.nome
				FROM post p
				INNER JOIN categoria c ON ( p.id_categoria = c.id_categoria )
				INNER JOIN usuario u ON ( p.id_usuario = u.id_usuario )';
		
		$sqlQuery = new SqlQuery($sql);
		
		if($idCategoria){
			$sqlQuery->addWhere('c.id_categoria = ?');
			$sqlQuery->setNumber($idCategoria);
		}
		
		if($idPost){
			$sqlQuery->addWhere('p.id_post = ?');
			$sqlQuery->setNumber($idPost);
		}
		
		if($emailUsuario){
			$sqlQuery->addWhere('u.email = ?');
			$sqlQuery->set($emailUsuario);
		}
		
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM post';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM post ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param post primary key
 	 */
	public function delete($idPost){
		$sql = 'DELETE FROM post WHERE id_post = ?  ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPost);


		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PostMySql post
 	 */
	public function insert($post){
		$sql = 'INSERT INTO post (titulo, texto, data, tags, id_post, id_categoria, id_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($post->titulo);
		$sqlQuery->set($post->texto);
		$sqlQuery->set($post->data);
		$sqlQuery->set($post->tags);

		
		$sqlQuery->setNumber($post->idPost);

		$sqlQuery->setNumber($post->idCategoria);

		$sqlQuery->setNumber($post->idUsuario);

		$this->executeInsert($sqlQuery);	
		//$post->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PostMySql post
 	 */
	public function update($post){
		$sql = 'UPDATE post SET titulo = ?, texto = ?, data = ?, tags = ?, id_categoria = ? WHERE id_post = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($post->titulo);
		$sqlQuery->set($post->texto);
		$sqlQuery->set($post->data);
		$sqlQuery->set($post->tags);

		$sqlQuery->setNumber($post->idCategoria);	
	
		$sqlQuery->setNumber($post->idPost);
	

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM post';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM post WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTexto($value){
		$sql = 'SELECT * FROM post WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM post WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTags($value){
		$sql = 'SELECT * FROM post WHERE tags = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitulo($value){
		$sql = 'DELETE FROM post WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTexto($value){
		$sql = 'DELETE FROM post WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM post WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTags($value){
		$sql = 'DELETE FROM post WHERE tags = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PostMySql 
	 */
	protected function readRow($row){
		$post = new Post();
		
		$post->idPost = $row['id_post'];
		$post->idCategoria = $row['id_categoria'];
		$post->idUsuario = $row['id_usuario'];
		$post->titulo = $row['titulo'];
		$post->texto = $row['texto'];
		$post->data = $row['data'];
		$post->tags = $row['tags'];
		$post->nomeCategoria = $row['nome'];
		$post->emailUsuario = $row['email'];
		
		return $post;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PostMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>