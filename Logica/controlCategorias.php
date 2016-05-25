<?php
include_once('../Persistencia/DAOCategoria');

class controlCategorias{

	private static $instancia;
	private $persistenciaCategoria;

	private function __construct(){
		$this->persistenciaCategoria = new DAOCategoria();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}
	public function crearCategoria($categoria){
		$this->persistenciaCategoria->crearCategoria($categoria);
	}

	public function leerCategoria($idCategoria){
		$vectorData = $this->persistenciaCategoria->leerCategoria($idCategoria);
			if (count($vectorData)==0) return null;
		return $vectorData;
	}
	public function actualizarCategoria($categoria){
		$this->persistenciaCategoria->actualizarCategoria($categoria);
	}

}
?>