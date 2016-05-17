<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface EquipoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Equipo 
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
 	 * @param equipo primary key
 	 */
	public function delete($idEquipo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Equipo equipo
 	 */
	public function insert($equipo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Equipo equipo
 	 */
	public function update($equipo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByColor($value);

	public function queryByUsuarioIdUsuario($value);

	public function queryByPartidoIdPartido($value);


	public function deleteByColor($value);

	public function deleteByUsuarioIdUsuario($value);

	public function deleteByPartidoIdPartido($value);


}
?>