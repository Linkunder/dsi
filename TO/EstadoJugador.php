<?php

class EstadoJugador{
	private $idEstadoJugador;
	private $nombre;
	private $descripcion;

	function __construct(){}

	function getIdEstadoJugador(){
		return $this->idEstadoJugador;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function setIdEstadoJugador($idEstadoJugador){
		$this->idEstadoJugador = $idEstadoJugador;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
}
?>