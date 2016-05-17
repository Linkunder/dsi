<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-17 23:33
 */
interface ListadoelementosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Listadoelementos 
	 */
	public function load($recintoIdRecinto, $elementoDeportivoIdElementoDeportivo);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param listadoelemento primary key
 	 */
	public function delete($recintoIdRecinto, $elementoDeportivoIdElementoDeportivo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Listadoelementos listadoelemento
 	 */
	public function insert($listadoelemento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Listadoelementos listadoelemento
 	 */
	public function update($listadoelemento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCantidad($value);


	public function deleteByCantidad($value);


}
?>