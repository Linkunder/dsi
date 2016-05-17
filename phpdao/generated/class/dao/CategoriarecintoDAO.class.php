<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface CategoriarecintoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Categoriarecinto 
	 */
	public function load($categoriaIdCategoria, $recintoIdRecinto);

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
 	 * @param categoriarecinto primary key
 	 */
	public function delete($categoriaIdCategoria, $recintoIdRecinto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Categoriarecinto categoriarecinto
 	 */
	public function insert($categoriarecinto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Categoriarecinto categoriarecinto
 	 */
	public function update($categoriarecinto);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>