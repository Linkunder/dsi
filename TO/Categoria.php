<?php

class Categoria{
	private $idCategoria;
	private $nombre;
	private $descripcion;

	function __construct(){}

	function getIdCategoria(){
		return $this->idCategoria;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
}
?>