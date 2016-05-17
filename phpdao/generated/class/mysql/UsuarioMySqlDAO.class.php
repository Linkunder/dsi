<?php
/**
 * Class that operate on table 'usuario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class UsuarioMySqlDAO implements UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuarioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuario WHERE usuarioid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($usuarioid){
		$sql = 'DELETE FROM usuario WHERE usuarioid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($usuarioid);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuario (idusuario, nombre, apellido, email, fechanacimiento, sexo, rutafotografia, telefono, estadojugador_idestadojugador, perfil_idperfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuario->idusuario);
		$sqlQuery->set($usuario->nombre);
		$sqlQuery->set($usuario->apellido);
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->fechanacimiento);
		$sqlQuery->set($usuario->sexo);
		$sqlQuery->set($usuario->rutafotografia);
		$sqlQuery->setNumber($usuario->telefono);
		$sqlQuery->setNumber($usuario->estadojugadorIdestadojugador);
		$sqlQuery->setNumber($usuario->perfilIdperfil);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->usuarioid = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function update($usuario){
		$sql = 'UPDATE usuario SET idusuario = ?, nombre = ?, apellido = ?, email = ?, fechanacimiento = ?, sexo = ?, rutafotografia = ?, telefono = ?, estadojugador_idestadojugador = ?, perfil_idperfil = ? WHERE usuarioid = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuario->idusuario);
		$sqlQuery->set($usuario->nombre);
		$sqlQuery->set($usuario->apellido);
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->fechanacimiento);
		$sqlQuery->set($usuario->sexo);
		$sqlQuery->set($usuario->rutafotografia);
		$sqlQuery->setNumber($usuario->telefono);
		$sqlQuery->setNumber($usuario->estadojugadorIdestadojugador);
		$sqlQuery->setNumber($usuario->perfilIdperfil);

		$sqlQuery->setNumber($usuario->usuarioid);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdusuario($value){
		$sql = 'SELECT * FROM usuario WHERE idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM usuario WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellido($value){
		$sql = 'SELECT * FROM usuario WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM usuario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechanacimiento($value){
		$sql = 'SELECT * FROM usuario WHERE fechanacimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySexo($value){
		$sql = 'SELECT * FROM usuario WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutafotografia($value){
		$sql = 'SELECT * FROM usuario WHERE rutafotografia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM usuario WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadojugadorIdestadojugador($value){
		$sql = 'SELECT * FROM usuario WHERE estadojugador_idestadojugador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPerfilIdperfil($value){
		$sql = 'SELECT * FROM usuario WHERE perfil_idperfil = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdusuario($value){
		$sql = 'DELETE FROM usuario WHERE idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombre($value){
		$sql = 'DELETE FROM usuario WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellido($value){
		$sql = 'DELETE FROM usuario WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM usuario WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechanacimiento($value){
		$sql = 'DELETE FROM usuario WHERE fechanacimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySexo($value){
		$sql = 'DELETE FROM usuario WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutafotografia($value){
		$sql = 'DELETE FROM usuario WHERE rutafotografia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM usuario WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadojugadorIdestadojugador($value){
		$sql = 'DELETE FROM usuario WHERE estadojugador_idestadojugador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPerfilIdperfil($value){
		$sql = 'DELETE FROM usuario WHERE perfil_idperfil = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuarioMySql 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->usuarioid = $row['usuarioid'];
		$usuario->idusuario = $row['idusuario'];
		$usuario->nombre = $row['nombre'];
		$usuario->apellido = $row['apellido'];
		$usuario->email = $row['email'];
		$usuario->fechanacimiento = $row['fechanacimiento'];
		$usuario->sexo = $row['sexo'];
		$usuario->rutafotografia = $row['rutafotografia'];
		$usuario->telefono = $row['telefono'];
		$usuario->estadojugadorIdestadojugador = $row['estadojugador_idestadojugador'];
		$usuario->perfilIdperfil = $row['perfil_idperfil'];

		return $usuario;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return UsuarioMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>