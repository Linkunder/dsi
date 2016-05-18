<?php

class Equipo{
	private $idEquipo;
	private $color;
	private $idUsuario;
	private $idPartido;

	function __construct(){}

	function getIdEquipo(){
		return $this->idEquipo;
	}

	function getColor(){
		return $this->color;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getIdPartido(){
		return $this->idPartido;
	}

	function setIdEquipo($idEquipo){
		$this->idEquipo= $idEquipo;
	}

	function setColor($color){
		$this->color = $color;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function setIdPartido($idPartido){
		$this->idPartido = $idPartido;
	}
}
?>