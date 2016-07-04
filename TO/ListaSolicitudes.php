<?php

class ListaSolicitudes{
	private $idPartido;
	private $idUsuario;
	private $idEstado;

	function __construct(){}

	function getIdEstado(){
		return $this->idEstado;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getIdPartido(){
		return $this->idPartido;
	}

	function setIdEstado($idEstado){
		$this->idEstado= $idEstado;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function setIdPartido($idPartido){
		$this->idPartido = $idPartido;
	}
}
?>