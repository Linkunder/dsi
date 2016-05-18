<?php

class Comentario{
	private $idComentario;
	private $idRecinto;
	private $idUsuario;
	private $asunto;
	private $contenido;
	private $fecha;
	private $hora;

	function __construct(){}

	function getIdComentario(){
		return $this->idComentario;
	}

	function getIdRecinto(){
		return $this->idRecinto;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getAsunto(){
		return $this->asunto;
	}

	function getContenido(){
		return $this->contenido;
	}

	function getFecha(){
		return $this->fecha;
	}

	function getHora(){
		return $this->hora;
	}

	function setIdComentario($idComentario){
		$this->idComentario = $idComentario;
	}

	function setIdRecinto($idRecinto){
		$this->idRecinto = $idRecinto;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function setAsunto($asunto){
		$this->asunto = $asunto;
	}

	function setContenido($contenido){
		$this->contenido = $contenido;
	}

	function setFecha($fecha){
		$this->fecha = $fecha;
	}

	function setHora($hora){
		$this->hora = $hora;
	}

	
}
?>