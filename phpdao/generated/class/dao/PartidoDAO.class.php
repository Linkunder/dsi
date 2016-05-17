<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface PartidoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Partido 
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
 	 * @param partido primary key
 	 */
	public function delete($idPartido);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Partido partido
 	 */
	public function insert($partido);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Partido partido
 	 */
	public function update($partido);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFecha($value);

	public function queryByHora($value);

	public function queryByCuota($value);

	public function queryByEstadoPartidoIdEstado($value);

	public function queryByRecintoIdRecinto($value);

	public function queryByTercerTiempoIdTercerTiempo($value);


	public function deleteByFecha($value);

	public function deleteByHora($value);

	public function deleteByCuota($value);

	public function deleteByEstadoPartidoIdEstado($value);

	public function deleteByRecintoIdRecinto($value);

	public function deleteByTercerTiempoIdTercerTiempo($value);


}
?>