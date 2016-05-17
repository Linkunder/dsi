<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Usuario 
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
 	 * @param usuario primary key
 	 */
	public function delete($usuarioid);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Usuario usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Usuario usuario
 	 */
	public function update($usuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdusuario($value);

	public function queryByNombre($value);

	public function queryByApellido($value);

	public function queryByEmail($value);

	public function queryByFechanacimiento($value);

	public function queryBySexo($value);

	public function queryByRutafotografia($value);

	public function queryByTelefono($value);

	public function queryByEstadojugadorIdestadojugador($value);

	public function queryByPerfilIdperfil($value);


	public function deleteByIdusuario($value);

	public function deleteByNombre($value);

	public function deleteByApellido($value);

	public function deleteByEmail($value);

	public function deleteByFechanacimiento($value);

	public function deleteBySexo($value);

	public function deleteByRutafotografia($value);

	public function deleteByTelefono($value);

	public function deleteByEstadojugadorIdestadojugador($value);

	public function deleteByPerfilIdperfil($value);


}
?>