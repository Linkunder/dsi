<?php
/**
 * Class that operate on table 'categoriarecinto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class CategoriarecintoMySqlDAO implements CategoriarecintoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategoriarecintoMySql 
	 */
	public function load($categoriaIdCategoria, $recintoIdRecinto){
		$sql = 'SELECT * FROM categoriarecinto WHERE Categoria_idCategoria = ?  AND Recinto_idRecinto = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($categoriaIdCategoria);
		$sqlQuery->setNumber($recintoIdRecinto);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM categoriarecinto';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM categoriarecinto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param categoriarecinto primary key
 	 */
	public function delete($categoriaIdCategoria, $recintoIdRecinto){
		$sql = 'DELETE FROM categoriarecinto WHERE Categoria_idCategoria = ?  AND Recinto_idRecinto = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($categoriaIdCategoria);
		$sqlQuery->setNumber($recintoIdRecinto);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategoriarecintoMySql categoriarecinto
 	 */
	public function insert($categoriarecinto){
		$sql = 'INSERT INTO categoriarecinto ( Categoria_idCategoria, Recinto_idRecinto) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($categoriarecinto->categoriaIdCategoria);

		$sqlQuery->setNumber($categoriarecinto->recintoIdRecinto);

		$this->executeInsert($sqlQuery);	
		//$categoriarecinto->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategoriarecintoMySql categoriarecinto
 	 */
	public function update($categoriarecinto){
		$sql = 'UPDATE categoriarecinto SET  WHERE Categoria_idCategoria = ?  AND Recinto_idRecinto = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($categoriarecinto->categoriaIdCategoria);

		$sqlQuery->setNumber($categoriarecinto->recintoIdRecinto);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM categoriarecinto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return CategoriarecintoMySql 
	 */
	protected function readRow($row){
		$categoriarecinto = new Categoriarecinto();
		
		$categoriarecinto->categoriaIdCategoria = $row['Categoria_idCategoria'];
		$categoriarecinto->recintoIdRecinto = $row['Recinto_idRecinto'];

		return $categoriarecinto;
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
	 * @return CategoriarecintoMySql 
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