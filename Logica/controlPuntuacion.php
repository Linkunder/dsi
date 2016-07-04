<?php

include_once('../Persistencia/DAOPuntuacion.php');

class controlPuntuacion{

	private static $instancia;
	private $persistenciaPuntuacion;

	private function __construct(){
		$this->persistenciaPuntuacion = new DAOPuntuacion();
	}
	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function comprobarPuntuacion($idUsuario,$idRecinto){
		$vectorData = $this->persistenciaPuntuacion->comprobarPuntuacion($idUsuario, $idRecinto);
		return $vectorData;
	}

	public function crearPuntuacion($idUsuario, $idRecinto, $puntuacion){
		$this->persistenciaPuntuacion->crearPuntuacion($idUsuario, $idRecinto, $puntuacion);
	}

	public function calcularPuntuacionRecinto($idRecinto){
		$puntuacion = $this->persistenciaPuntuacion->calcularPuntuacionRecinto($idRecinto);
		return $puntuacion; 
	}
	public function valoracionUsuario($idUsuario, $idRecinto){
		$puntuacion = $this->persistenciaPuntuacion->valoracionUsuario($idUsuario,$idRecinto);
		return $puntuacion;
	}



}
?>