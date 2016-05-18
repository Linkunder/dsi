<?php

include_once('../Persistencia/DAOUsuario.php');

class controlUsuarios{

	private static $instancia;
	private $persistenciaUsuario;

	private function __construct(){
		$this->persistenciaUsuario = new DAOUsuario();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearUsuario($usuario){
		$this->persistenciaUsuario->crearUsuario($usuario);
	}

}


?>