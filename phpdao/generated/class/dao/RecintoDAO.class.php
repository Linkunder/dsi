<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface RecintoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Recinto 
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
 	 * @param recinto primary key
 	 */
	public function delete($idRecinto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Recinto recinto
 	 */
	public function insert($recinto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Recinto recinto
 	 */
	public function update($recinto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByPrecio($value);

	public function queryByDireccion($value);

	public function queryByHorario($value);

	public function queryByRutaFotografia($value);

	public function queryByLinkMapa($value);

	public function queryByCantidadCanchas($value);

	public function queryByPuntuacion($value);

	public function queryByTelefono($value);

	public function queryByEstadoRecintoIdEstadoRecinto($value);


	public function deleteByNombre($value);

	public function deleteByPrecio($value);

	public function deleteByDireccion($value);

	public function deleteByHorario($value);

	public function deleteByRutaFotografia($value);

	public function deleteByLinkMapa($value);

	public function deleteByCantidadCanchas($value);

	public function deleteByPuntuacion($value);

	public function deleteByTelefono($value);

	public function deleteByEstadoRecintoIdEstadoRecinto($value);


}
?>