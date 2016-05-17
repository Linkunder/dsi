<?php
/**
 * Class that operate on table 'local'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class LocalMySqlDAO implements LocalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LocalMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM local WHERE idLocal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM local';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM local ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param local primary key
 	 */
	public function delete($idLocal){
		$sql = 'DELETE FROM local WHERE idLocal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idLocal);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LocalMySql local
 	 */
	public function insert($local){
		$sql = 'INSERT INTO local (nombre, direccion, rutaFotografia, linkMapa) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($local->nombre);
		$sqlQuery->set($local->direccion);
		$sqlQuery->set($local->rutaFotografia);
		$sqlQuery->set($local->linkMapa);

		$id = $this->executeInsert($sqlQuery);	
		$local->idLocal = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LocalMySql local
 	 */
	public function update($local){
		$sql = 'UPDATE local SET nombre = ?, direccion = ?, rutaFotografia = ?, linkMapa = ? WHERE idLocal = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($local->nombre);
		$sqlQuery->set($local->direccion);
		$sqlQuery->set($local->rutaFotografia);
		$sqlQuery->set($local->linkMapa);

		$sqlQuery->setNumber($local->idLocal);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM local';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM local WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM local WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutaFotografia($value){
		$sql = 'SELECT * FROM local WHERE rutaFotografia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinkMapa($value){
		$sql = 'SELECT * FROM local WHERE linkMapa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM local WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM local WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutaFotografia($value){
		$sql = 'DELETE FROM local WHERE rutaFotografia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkMapa($value){
		$sql = 'DELETE FROM local WHERE linkMapa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return LocalMySql 
	 */
	protected function readRow($row){
		$local = new Local();
		
		$local->idLocal = $row['idLocal'];
		$local->nombre = $row['nombre'];
		$local->direccion = $row['direccion'];
		$local->rutaFotografia = $row['rutaFotografia'];
		$local->linkMapa = $row['linkMapa'];

		return $local;
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
	 * @return LocalMySql 
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