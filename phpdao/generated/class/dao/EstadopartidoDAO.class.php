<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface EstadopartidoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Estadopartido 
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
 	 * @param estadopartido primary key
 	 */
	public function delete($idEstado);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Estadopartido estadopartido
 	 */
	public function insert($estadopartido);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Estadopartido estadopartido
 	 */
	public function update($estadopartido);	

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