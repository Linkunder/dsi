<?php
/**
 * Class that operate on table 'partido'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class PartidoMySqlDAO implements PartidoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PartidoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM partido WHERE idPartido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM partido';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM partido ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param partido primary key
 	 */
	public function delete($idPartido){
		$sql = 'DELETE FROM partido WHERE idPartido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPartido);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PartidoMySql partido
 	 */
	public function insert($partido){
		$sql = 'INSERT INTO partido (fecha, hora, cuota, EstadoPartido_idEstado, Recinto_idRecinto, TercerTiempo_idTercerTiempo) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partido->fecha);
		$sqlQuery->set($partido->hora);
		$sqlQuery->setNumber($partido->cuota);
		$sqlQuery->setNumber($partido->estadoPartidoIdEstado);
		$sqlQuery->setNumber($partido->recintoIdRecinto);
		$sqlQuery->setNumber($partido->tercerTiempoIdTercerTiempo);

		$id = $this->executeInsert($sqlQuery);	
		$partido->idPartido = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PartidoMySql partido
 	 */
	public function update($partido){
		$sql = 'UPDATE partido SET fecha = ?, hora = ?, cuota = ?, EstadoPartido_idEstado = ?, Recinto_idRecinto = ?, TercerTiempo_idTercerTiempo = ? WHERE idPartido = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($partido->fecha);
		$sqlQuery->set($partido->hora);
		$sqlQuery->setNumber($partido->cuota);
		$sqlQuery->setNumber($partido->estadoPartidoIdEstado);
		$sqlQuery->setNumber($partido->recintoIdRecinto);
		$sqlQuery->setNumber($partido->tercerTiempoIdTercerTiempo);

		$sqlQuery->setNumber($partido->idPartido);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM partido';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM partido WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHora($value){
		$sql = 'SELECT * FROM partido WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCuota($value){
		$sql = 'SELECT * FROM partido WHERE cuota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstadoPartidoIdEstado($value){
		$sql = 'SELECT * FROM partido WHERE EstadoPartido_idEstado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRecintoIdRecinto($value){
		$sql = 'SELECT * FROM partido WHERE Recinto_idRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTercerTiempoIdTercerTiempo($value){
		$sql = 'SELECT * FROM partido WHERE TercerTiempo_idTercerTiempo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFecha($value){
		$sql = 'DELETE FROM partido WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHora($value){
		$sql = 'DELETE FROM partido WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCuota($value){
		$sql = 'DELETE FROM partido WHERE cuota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstadoPartidoIdEstado($value){
		$sql = 'DELETE FROM partido WHERE EstadoPartido_idEstado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRecintoIdRecinto($value){
		$sql = 'DELETE FROM partido WHERE Recinto_idRecinto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTercerTiempoIdTercerTiempo($value){
		$sql = 'DELETE FROM partido WHERE TercerTiempo_idTercerTiempo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PartidoMySql 
	 */
	protected function readRow($row){
		$partido = new Partido();
		
		$partido->idPartido = $row['idPartido'];
		$partido->fecha = $row['fecha'];
		$partido->hora = $row['hora'];
		$partido->cuota = $row['cuota'];
		$partido->estadoPartidoIdEstado = $row['EstadoPartido_idEstado'];
		$partido->recintoIdRecinto = $row['Recinto_idRecinto'];
		$partido->tercerTiempoIdTercerTiempo = $row['TercerTiempo_idTercerTiempo'];

		return $partido;
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
	 * @return PartidoMySql 
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