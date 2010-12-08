<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2010-12-03 22:02
 */
interface ComentarioDAO{
	
	public function getComentariosByIdPost();
	
	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Comentario 
	 */
	public function load($idComentario, $idPost);

	/**
	 * Get all records from table
	 */
	public function queryAll();

	public function getCountComentariosByIdPost($idPost);
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param comentario primary key
 	 */
	public function delete($idComentario, $idPost);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Comentario comentario
 	 */
	public function insert($comentario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Comentario comentario
 	 */
	public function update($comentario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByEmail($value);

	public function queryBySite($value);

	public function queryByTexto($value);

	public function deleteByNome($value);

	public function deleteByEmail($value);

	public function deleteBySite($value);

	public function deleteByTexto($value);


}
?>