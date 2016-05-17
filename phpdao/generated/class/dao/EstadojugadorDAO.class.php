<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface EstadojugadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Estadojugador 
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
 	 * @param estadojugador primary key
 	 */
	public function delete($idEstadoJugador);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Estadojugador estadojugador
 	 */
	public function insert($estadojugador);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Estadojugador estadojugador
 	 */
	public function update($estadojugador);	

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