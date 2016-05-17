<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface TercertiempoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tercertiempo 
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
 	 * @param tercertiempo primary key
 	 */
	public function delete($idTercerTiempo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tercertiempo tercertiempo
 	 */
	public function insert($tercertiempo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tercertiempo tercertiempo
 	 */
	public function update($tercertiempo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);

	public function queryByHora($value);

	public function queryByLocalIdLocal($value);


	public function deleteByDescripcion($value);

	public function deleteByHora($value);

	public function deleteByLocalIdLocal($value);


}
?>