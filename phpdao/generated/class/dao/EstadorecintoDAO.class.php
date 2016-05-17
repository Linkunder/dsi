<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface EstadorecintoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Estadorecinto 
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
 	 * @param estadorecinto primary key
 	 */
	public function delete($idEstadoRecinto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Estadorecinto estadorecinto
 	 */
	public function insert($estadorecinto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Estadorecinto estadorecinto
 	 */
	public function update($estadorecinto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDescripcion($value);


	public function deleteByNombre($value);

	public function deleteByDescripcion($value);


}
?>