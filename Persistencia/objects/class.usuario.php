<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `usuario` (
	`usuarioid` int(11) NOT NULL auto_increment,
	`idusuario` INT NOT NULL,
	`nombre` VARCHAR(255) NOT NULL,
	`apellido` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`fechanacimiento` DATE NOT NULL,
	`sexo` VARCHAR(255) NOT NULL,
	`rutafotografia` VARCHAR(255) NOT NULL,
	`telefono` INT NOT NULL,
	`estadojugador_idestadojugador` INT NOT NULL,
	`perfil_idperfil` INT NOT NULL, PRIMARY KEY  (`usuarioid`)) ENGINE=MyISAM;
*/

/**
* <b>usuario</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.2 / PHP5.1
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5.1&wrapper=pog&objectName=usuario&attributeList=array+%28%0A++0+%3D%3E+%27idUsuario%27%2C%0A++1+%3D%3E+%27nombre%27%2C%0A++2+%3D%3E+%27apellido%27%2C%0A++3+%3D%3E+%27email%27%2C%0A++4+%3D%3E+%27fechaNacimiento%27%2C%0A++5+%3D%3E+%27sexo%27%2C%0A++6+%3D%3E+%27rutaFotografia%27%2C%0A++7+%3D%3E+%27telefono%27%2C%0A++8+%3D%3E+%27EstadoJugador_idEstadoJugador%27%2C%0A++9+%3D%3E+%27Perfil_idPerfil%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27DATE%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27INT%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class usuario extends POG_Base
{
	public $usuarioId = '';

	/**
	 * @var INT
	 */
	public $idUsuario;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $nombre;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $apellido;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $email;
	
	/**
	 * @var DATE
	 */
	public $fechaNacimiento;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $sexo;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $rutaFotografia;
	
	/**
	 * @var INT
	 */
	public $telefono;
	
	/**
	 * @var INT
	 */
	public $EstadoJugador_idEstadoJugador;
	
	/**
	 * @var INT
	 */
	public $Perfil_idPerfil;
	
	public $pog_attribute_type = array(
		"usuarioId" => array('db_attributes' => array("NUMERIC", "INT")),
		"idUsuario" => array('db_attributes' => array("NUMERIC", "INT")),
		"nombre" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"apellido" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fechaNacimiento" => array('db_attributes' => array("NUMERIC", "DATE")),
		"sexo" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"rutaFotografia" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"telefono" => array('db_attributes' => array("NUMERIC", "INT")),
		"EstadoJugador_idEstadoJugador" => array('db_attributes' => array("NUMERIC", "INT")),
		"Perfil_idPerfil" => array('db_attributes' => array("NUMERIC", "INT")),
		);
	public $pog_query;
	
	
	/**
	* Getter for some private attributes
	* @return mixed $attribute
	*/
	public function __get($attribute)
	{
		if (isset($this->{"_".$attribute}))
		{
			return $this->{"_".$attribute};
		}
		else
		{
			return false;
		}
	}
	
	function usuario($idUsuario='', $nombre='', $apellido='', $email='', $fechaNacimiento='', $sexo='', $rutaFotografia='', $telefono='', $EstadoJugador_idEstadoJugador='', $Perfil_idPerfil='')
	{
		$this->idUsuario = $idUsuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->sexo = $sexo;
		$this->rutaFotografia = $rutaFotografia;
		$this->telefono = $telefono;
		$this->EstadoJugador_idEstadoJugador = $EstadoJugador_idEstadoJugador;
		$this->Perfil_idPerfil = $Perfil_idPerfil;
	}
	
	
	/**
	* Gets object from database
	* @param integer $usuarioId 
	* @return object $usuario
	*/
	function Get($usuarioId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `usuario` where `usuarioid`='".intval($usuarioId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->usuarioId = $row['usuarioid'];
			$this->idUsuario = $this->Unescape($row['idusuario']);
			$this->nombre = $this->Unescape($row['nombre']);
			$this->apellido = $this->Unescape($row['apellido']);
			$this->email = $this->Unescape($row['email']);
			$this->fechaNacimiento = $row['fechanacimiento'];
			$this->sexo = $this->Unescape($row['sexo']);
			$this->rutaFotografia = $this->Unescape($row['rutafotografia']);
			$this->telefono = $this->Unescape($row['telefono']);
			$this->EstadoJugador_idEstadoJugador = $this->Unescape($row['estadojugador_idestadojugador']);
			$this->Perfil_idPerfil = $this->Unescape($row['perfil_idperfil']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $usuarioList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `usuario` ";
		$usuarioList = Array();
		if (sizeof($fcv_array) > 0)
		{
			$this->pog_query .= " where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$this->pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) != 1)
					{
						$this->pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						if ($GLOBALS['configuration']['db_encoding'] == 1)
						{
							$value = POG_Base::IsColumn($fcv_array[$i][2]) ? "BASE64_DECODE(".$fcv_array[$i][2].")" : "'".$fcv_array[$i][2]."'";
							$this->pog_query .= "BASE64_DECODE(`".$fcv_array[$i][0]."`) ".$fcv_array[$i][1]." ".$value;
						}
						else
						{
							$value =  POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$this->Escape($fcv_array[$i][2])."'";
							$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
						}
					}
					else
					{
						$value = POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$fcv_array[$i][2]."'";
						$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
					}
				}
			}
		}
		if ($sortBy != '')
		{
			if (isset($this->pog_attribute_type[$sortBy]['db_attributes']) && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'SET')
			{
				if ($GLOBALS['configuration']['db_encoding'] == 1)
				{
					$sortBy = "BASE64_DECODE($sortBy) ";
				}
				else
				{
					$sortBy = "$sortBy ";
				}
			}
			else
			{
				$sortBy = "$sortBy ";
			}
		}
		else
		{
			$sortBy = "usuarioid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$usuario = new $thisObjectName();
			$usuario->usuarioId = $row['usuarioid'];
			$usuario->idUsuario = $this->Unescape($row['idusuario']);
			$usuario->nombre = $this->Unescape($row['nombre']);
			$usuario->apellido = $this->Unescape($row['apellido']);
			$usuario->email = $this->Unescape($row['email']);
			$usuario->fechaNacimiento = $row['fechanacimiento'];
			$usuario->sexo = $this->Unescape($row['sexo']);
			$usuario->rutaFotografia = $this->Unescape($row['rutafotografia']);
			$usuario->telefono = $this->Unescape($row['telefono']);
			$usuario->EstadoJugador_idEstadoJugador = $this->Unescape($row['estadojugador_idestadojugador']);
			$usuario->Perfil_idPerfil = $this->Unescape($row['perfil_idperfil']);
			$usuarioList[] = $usuario;
		}
		return $usuarioList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $usuarioId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$rows = 0;
		if ($this->usuarioId!=''){
			$this->pog_query = "select `usuarioid` from `usuario` where `usuarioid`='".$this->usuarioId."' LIMIT 1";
			$rows = Database::Query($this->pog_query, $connection);
		}
		if ($rows > 0)
		{
			$this->pog_query = "update `usuario` set 
			`idusuario`='".$this->Escape($this->idUsuario)."', 
			`nombre`='".$this->Escape($this->nombre)."', 
			`apellido`='".$this->Escape($this->apellido)."', 
			`email`='".$this->Escape($this->email)."', 
			`fechanacimiento`='".$this->fechaNacimiento."', 
			`sexo`='".$this->Escape($this->sexo)."', 
			`rutafotografia`='".$this->Escape($this->rutaFotografia)."', 
			`telefono`='".$this->Escape($this->telefono)."', 
			`estadojugador_idestadojugador`='".$this->Escape($this->EstadoJugador_idEstadoJugador)."', 
			`perfil_idperfil`='".$this->Escape($this->Perfil_idPerfil)."' where `usuarioid`='".$this->usuarioId."'";
		}
		else
		{
			$this->pog_query = "insert into `usuario` (`idusuario`, `nombre`, `apellido`, `email`, `fechanacimiento`, `sexo`, `rutafotografia`, `telefono`, `estadojugador_idestadojugador`, `perfil_idperfil` ) values (
			'".$this->Escape($this->idUsuario)."', 
			'".$this->Escape($this->nombre)."', 
			'".$this->Escape($this->apellido)."', 
			'".$this->Escape($this->email)."', 
			'".$this->fechaNacimiento."', 
			'".$this->Escape($this->sexo)."', 
			'".$this->Escape($this->rutaFotografia)."', 
			'".$this->Escape($this->telefono)."', 
			'".$this->Escape($this->EstadoJugador_idEstadoJugador)."', 
			'".$this->Escape($this->Perfil_idPerfil)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->usuarioId == "")
		{
			$this->usuarioId = $insertId;
		}
		return $this->usuarioId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $usuarioId
	*/
	function SaveNew()
	{
		$this->usuarioId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `usuario` where `usuarioid`='".$this->usuarioId."'";
		return Database::NonQuery($this->pog_query, $connection);
	}
	
	
	/**
	* Deletes a list of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param bool $deep 
	* @return 
	*/
	function DeleteList($fcv_array)
	{
		if (sizeof($fcv_array) > 0)
		{
			$connection = Database::Connect();
			$pog_query = "delete from `usuario` where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) !== 1)
					{
						$pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$this->Escape($fcv_array[$i][2])."'";
					}
					else
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$fcv_array[$i][2]."'";
					}
				}
			}
			return Database::NonQuery($pog_query, $connection);
		}
	}
}
?>