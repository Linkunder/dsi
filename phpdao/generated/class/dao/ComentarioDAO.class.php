<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface ComentarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Comentario 
	 */
	public function load($recintoIdRecinto, $usuarioIdUsuario);

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
 	 * @param comentario primary key
 	 */
	public function delete($recintoIdRecinto, $usuarioIdUsuario);
	
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

	public function queryByAsunto($value);

	public function queryByContenido($value);

	public function queryByFecha($value);

	public function queryByHora($value);


	public function deleteByAsunto($value);

	public function deleteByContenido($value);

	public function deleteByFecha($value);

	public function deleteByHora($value);


}
?>