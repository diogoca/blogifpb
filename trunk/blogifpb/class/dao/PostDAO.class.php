<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2010-12-03 22:02
 */
interface PostDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Post 
	 */
	public function load($idPost, $idCategoria, $idUsuario);

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
 	 * @param post primary key
 	 */
	public function delete($idPost, $idCategoria, $idUsuario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Post post
 	 */
	public function insert($post);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Post post
 	 */
	public function update($post);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByTexto($value);

	public function queryByData($value);

	public function queryByTags($value);


	public function deleteByTitulo($value);

	public function deleteByTexto($value);

	public function deleteByData($value);

	public function deleteByTags($value);


}
?>