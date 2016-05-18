<?php

class CategoriaRecinto{
	private $idCategoria;
	private $idRecinto;

	function __construct(){}

	function getIdCategoria(){
		return $this->idCategoria;
	}

	function getIdRecinto(){
		return $this->idRecinto;
	}

	function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria;
	}

	function setIdRecinto($idRecinto){
		$this->idRecinto = $idRecinto,
	}
}
?>