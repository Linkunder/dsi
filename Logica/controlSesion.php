<?php

include_once('controlUsuarios.php');
include_once('../TO/Usuario.php');

	session_start();
	//Obtenemos una instancia del control de usuarios
	$jefeUsuario = controlUsuarios::obtenerInstancia();
	
	//Traemos el email y la contraseña
	$email=$_POST["username"];
	$password=$_POST["password"];

	$usuario=$jefeUsuario->comprobarJugador($email,$password);

	var_dump(count($usuario));
	if(count($usuario)==1){


		echo "1";
	}else{
		echo "2";
	}


	










?>