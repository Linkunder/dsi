<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface SolicitudDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Solicitud 
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
 	 * @param solicitud primary key
 	 */
	public function delete($idSolicitud);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Solicitud solicitud
 	 */
	public function insert($solicitud);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Solicitud solicitud
 	 */
	public function update($solicitud);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByDireccion($value);

	public function queryByPrecio($value);

	public function queryByCantidadCanchas($value);

	public function queryByRutaImagen($value);

	public function queryByLinkMapa($value);

	public function queryByHorario($value);

	public function queryBySuperficie($value);

	public function queryByTelefono($value);

	public function queryByUsuarioIdUsuario($value);


	public function deleteByNombre($value);

	public function deleteByDireccion($value);

	public function deleteByPrecio($value);

	public function deleteByCantidadCanchas($value);

	public function deleteByRutaImagen($value);

	public function deleteByLinkMapa($value);

	public function deleteByHorario($value);

	public function deleteBySuperficie($value);

	public function deleteByTelefono($value);

	public function deleteByUsuarioIdUsuario($value);


}
?>