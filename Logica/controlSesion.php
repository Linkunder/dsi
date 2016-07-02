<?php

include_once('controlUsuarios.php');
include_once('../TO/Usuario.php');
	if(isset($_GET["tipo"])){
		if($_GET["tipo"] == "iniciar"){


	//Este session_start debe ir para que se vaya reiniciando cada vez que se inicie sesion
	session_start();
	//Obtenemos una instancia del control de usuarios
	$jefeUsuario = controlUsuarios::obtenerInstancia();
	
	//Traemos el email y la contraseña
	$email=$_POST["username"];
	$password=$_POST["password"];

	$usuario=$jefeUsuario->comprobarJugador($email,$password);

	//Si se encuentra al usuario y es jugador 
	$nuevoUsuario;
	if(count($usuario)==1){
			$nuevoUsuario = end($usuario);
	//Si es jugador
		if($nuevoUsuario->getIdPerfil() == 1){
			$_SESSION['user'] = $nuevoUsuario->getApellido();
			$_SESSION['idUsuario'] = $nuevoUsuario->getIdUsuario();
			$_SESSION['email'] = $nuevoUsuario->getEmail();
			$_SESSION['sesion'] = "jugador";

			//verificamos su estado
			if($nuevoUsuario->getIdEstado() == 1){
			//Jugador activo y sin penalizacion
			//Activamos la sesion y redirigimos al jugador
				$_SESSION['estado']="activo";
				//session_start();
				header("Location:../Vista/inicioJugador.php");
			}else{	
				//Jugador con penalizacion
				$_SESSION['estado']="penalizado";
				
				header("Location:../Vista/inicioJugador.php");
			}
		}else{
	//Es administrador
			$_SESSION['user'] = $nuevoUsuario->getApellido();
			$_SESSION['idUsuario'] = $nuevoUsuario->getIdUsuario();
			$_SESSION['email'] = $nuevoUsuario->getEmail();
			$_SESSION['sesion'] = "administrador";
			//Activamos la sesion y la refdirigimos al Administrador
			
			header("Location:../Admin/index.php");

		}

	}else{
	//Si la combinacion usuario contraseña no es correcta
		//Volvemos al index
		header("Location:../Vista/inicio.php?inicio=fallido");

	}
	}else{//fin iniciar
		//Aqui el cerrar sesion 
		session_start();
		session_destroy();
		header('Location:../Vista/inicio.php?inicio=salir');

	} 

} //if del tipo


	










?>