<?php

class Partido{
	private $idPartido;
	private $fecha;
	private $hora;
	private $cuota;
	private $idEstado;
	private $idRecinto;
	private $idTercerTiempo;
	private $idUsuario;

	function __construct(){}

	function getIdPartido(){
		return $this->idPartido;
	}

	function getFecha(){
		return $this->fecha;
	}

	function getHora(){
		return $this->hora;
	}

	function getCuota(){
		return $this->cuota;
	}

	function getIdEstado(){
		return $this->idEstado;
	}

	function getIdRecinto(){
		return $this->idRecinto;
	}

	function getIdTercerTiempo(){
		return $this->idTercerTiempo;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}



	function setFecha($fecha){
		$this->fecha = $fecha;
	}

	function setHora($hora){
		$this->hora = $hora;
	}

	function setCuota($cuota){
		$this->cuota = $cuota;
	}
	function setIdPartido($idPartido){
		$this->idPartido=$idPartido;
	}

	function setIdEstado($idEstado){
		$this->idEstado = $idEstado;
	}

	function setIdRecinto($idRecinto){
		$this->idRecinto = $idRecinto;
	}

	function setIdTercerTiempo($idTercerTiempo){
		$this->idTercerTiempo = $idTercerTiempo;
	}
	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}


}
?>