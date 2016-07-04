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

	public function leerUsuario($idUsuario){
		$vectorData = $this->persistenciaUsuario->leerUsuario($idUsuario);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

		public function obtenerUsuarios(){
		$vectorData = $this->persistenciaUsuario->leerUsuarios();
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarUsuario($usuario){
		$this->persistenciaUsuario->actualizarUsuario($usuario);
	}

	public function buscarUsuario($idUsuario){
		$vectorData = $this->persistenciaUsuario->buscarUsuario($idUsuario);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function guardarImagen($idUsuario, $nombreFoto){
		$vectorData=$this->persistenciaUsuario->guardarImagen($idUsuario, $nombreFoto);
		if (count($vectorData)==0)
			return null;
		return $vectorData;
	}

	public function contarJugadores(){
		$vectorData = $this->persistenciaUsuario->leerUsuarios();
		return count($vectorData);
	}

	public function habilitarJugador($idJugador){
		$this->persistenciaUsuario->habilitarJugador($idJugador);
	}

	public function inhabilitarJugador($idJugador){
		$this->persistenciaUsuario->inhabilitarJugador($idJugador);
	}
	public function comprobarJugador($correo, $password){
		$vectorData= $this->persistenciaUsuario->comprobarJugador($correo, $password);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}

	public function actualizarPerfil($usuario){
		$this->persistenciaUsuario->actualizarPerfil($usuario);
	}

	public function obtenerNombre($idUsuario){
		$nombreUsuario = $this->persistenciaUsuario->obtenerNombre($idUsuario);
		return $nombreUsuario;
	}


	
}


?>