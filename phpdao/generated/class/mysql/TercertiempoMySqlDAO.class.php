<?php
/**
 * Class that operate on table 'tercertiempo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class TercertiempoMySqlDAO implements TercertiempoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TercertiempoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tercertiempo WHERE idTercerTiempo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tercertiempo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tercertiempo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tercertiempo primary key
 	 */
	public function delete($idTercerTiempo){
		$sql = 'DELETE FROM tercertiempo WHERE idTercerTiempo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idTercerTiempo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TercertiempoMySql tercertiempo
 	 */
	public function insert($tercertiempo){
		$sql = 'INSERT INTO tercertiempo (descripcion, hora, Local_idLocal) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tercertiempo->descripcion);
		$sqlQuery->set($tercertiempo->hora);
		$sqlQuery->setNumber($tercertiempo->localIdLocal);

		$id = $this->executeInsert($sqlQuery);	
		$tercertiempo->idTercerTiempo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TercertiempoMySql tercertiempo
 	 */
	public function update($tercertiempo){
		$sql = 'UPDATE tercertiempo SET descripcion = ?, hora = ?, Local_idLocal = ? WHERE idTercerTiempo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tercertiempo->descripcion);
		$sqlQuery->set($tercertiempo->hora);
		$sqlQuery->setNumber($tercertiempo->localIdLocal);

		$sqlQuery->setNumber($tercertiempo->idTercerTiempo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tercertiempo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM tercertiempo WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHora($value){
		$sql = 'SELECT * FROM tercertiempo WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocalIdLocal($value){
		$sql = 'SELECT * FROM tercertiempo WHERE Local_idLocal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM tercertiempo WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHora($value){
		$sql = 'DELETE FROM tercertiempo WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocalIdLocal($value){
		$sql = 'DELETE FROM tercertiempo WHERE Local_idLocal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TercertiempoMySql 
	 */
	protected function readRow($row){
		$tercertiempo = new Tercertiempo();
		
		$tercertiempo->idTercerTiempo = $row['idTercerTiempo'];
		$tercertiempo->descripcion = $row['descripcion'];
		$tercertiempo->hora = $row['hora'];
		$tercertiempo->localIdLocal = $row['Local_idLocal'];

		return $tercertiempo;
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
	 * @return TercertiempoMySql 
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