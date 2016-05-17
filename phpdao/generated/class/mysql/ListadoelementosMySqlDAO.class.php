<?php
/**
 * Class that operate on table 'listadoelementos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class ListadoelementosMySqlDAO implements ListadoelementosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ListadoelementosMySql 
	 */
	public function load($recintoIdRecinto, $elementoDeportivoIdElementoDeportivo){
		$sql = 'SELECT * FROM listadoelementos WHERE Recinto_idRecinto = ?  AND ElementoDeportivo_idElementoDeportivo = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($recintoIdRecinto);
		$sqlQuery->setNumber($elementoDeportivoIdElementoDeportivo);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM listadoelementos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM listadoelementos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param listadoelemento primary key
 	 */
	public function delete($recintoIdRecinto, $elementoDeportivoIdElementoDeportivo){
		$sql = 'DELETE FROM listadoelementos WHERE Recinto_idRecinto = ?  AND ElementoDeportivo_idElementoDeportivo = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($recintoIdRecinto);
		$sqlQuery->setNumber($elementoDeportivoIdElementoDeportivo);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ListadoelementosMySql listadoelemento
 	 */
	public function insert($listadoelemento){
		$sql = 'INSERT INTO listadoelementos (cantidad, Recinto_idRecinto, ElementoDeportivo_idElementoDeportivo) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($listadoelemento->cantidad);

		
		$sqlQuery->setNumber($listadoelemento->recintoIdRecinto);

		$sqlQuery->setNumber($listadoelemento->elementoDeportivoIdElementoDeportivo);

		$this->executeInsert($sqlQuery);	
		//$listadoelemento->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ListadoelementosMySql listadoelemento
 	 */
	public function update($listadoelemento){
		$sql = 'UPDATE listadoelementos SET cantidad = ? WHERE Recinto_idRecinto = ?  AND ElementoDeportivo_idElementoDeportivo = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($listadoelemento->cantidad);

		
		$sqlQuery->setNumber($listadoelemento->recintoIdRecinto);

		$sqlQuery->setNumber($listadoelemento->elementoDeportivoIdElementoDeportivo);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM listadoelementos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM listadoelementos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCantidad($value){
		$sql = 'DELETE FROM listadoelementos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ListadoelementosMySql 
	 */
	protected function readRow($row){
		$listadoelemento = new Listadoelemento();
		
		$listadoelemento->recintoIdRecinto = $row['Recinto_idRecinto'];
		$listadoelemento->elementoDeportivoIdElementoDeportivo = $row['ElementoDeportivo_idElementoDeportivo'];
		$listadoelemento->cantidad = $row['cantidad'];

		return $listadoelemento;
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
	 * @return ListadoelementosMySql 
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