<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2010-12-03 15:24
 */
interface CategoriaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Categoria 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param categoria primary key
 	 */
	public function delete($id_categoria);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Categoria categoria
 	 */
	public function insert($categoria);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Categoria categoria
 	 */
	public function update($categoria);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);


	public function deleteByNome($value);


}
?>