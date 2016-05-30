<?php

class Local{
	private $idLocal;
	private $nombre;
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

	function getDireccion(){
		return $this->direccion;
	}

	function getRutaFoto(){
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

	function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	function setRutaFoto($rutaFoto){
		$this->rutaFoto = $rutaFoto;
	}

	function setLinkMapa($linkMapa){
		$this->linkMapa = $linkMapa;
	}

}
?>