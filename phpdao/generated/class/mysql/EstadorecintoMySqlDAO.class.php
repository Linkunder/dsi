<?php
/**
 * Class that operate on table 'estadorecinto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class EstadorecintoMySqlDAO implements EstadorecintoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EstadorecintoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM estadorecinto WHERE idEstadoRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM estadorecinto';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM estadorecinto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param estadorecinto primary key
 	 */
	public function delete($idEstadoRecinto){
		$sql = 'DELETE FROM estadorecinto WHERE idEstadoRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idEstadoRecinto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EstadorecintoMySql estadorecinto
 	 */
	public function insert($estadorecinto){
		$sql = 'INSERT INTO estadorecinto (nombre, descripcion) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($estadorecinto->nombre);
		$sqlQuery->set($estadorecinto->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$estadorecinto->idEstadoRecinto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EstadorecintoMySql estadorecinto
 	 */
	public function update($estadorecinto){
		$sql = 'UPDATE estadorecinto SET nombre = ?, descripcion = ? WHERE idEstadoRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($estadorecinto->nombre);
		$sqlQuery->set($estadorecinto->descripcion);

		$sqlQuery->setNumber($estadorecinto->idEstadoRecinto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM estadorecinto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM estadorecinto WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM estadorecinto WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM estadorecinto WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM estadorecinto WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EstadorecintoMySql 
	 */
	protected function readRow($row){
		$estadorecinto = new Estadorecinto();
		
		$estadorecinto->idEstadoRecinto = $row['idEstadoRecinto'];
		$estadorecinto->nombre = $row['nombre'];
		$estadorecinto->descripcion = $row['descripcion'];

		return $estadorecinto;
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
	 * @return EstadorecintoMySql 
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