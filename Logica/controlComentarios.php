<?php

include_once('../Persistencia/DAOComentario.php');

class controlComentarios{

	private static $instancia;
	private $persistenciaComentario;

	private function __construct(){
		$this->persistenciaComentario = new DAOComentario();
	}

	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function crearComentario($comentario){
		$this->persistenciaComentario->crearComentario($comentario);
	}

	public function actualizarComentario($comentario){
		$this->persistenciaComentario->actualizarComentario($comentario);
	}
	public function leerComentario($idComentario){
		$vectorData= $this->persistenciaComentario->buscarComentario($idComentario);
		if (count($vectorData)==0) return null;
		return $vectorData;
	}
	public function leerComentarios(){
		$vectorData = $this->persistenciaComentario->listarComentarios();
			if (count($vectorData)==0) return null;
		return $vectorData;

	}

	public function contarComentarios(){
		$vectorData = $this->persistenciaComentario->listarComentarios();
		return count($vectorData);
	}
}

?>