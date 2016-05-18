<?php

class TercerTiempo{
	private $idTercerTiempo;
	private $descripcion;
	private $hora;
	private $idLocal;

	function __construct(){}

	function getIdTercerTiempo(){
		return $this->idTercerTiempo;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function getHora(){
		return $this->hora;
	}

	function getIdLocal(){
		return $this->idLocal;
	}

	function setIdTercerTiempo($idTercerTiempo){
		$this->idTercerTiempo = $idTercerTiempo;
	}

	function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	function setHora($hora){
		$this->hora = $hora;
	}

	function setIdLocal($idLocal){
		$this->idLocal = $idLocal;
	}

}
?>