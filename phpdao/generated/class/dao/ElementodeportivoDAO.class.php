<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface ElementodeportivoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Elementodeportivo 
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
 	 * @param elementodeportivo primary key
 	 */
	public function delete($idElementoDeportivo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Elementodeportivo elementodeportivo
 	 */
	public function insert($elementodeportivo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Elementodeportivo elementodeportivo
 	 */
	public function update($elementodeportivo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByPrecio($value);


	public function deleteByNombre($value);

	public function deleteByPrecio($value);


}
?>