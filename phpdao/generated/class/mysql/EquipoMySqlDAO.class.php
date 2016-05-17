<?php
/**
 * Class that operate on table 'equipo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class EquipoMySqlDAO implements EquipoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EquipoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM equipo WHERE idEquipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM equipo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM equipo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param equipo primary key
 	 */
	public function delete($idEquipo){
		$sql = 'DELETE FROM equipo WHERE idEquipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idEquipo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EquipoMySql equipo
 	 */
	public function insert($equipo){
		$sql = 'INSERT INTO equipo (color, Usuario_idUsuario, Partido_idPartido) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($equipo->color);
		$sqlQuery->setNumber($equipo->usuarioIdUsuario);
		$sqlQuery->setNumber($equipo->partidoIdPartido);

		$id = $this->executeInsert($sqlQuery);	
		$equipo->idEquipo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EquipoMySql equipo
 	 */
	public function update($equipo){
		$sql = 'UPDATE equipo SET color = ?, Usuario_idUsuario = ?, Partido_idPartido = ? WHERE idEquipo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($equipo->color);
		$sqlQuery->setNumber($equipo->usuarioIdUsuario);
		$sqlQuery->setNumber($equipo->partidoIdPartido);

		$sqlQuery->setNumber($equipo->idEquipo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM equipo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByColor($value){
		$sql = 'SELECT * FROM equipo WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioIdUsuario($value){
		$sql = 'SELECT * FROM equipo WHERE Usuario_idUsuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPartidoIdPartido($value){
		$sql = 'SELECT * FROM equipo WHERE Partido_idPartido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByColor($value){
		$sql = 'DELETE FROM equipo WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioIdUsuario($value){
		$sql = 'DELETE FROM equipo WHERE Usuario_idUsuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPartidoIdPartido($value){
		$sql = 'DELETE FROM equipo WHERE Partido_idPartido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EquipoMySql 
	 */
	protected function readRow($row){
		$equipo = new Equipo();
		
		$equipo->idEquipo = $row['idEquipo'];
		$equipo->color = $row['color'];
		$equipo->usuarioIdUsuario = $row['Usuario_idUsuario'];
		$equipo->partidoIdPartido = $row['Partido_idPartido'];

		return $equipo;
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
	 * @return EquipoMySql 
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