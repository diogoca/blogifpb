<?php
/**
 * Class that operate on table 'usuario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2010-12-03 15:24
 */
class UsuarioMySqlDAO implements UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuarioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuario WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($id_usuario){
		$sql = 'DELETE FROM usuario WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_usuario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuario (email, senha) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->senha);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->idUsuario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function update($usuario){
		$sql = 'UPDATE usuario SET email = ?, senha = ? WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->senha);

		$sqlQuery->setNumber($usuario->idUsuario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM usuario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM usuario WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEmail($value){
		$sql = 'DELETE FROM usuario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM usuario WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuarioMySql 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->idUsuario = $row['id_usuario'];
		$usuario->email = $row['email'];
		$usuario->senha = $row['senha'];

		return $usuario;
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
	 * @return UsuarioMySql 
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