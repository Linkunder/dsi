<?php
include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');

$jefeUsuario = controlUsuarios::obtenerInstancia();
$id=1;
$vectorUsuario = $jefeUsuario->leerUsuario($id);
?>

<html>
<head>
	<title>Probando</title>
</head>
<body>
	<h1>Leer jugador que esta en el sistema</h1>

	<?php
	foreach ($vectorUsuario as $Usuario) {
		echo "Nombre: ".$Usuario->getNombre();	
		echo "Mail: ".$Usuario->getEmail();
	}
	?>

	

	<br/>
	<h1>Ingresar jugador al sistema</h1>
	<form action="registrarUsuario.php" method="post">
		<label for="id">ID: </label>
		<input type="text" name="id" id="id"/><br/>
		<label for="nombre">Nombre: </label>
		<input type="text" name="nombre" id="nombre"/><br/>
		<label for="apellido">Apellido: </label>
		<input type="text" name="apellido" id="apellido"/><br/>
		<label for="nick">Nickname: </label>
		<input type="text" name="nick" id="nick"/><br/>
		<label for="mail">Email: </label>
		<input type="text" name="mail" id="mail"/><br/>
		<label for="fecha">Fecha de Nacimiento: </label>
		<input type="text" name="fecha" id="fecha"/><br/>
		<label for="sexo">Sexo: </label>
		<input type="text" name="sexo" id="sexo"/><br/>
		<label for="ruta">Ruta Fotografia: </label>
		<input type="text" name="ruta" id="ruta"/><br/>
		<label for="fono">Telefono: </label>
		<input type="text" name="fono" id="fono"/><br/>
		<label for="estado">ID Estado: </label>
		<input type="text" name="estado" id="estado"/><br/>
		<label for="perfil">ID Perfil: </label>
		<input type="text" name="perfil" id="perfil"/><br/>
		<input type="submit" value="Aceptar">
	</form>

	<br/>

	<h1>Modificar un jugador</h1>

		<form action="actualizarUsuario.php" method="post">
		<label for="id">ID: </label>
		<input type="text" name="id" id="id"/><br/>
		<label for="nombre">Nombre: </label>
		<input type="text" name="nombre" id="nombre"/><br/>
		<label for="apellido">Apellido: </label>
		<input type="text" name="apellido" id="apellido"/><br/>
		<label for="nick">Nickname: </label>
		<input type="text" name="nick" id="nick"/><br/>
		<label for="mail">Email: </label>
		<input type="text" name="mail" id="mail"/><br/>
		<label for="fecha">Fecha de Nacimiento: </label>
		<input type="text" name="fecha" id="fecha"/><br/>
		<label for="sexo">Sexo: </label>
		<input type="text" name="sexo" id="sexo"/><br/>
		<label for="ruta">Ruta Fotografia: </label>
		<input type="text" name="ruta" id="ruta"/><br/>
		<label for="fono">Telefono: </label>
		<input type="text" name="fono" id="fono"/><br/>
		<label for="estado">ID Estado: </label>
		<input type="text" name="estado" id="estado"/><br/>
		<label for="perfil">ID Perfil: </label>
		<input type="text" name="perfil" id="perfil"/><br/>
		<input type="submit" value="Aceptar">
	</form>


</body>
</html>