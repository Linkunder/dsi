<?php
/**
 * Class that operate on table 'elementodeportivo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class ElementodeportivoMySqlDAO implements ElementodeportivoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ElementodeportivoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM elementodeportivo WHERE idElementoDeportivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM elementodeportivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM elementodeportivo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param elementodeportivo primary key
 	 */
	public function delete($idElementoDeportivo){
		$sql = 'DELETE FROM elementodeportivo WHERE idElementoDeportivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idElementoDeportivo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ElementodeportivoMySql elementodeportivo
 	 */
	public function insert($elementodeportivo){
		$sql = 'INSERT INTO elementodeportivo (nombre, precio) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($elementodeportivo->nombre);
		$sqlQuery->setNumber($elementodeportivo->precio);

		$id = $this->executeInsert($sqlQuery);	
		$elementodeportivo->idElementoDeportivo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ElementodeportivoMySql elementodeportivo
 	 */
	public function update($elementodeportivo){
		$sql = 'UPDATE elementodeportivo SET nombre = ?, precio = ? WHERE idElementoDeportivo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($elementodeportivo->nombre);
		$sqlQuery->setNumber($elementodeportivo->precio);

		$sqlQuery->setNumber($elementodeportivo->idElementoDeportivo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM elementodeportivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM elementodeportivo WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM elementodeportivo WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM elementodeportivo WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM elementodeportivo WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ElementodeportivoMySql 
	 */
	protected function readRow($row){
		$elementodeportivo = new Elementodeportivo();
		
		$elementodeportivo->idElementoDeportivo = $row['idElementoDeportivo'];
		$elementodeportivo->nombre = $row['nombre'];
		$elementodeportivo->precio = $row['precio'];

		return $elementodeportivo;
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
	 * @return ElementodeportivoMySql 
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