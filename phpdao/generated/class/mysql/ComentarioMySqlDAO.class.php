<?php
/**
 * Class that operate on table 'comentario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
class ComentarioMySqlDAO implements ComentarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ComentarioMySql 
	 */
	public function load($recintoIdRecinto, $usuarioIdUsuario){
		$sql = 'SELECT * FROM comentario WHERE Recinto_idRecinto = ?  AND Usuario_idUsuario = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($recintoIdRecinto);
		$sqlQuery->setNumber($usuarioIdUsuario);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM comentario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM comentario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param comentario primary key
 	 */
	public function delete($recintoIdRecinto, $usuarioIdUsuario){
		$sql = 'DELETE FROM comentario WHERE Recinto_idRecinto = ?  AND Usuario_idUsuario = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($recintoIdRecinto);
		$sqlQuery->setNumber($usuarioIdUsuario);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComentarioMySql comentario
 	 */
	public function insert($comentario){
		$sql = 'INSERT INTO comentario (asunto, contenido, fecha, hora, Recinto_idRecinto, Usuario_idUsuario) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($comentario->asunto);
		$sqlQuery->set($comentario->contenido);
		$sqlQuery->set($comentario->fecha);
		$sqlQuery->set($comentario->hora);

		
		$sqlQuery->setNumber($comentario->recintoIdRecinto);

		$sqlQuery->setNumber($comentario->usuarioIdUsuario);

		$this->executeInsert($sqlQuery);	
		//$comentario->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComentarioMySql comentario
 	 */
	public function update($comentario){
		$sql = 'UPDATE comentario SET asunto = ?, contenido = ?, fecha = ?, hora = ? WHERE Recinto_idRecinto = ?  AND Usuario_idUsuario = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($comentario->asunto);
		$sqlQuery->set($comentario->contenido);
		$sqlQuery->set($comentario->fecha);
		$sqlQuery->set($comentario->hora);

		
		$sqlQuery->setNumber($comentario->recintoIdRecinto);

		$sqlQuery->setNumber($comentario->usuarioIdUsuario);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM comentario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAsunto($value){
		$sql = 'SELECT * FROM comentario WHERE asunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContenido($value){
		$sql = 'SELECT * FROM comentario WHERE contenido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM comentario WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHora($value){
		$sql = 'SELECT * FROM comentario WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAsunto($value){
		$sql = 'DELETE FROM comentario WHERE asunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContenido($value){
		$sql = 'DELETE FROM comentario WHERE contenido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM comentario WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHora($value){
		$sql = 'DELETE FROM comentario WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ComentarioMySql 
	 */
	protected function readRow($row){
		$comentario = new Comentario();
		
		$comentario->recintoIdRecinto = $row['Recinto_idRecinto'];
		$comentario->usuarioIdUsuario = $row['Usuario_idUsuario'];
		$comentario->asunto = $row['asunto'];
		$comentario->contenido = $row['contenido'];
		$comentario->fecha = $row['fecha'];
		$comentario->hora = $row['hora'];

		return $comentario;
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
	 * @return ComentarioMySql 
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