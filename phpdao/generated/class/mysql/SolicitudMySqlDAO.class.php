<?php
/**
 * Class that operate on table 'solicitud'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class SolicitudMySqlDAO implements SolicitudDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SolicitudMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM solicitud WHERE idSolicitud = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM solicitud';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM solicitud ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param solicitud primary key
 	 */
	public function delete($idSolicitud){
		$sql = 'DELETE FROM solicitud WHERE idSolicitud = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idSolicitud);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SolicitudMySql solicitud
 	 */
	public function insert($solicitud){
		$sql = 'INSERT INTO solicitud (nombre, direccion, precio, cantidadCanchas, rutaImagen, linkMapa, horario, superficie, telefono, Usuario_idUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($solicitud->nombre);
		$sqlQuery->set($solicitud->direccion);
		$sqlQuery->setNumber($solicitud->precio);
		$sqlQuery->setNumber($solicitud->cantidadCanchas);
		$sqlQuery->set($solicitud->rutaImagen);
		$sqlQuery->set($solicitud->linkMapa);
		$sqlQuery->set($solicitud->horario);
		$sqlQuery->set($solicitud->superficie);
		$sqlQuery->set($solicitud->telefono);
		$sqlQuery->setNumber($solicitud->usuarioIdUsuario);

		$id = $this->executeInsert($sqlQuery);	
		$solicitud->idSolicitud = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SolicitudMySql solicitud
 	 */
	public function update($solicitud){
		$sql = 'UPDATE solicitud SET nombre = ?, direccion = ?, precio = ?, cantidadCanchas = ?, rutaImagen = ?, linkMapa = ?, horario = ?, superficie = ?, telefono = ?, Usuario_idUsuario = ? WHERE idSolicitud = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($solicitud->nombre);
		$sqlQuery->set($solicitud->direccion);
		$sqlQuery->setNumber($solicitud->precio);
		$sqlQuery->setNumber($solicitud->cantidadCanchas);
		$sqlQuery->set($solicitud->rutaImagen);
		$sqlQuery->set($solicitud->linkMapa);
		$sqlQuery->set($solicitud->horario);
		$sqlQuery->set($solicitud->superficie);
		$sqlQuery->set($solicitud->telefono);
		$sqlQuery->setNumber($solicitud->usuarioIdUsuario);

		$sqlQuery->setNumber($solicitud->idSolicitud);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM solicitud';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM solicitud WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM solicitud WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM solicitud WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidadCanchas($value){
		$sql = 'SELECT * FROM solicitud WHERE cantidadCanchas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutaImagen($value){
		$sql = 'SELECT * FROM solicitud WHERE rutaImagen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkMapa($value){
		$sql = 'SELECT * FROM solicitud WHERE linkMapa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHorario($value){
		$sql = 'SELECT * FROM solicitud WHERE horario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySuperficie($value){
		$sql = 'SELECT * FROM solicitud WHERE superficie = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM solicitud WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioIdUsuario($value){
		$sql = 'SELECT * FROM solicitud WHERE Usuario_idUsuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM solicitud WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM solicitud WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM solicitud WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidadCanchas($value){
		$sql = 'DELETE FROM solicitud WHERE cantidadCanchas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutaImagen($value){
		$sql = 'DELETE FROM solicitud WHERE rutaImagen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkMapa($value){
		$sql = 'DELETE FROM solicitud WHERE linkMapa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHorario($value){
		$sql = 'DELETE FROM solicitud WHERE horario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySuperficie($value){
		$sql = 'DELETE FROM solicitud WHERE superficie = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM solicitud WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioIdUsuario($value){
		$sql = 'DELETE FROM solicitud WHERE Usuario_idUsuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SolicitudMySql 
	 */
	protected function readRow($row){
		$solicitud = new Solicitud();
		
		$solicitud->idSolicitud = $row['idSolicitud'];
		$solicitud->nombre = $row['nombre'];
		$solicitud->direccion = $row['direccion'];
		$solicitud->precio = $row['precio'];
		$solicitud->cantidadCanchas = $row['cantidadCanchas'];
		$solicitud->rutaImagen = $row['rutaImagen'];
		$solicitud->linkMapa = $row['linkMapa'];
		$solicitud->horario = $row['horario'];
		$solicitud->superficie = $row['superficie'];
		$solicitud->telefono = $row['telefono'];
		$solicitud->usuarioIdUsuario = $row['Usuario_idUsuario'];

		return $solicitud;
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
	 * @return SolicitudMySql 
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