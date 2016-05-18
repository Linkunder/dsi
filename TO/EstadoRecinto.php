<?php

class EstadoRecinto{
	private $idEstadoRecinto;
	private $nombre;
	private $descripcion;

	function __construct(){}

	function getIdEstadoRecinto(){
		return $this->idEstadoRecinto;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function setIdEstadoRecinto($idEstadoRecinto){
		$this->idEstadoRecinto = $idEstadoRecinto;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
}
?>