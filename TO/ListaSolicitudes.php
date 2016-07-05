<?php

class ListaSolicitudes{
	private $idSolicitud;
	private $idPartido;
	private $idUsuario;
	private $idEstado;

	function __construct(){}

	function getIdSolicitud(){
		return $this->idSolicitud;
	}

	function getIdEstado(){
		return $this->idEstado;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getIdPartido(){
		return $this->idPartido;
	}

	function setIdSolicitud($idSolicitud){
		$this->idSolicitud = $idSolicitud;
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