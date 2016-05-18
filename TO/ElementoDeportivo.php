<?php

class ElementoDeportivo{
	private $idElementoDeportivo;
	private $nombre;
	private $precio;

	function __construct(){}

	function getIdElementoDeportivo(){
		return $this->idElementoDeportivo;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getPrecio(){
		return $this->precio;
	}

	function setIdElementoDeportivo($idElementoDeportivo){
		$this->idElementoDeportivo = $idElementoDeportivo;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setPrecio($precio){
		$this->precio = $precio;
	}
}
?>