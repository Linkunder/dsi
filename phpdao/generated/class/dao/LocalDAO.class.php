<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface LocalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Local 
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
 	 * @param local primary key
 	 */
	public function delete($idLocal);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Local local
 	 */
	public function insert($local);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Local local
 	 */
	public function update($local);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDireccion($value);

	public function queryByRutaFotografia($value);

	public function queryByLinkMapa($value);


	public function deleteByNombre($value);

	public function deleteByDireccion($value);

	public function deleteByRutaFotografia($value);

	public function deleteByLinkMapa($value);


}
?>