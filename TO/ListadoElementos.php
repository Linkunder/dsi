<?php

class ListadoElementos{
	private $idRecinto;
	private $idElemento;
	private $cantidad;

	function __construct(){}

	function getIdRecinto(){
		return $this->idRecinto;
	}

	function getIdElemento()){
		return $this->idElemento;
	}

	function getCantidad(){
		return $this->cantidad;
	}

	function setIdRecinto($idRecinto){
		$this->idRecinto = $idRecinto;
	}

	function setIdElemento($idElemento){
		$this->idElemento = $idElemento;
	}

	function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}
}
?>