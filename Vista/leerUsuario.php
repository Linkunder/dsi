<?php

include_once('../TO/Usuario.php');
include_once('../Logica/controlUsuarios.php');
$jefeUsuario = controlUsuarios::obtenerInstancia();
$idUsuario = $_POST['idUsuario'];
$vectorUsuario = $jefeUsuario->leerUsuario($idUsuario);

?>

<html>
<head>
	<title>Prueba Leer Usuario</title>
</head>
<body>
	
	

	

	<?php
	foreach ($vectorUsuario as $Usuario) {

	?>
	<h1>Prueba de lectura: Usuario <?php echo $Usuario->getIdUsuario();?></h1>
	<table>
			<tr>
				<th><label for="id">ID: </label></th>
				<th><?php echo $Usuario->getIdUsuario();?></th>
			</tr>
			<tr>
				<th><label for="nombre">Nombre: </label></th>
				<th><?php echo $Usuario->getNombre();?><br/></th>
			</tr>
			<tr>
				<th><label for="apellido">Apellido: </label></th>
				<th><?php echo $Usuario->getApellido();?><br/></th>
			</tr>
			<tr>
				<th><label for="nick">Nickname: </label></th>
				<th><?php echo $Usuario->getNickname();?><br/></th>
			</tr>
			<tr>
				<th><label for="mail">Email: </label></th>
				<th><?php echo $Usuario->getEmail();?><br/></th>
			</tr>
			<tr>
				<th><label for="fecha">Fecha de Nacimiento: </label></th>
				<th><?php echo $Usuario->getFechaNacimiento();?><br/></th>
			</tr>
			<tr>
				<th><label for="sexo">Sexo: </label></th>
				<th><?php echo $Usuario->getSexo();?><br/></th>
			</tr>
			<tr>
				<th><label for="ruta">Ruta Fotografia: </label></th>
				<th><?php echo $Usuario->getRutaFotografia();?><br/></th>
			</tr>
			<tr>
				<th><label for="fono">Telefono: </label></th>
				<th><?php echo $Usuario->getTelefono();?><br/></th>
			</tr>
			<tr>
				<th><label for="estado">ID Estado: </label></th>
				<th><?php echo $Usuario->getIdEstado();?><br/></th>
			</tr>
			<tr>
				<th><label for="perfil">ID Perfil: </label></th>
				<th><?php echo $Usuario->getIdPerfil();?></th>
			</tr>
		</table>
		<?php 
		}
	?>
</body>
</html>