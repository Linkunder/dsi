<?php

class EstadoPartido{
	private $idEstadoPartido;
	private $nombre;
	private $descripcion;

	function __construct(){}

	function getIdEstadoPartido(){
		return $this->idEstadoPartido;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function setIdEstadoPartido($idEstadoPartido){
		$this->idEstadoPartido = $idEstadoPartido;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
}
?>