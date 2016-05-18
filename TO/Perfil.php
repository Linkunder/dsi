<?php

class Perfil{
	private $idPerfil;
	private $nombre;
	private $descripcion;

	function __construct(){}

	function getIdPerfil(){
		return $this->idPerfil;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function setIdPerfil($idPerfil){
		$this->idPerfil = $idPerfil;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
}
?>