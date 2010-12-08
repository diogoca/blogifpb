<?php
/**
 * Class that operate on table 'comentario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2010-12-03 22:02
 */
class ComentarioMySqlDAO implements ComentarioDAO{

	public function getComentariosByIdPost($idPost = null){
	
		$sql = 'SELECT *
				FROM comentario';
		
		$sqlQuery = new SqlQuery($sql);
		
		if($idPost){
			$sqlQuery->addWhere('id_post = ?');
			$sqlQuery->setNumber($idPost);
		}
		
		return $this->getList($sqlQuery);
	}

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ComentarioMySql 
	 */
	public function load($idComentario, $idPost){
		$sql = 'SELECT * FROM comentario WHERE id_comentario = ?  AND id_post = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idComentario);
		$sqlQuery->setNumber($idPost);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM comentario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getCountComentariosByIdPost($idPost){
		$sql = 'select count(id_comentario) from comentario where id_post = ? ';
		
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPost);
		
		return $this->querySingleResult($sqlQuery);
		
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM comentario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param comentario primary key
 	 */
	public function delete($idComentario, $idPost){
		$sql = 'DELETE FROM comentario WHERE id_comentario = ?  AND id_post = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idComentario);
		$sqlQuery->setNumber($idPost);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComentarioMySql comentario
 	 */
	public function insert($comentario){
		$sql = 'INSERT INTO comentario (nome, email, site, texto, id_comentario, id_post) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($comentario->nome);
		$sqlQuery->set($comentario->email);
		$sqlQuery->set($comentario->site);
		$sqlQuery->set($comentario->texto);

		
		$sqlQuery->setNumber($comentario->idComentario);

		$sqlQuery->setNumber($comentario->idPost);

		$this->executeInsert($sqlQuery);	
		//$comentario->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComentarioMySql comentario
 	 */
	public function update($comentario){
		$sql = 'UPDATE comentario SET nome = ?, email = ?, site = ?, texto = ? WHERE id_comentario = ?  AND id_post = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($comentario->nome);
		$sqlQuery->set($comentario->email);
		$sqlQuery->set($comentario->site);
		$sqlQuery->set($comentario->texto);

		
		$sqlQuery->setNumber($comentario->idComentario);

		$sqlQuery->setNumber($comentario->idPost);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM comentario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM comentario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM comentario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySite($value){
		$sql = 'SELECT * FROM comentario WHERE site = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTexto($value){
		$sql = 'SELECT * FROM comentario WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}
	
	public function deleteByNome($value){
		$sql = 'DELETE FROM comentario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM comentario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySite($value){
		$sql = 'DELETE FROM comentario WHERE site = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTexto($value){
		$sql = 'DELETE FROM comentario WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ComentarioMySql 
	 */
	protected function readRow($row){
		$comentario = new Comentario();
		
		$comentario->idComentario = $row['id_comentario'];
		$comentario->idPost = $row['id_post'];
		$comentario->nome = $row['nome'];
		$comentario->email = $row['email'];
		$comentario->site = $row['site'];
		$comentario->texto = $row['texto'];

		return $comentario;
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
	 * @return ComentarioMySql 
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