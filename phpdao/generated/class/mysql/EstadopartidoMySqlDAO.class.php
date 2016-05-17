<?php
/**
 * Class that operate on table 'estadopartido'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class EstadopartidoMySqlDAO implements EstadopartidoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EstadopartidoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM estadopartido WHERE idEstado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM estadopartido';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM estadopartido ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param estadopartido primary key
 	 */
	public function delete($idEstado){
		$sql = 'DELETE FROM estadopartido WHERE idEstado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idEstado);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EstadopartidoMySql estadopartido
 	 */
	public function insert($estadopartido){
		$sql = 'INSERT INTO estadopartido (nombre, descripcion) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($estadopartido->nombre);
		$sqlQuery->set($estadopartido->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$estadopartido->idEstado = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EstadopartidoMySql estadopartido
 	 */
	public function update($estadopartido){
		$sql = 'UPDATE estadopartido SET nombre = ?, descripcion = ? WHERE idEstado = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($estadopartido->nombre);
		$sqlQuery->set($estadopartido->descripcion);

		$sqlQuery->setNumber($estadopartido->idEstado);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM estadopartido';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM estadopartido WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM estadopartido WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM estadopartido WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM estadopartido WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EstadopartidoMySql 
	 */
	protected function readRow($row){
		$estadopartido = new Estadopartido();
		
		$estadopartido->idEstado = $row['idEstado'];
		$estadopartido->nombre = $row['nombre'];
		$estadopartido->descripcion = $row['descripcion'];

		return $estadopartido;
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
	 * @return EstadopartidoMySql 
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