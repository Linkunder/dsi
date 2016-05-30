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
		echo "Nombre: ".$Usuario->getNombre();?>
		<br/>
		<?php
		echo "Mail: ".$Usuario->getEmail();
	}
	?>

	<br/>
	<h1>Ingresar jugador al sistema</h1>
	<form action="registrarUsuario.php" method="post">
		<table>
			<tr>
				<th><label for="id">ID: </label></th>
				<th><input type="text" name="id" id="id"/><br/></th>
			</tr>
			<tr>
				<th><label for="nombre">Nombre: </label></th>
				<th><input type="text" name="nombre" id="nombre"/><br/></th>
			</tr>
			<tr>
				<th><label for="apellido">Apellido: </label></th>
				<th><input type="text" name="apellido" id="apellido"/><br/></th>
			</tr>
			<tr>
				<th><label for="nick">Nickname: </label></th>
				<th><input type="text" name="nick" id="nick"/><br/></th>
			</tr>
			<tr>
				<th><label for="mail">Email: </label></th>
				<th><input type="text" name="mail" id="mail"/><br/></th>
			</tr>
			<tr>
				<th><label for="fecha">Fecha de Nacimiento: </label></th>
				<th><input type="text" name="fecha" id="fecha"/><br/></th>
			</tr>
			<tr>
				<th><label for="sexo">Sexo: </label></th>
				<th><input type="text" name="sexo" id="sexo"/><br/></th>
			</tr>
			<tr>
				<th><label for="ruta">Ruta Fotografia: </label></th>
				<th><input type="text" name="ruta" id="ruta"/><br/></th>
			</tr>
			<tr>
				<th><label for="fono">Telefono: </label></th>
				<th><input type="text" name="fono" id="fono"/><br/></th>
			</tr>
			<tr>
				<th><label for="estado">ID Estado: </label></th>
				<th><input type="text" name="estado" id="estado"/><br/></th>
			</tr>
			<tr>
				<th><label for="perfil">ID Perfil: </label></th>
				<th><input type="text" name="perfil" id="perfil"/><br/></th>
			</tr>
		</table>
		<input type="submit" value="Aceptar">
	</form>

	<br/>

	<h1>Modificar un jugador</h1>

	<?php 
	$jefeUsuario2 = controlUsuarios::obtenerInstancia();
	$id=1;
	$vectorUsuario = $jefeUsuario2->buscarUsuario($id);
	?>

		<form action="actualizarUsuario.php" method="post">
		<table>
			<tr>
				<th><label for="id">ID: </label></th>
				<th><input type="text" name="id" id="id"/><br/></th>
			</tr>
			<tr>
				<th><label for="nombre">Nombre: </label></th>
				<th><input type="text" name="nombre" id="nombre"/><br/></th>
			</tr>
			<tr>
				<th><label for="apellido">Apellido: </label></th>
				<th><input type="text" name="apellido" id="apellido"/><br/></th>
			</tr>
			<tr>
				<th><label for="nick">Nickname: </label></th>
				<th><input type="text" name="nick" id="nick"/><br/></th>
			</tr>
			<tr>
				<th><label for="mail">Email: </label></th>
				<th><input type="text" name="mail" id="mail"/><br/></th>
			</tr>
			<tr>
				<th><label for="fecha">Fecha de Nacimiento: </label></th>
				<th><input type="text" name="fecha" id="fecha"/><br/></th>
			</tr>
			<tr>
				<th><label for="sexo">Sexo: </label></th>
				<th><input type="text" name="sexo" id="sexo"/><br/></th>
			</tr>
			<tr>
				<th><label for="ruta">Ruta Fotografia: </label></th>
				<th><input type="text" name="ruta" id="ruta"/><br/></th>
			</tr>
			<tr>
				<th><label for="fono">Telefono: </label></th>
				<th><input type="text" name="fono" id="fono"/><br/></th>
			</tr>
			<tr>
				<th><label for="estado">ID Estado: </label></th>
				<th><input type="text" name="estado" id="estado"/><br/></th>
			</tr>
			<tr>
				<th><label for="perfil">ID Perfil: </label></th>
				<th><input type="text" name="perfil" id="perfil"/><br/></th>
			</tr>
		</table>
		<input type="submit" value="Aceptar">
	</form>

	<h1>Listar todos los usuarios</h1>

	<?php 
	$jefeUsuario3 = controlUsuarios::obtenerInstancia();
	$vectorUsuario = $jefeUsuario3->obtenerUsuarios();
	?>
	<table>
		<tr>
		<th>ID</th>
		<th>NICKNAME</th>
		<th>NOMBRE</th>
		<th>APELLIDO</th>
		<th>MAIL</th>
		<th>FECHA NACIMIENTO</th>
		</tr>
		<?php
		foreach ($vectorUsuario as $Usuario) {
			?>
			<tr>
			<th><?php echo $Usuario->getIdUsuario()?></th>
			<th><?php echo $Usuario->getNickname()?></th>
			<th><?php echo $Usuario->getNombre()?></th>
			<th><?php echo $Usuario->getApellido()?></th>
			<th><?php echo $Usuario->getEmail()?></th>
			<th><?php echo $Usuario->getFechaNacimiento()?></th>
		</tr>
			<?php
	}
	?>
	</table>






</body>
</html>