<?php
/**
 * Class that operate on table 'recinto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class RecintoMySqlDAO implements RecintoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RecintoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM recinto WHERE idRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM recinto';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM recinto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param recinto primary key
 	 */
	public function delete($idRecinto){
		$sql = 'DELETE FROM recinto WHERE idRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idRecinto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RecintoMySql recinto
 	 */
	public function insert($recinto){
		$sql = 'INSERT INTO recinto (nombre, precio, direccion, horario, rutaFotografia, linkMapa, cantidadCanchas, puntuacion, telefono, EstadoRecinto_idEstadoRecinto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($recinto->nombre);
		$sqlQuery->setNumber($recinto->precio);
		$sqlQuery->set($recinto->direccion);
		$sqlQuery->set($recinto->horario);
		$sqlQuery->set($recinto->rutaFotografia);
		$sqlQuery->set($recinto->linkMapa);
		$sqlQuery->setNumber($recinto->cantidadCanchas);
		$sqlQuery->setNumber($recinto->puntuacion);
		$sqlQuery->setNumber($recinto->telefono);
		$sqlQuery->setNumber($recinto->estadoRecintoIdEstadoRecinto);

		$id = $this->executeInsert($sqlQuery);	
		$recinto->idRecinto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RecintoMySql recinto
 	 */
	public function update($recinto){
		$sql = 'UPDATE recinto SET nombre = ?, precio = ?, direccion = ?, horario = ?, rutaFotografia = ?, linkMapa = ?, cantidadCanchas = ?, puntuacion = ?, telefono = ?, EstadoRecinto_idEstadoRecinto = ? WHERE idRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($recinto->nombre);
		$sqlQuery->setNumber($recinto->precio);
		$sqlQuery->set($recinto->direccion);
		$sqlQuery->set($recinto->horario);
		$sqlQuery->set($recinto->rutaFotografia);
		$sqlQuery->set($recinto->linkMapa);
		$sqlQuery->setNumber($recinto->cantidadCanchas);
		$sqlQuery->setNumber($recinto->puntuacion);
		$sqlQuery->setNumber($recinto->telefono);
		$sqlQuery->setNumber($recinto->estadoRecintoIdEstadoRecinto);

		$sqlQuery->setNumber($recinto->idRecinto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM recinto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM recinto WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM recinto WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM recinto WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHorario($value){
		$sql = 'SELECT * FROM recinto WHERE horario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutaFotografia($value){
		$sql = 'SELECT * FROM recinto WHERE rutaFotografia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkMapa($value){
		$sql = 'SELECT * FROM recinto WHERE linkMapa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidadCanchas($value){
		$sql = 'SELECT * FROM recinto WHERE cantidadCanchas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPuntuacion($value){
		$sql = 'SELECT * FROM recinto WHERE puntuacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM recinto WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadoRecintoIdEstadoRecinto($value){
		$sql = 'SELECT * FROM recinto WHERE EstadoRecinto_idEstadoRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM recinto WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM recinto WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM recinto WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHorario($value){
		$sql = 'DELETE FROM recinto WHERE horario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutaFotografia($value){
		$sql = 'DELETE FROM recinto WHERE rutaFotografia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkMapa($value){
		$sql = 'DELETE FROM recinto WHERE linkMapa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidadCanchas($value){
		$sql = 'DELETE FROM recinto WHERE cantidadCanchas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPuntuacion($value){
		$sql = 'DELETE FROM recinto WHERE puntuacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM recinto WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadoRecintoIdEstadoRecinto($value){
		$sql = 'DELETE FROM recinto WHERE EstadoRecinto_idEstadoRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RecintoMySql 
	 */
	protected function readRow($row){
		$recinto = new Recinto();
		
		$recinto->idRecinto = $row['idRecinto'];
		$recinto->nombre = $row['nombre'];
		$recinto->precio = $row['precio'];
		$recinto->direccion = $row['direccion'];
		$recinto->horario = $row['horario'];
		$recinto->rutaFotografia = $row['rutaFotografia'];
		$recinto->linkMapa = $row['linkMapa'];
		$recinto->cantidadCanchas = $row['cantidadCanchas'];
		$recinto->puntuacion = $row['puntuacion'];
		$recinto->telefono = $row['telefono'];
		$recinto->estadoRecintoIdEstadoRecinto = $row['EstadoRecinto_idEstadoRecinto'];

		return $recinto;
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
	 * @return RecintoMySql 
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