<?php

class Local{
	private $idLocal;
	private $nombre;
	private $descripcion;
	private $direccion;
	private $rutaFoto;
	private $linkMapa;

	function __construct(){}

	function getIdLocal(){
		return $this->idLocal;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function getDireccion(){
		return $this->direccion;
	}

	function getRutaFotografia(){
		return $this->rutaFoto;
	}

	function getLinkMapa(){
		return $this->linkMapa;
	}

	function setIdLocal($idLocal){
		$this->idLocal = $idLocal;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	function setRutaFotografia($rutaFoto){
		$this->rutaFoto = $rutaFoto;
	}

	function setLinkMapa($linkMapa){
		$this->linkMapa = $linkMapa;
	}

}
?>