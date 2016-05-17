<?php
/**
 * Class that operate on table 'estadojugador'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class EstadojugadorMySqlDAO implements EstadojugadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EstadojugadorMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM estadojugador WHERE idEstadoJugador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM estadojugador';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM estadojugador ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param estadojugador primary key
 	 */
	public function delete($idEstadoJugador){
		$sql = 'DELETE FROM estadojugador WHERE idEstadoJugador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idEstadoJugador);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EstadojugadorMySql estadojugador
 	 */
	public function insert($estadojugador){
		$sql = 'INSERT INTO estadojugador (nombre, descripcion) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($estadojugador->nombre);
		$sqlQuery->set($estadojugador->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$estadojugador->idEstadoJugador = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EstadojugadorMySql estadojugador
 	 */
	public function update($estadojugador){
		$sql = 'UPDATE estadojugador SET nombre = ?, descripcion = ? WHERE idEstadoJugador = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($estadojugador->nombre);
		$sqlQuery->set($estadojugador->descripcion);

		$sqlQuery->setNumber($estadojugador->idEstadoJugador);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM estadojugador';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM estadojugador WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM estadojugador WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM estadojugador WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM estadojugador WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EstadojugadorMySql 
	 */
	protected function readRow($row){
		$estadojugador = new Estadojugador();
		
		$estadojugador->idEstadoJugador = $row['idEstadoJugador'];
		$estadojugador->nombre = $row['nombre'];
		$estadojugador->descripcion = $row['descripcion'];

		return $estadojugador;
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
	 * @return EstadojugadorMySql 
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