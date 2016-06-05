<?php

include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');
$jefeRecinto = controlRecintos::obtenerInstancia();
$idRecinto = $_POST['idRecinto'];
$vectorRecinto= $jefeRecinto->leerRecinto($idRecinto);

?>

<html>
<head>
	<title>Prueba Leer Recinto</title>
</head>
<body>
	
	

	

	<?php
	foreach ($vectorRecinto as $Recinto) {

	?>
	<h1>Prueba de lectura: Recinto <?php echo $Recinto->getIdRecinto();?></h1>
	<table>
			<tr>
				<th><label for="id">ID: </label></th>
				<th><?php echo $Recinto->getIdRecinto();?></th>
			</tr>
			<tr>
				<th><label for="nombre">Nombre: </label></th>
				<th><?php echo $Recinto->getNombre();?></th>
			</tr>
			<tr>
				<th><label for="tipo">Tipo: </label></th>
				<th><?php echo $Recinto->getTipo();?></th>
			</tr>
			<tr>
				<th><label for="superficie">Superficie: </label></th>
				<th><?php echo $Recinto->getSuperficie();?></th>
			</tr>
			<tr>
				<th><label for="precio">Precio: </label></th>
				<th><?php echo $Recinto->getPrecio();?></th>
			</tr>
			<tr>
				<th><label for="direccion">Direccion: </label></th>
				<th><?php echo $Recinto->getDireccion();?></th>
			</tr>
			<tr>
				<th><label for="horario">Horario: </label></th>
				<th><?php echo $Recinto->getHorario();?></th>
			</tr>
			<tr>
				<th><label for="ruta">Ruta Fotografia: </label></th>
				<th><?php echo $Recinto->getRutaFotografia();?></th>
			</tr>
			<tr>
				<th><label for="canchas">Canchas: </label></th>
				<th><?php echo $Recinto->getCantidadCanchas();?></th>
			</tr>
			<tr>
				<th><label for="puntuacion">Puntuacion: </label></th>
				<th><?php echo $Recinto->getPuntuacion();?></th>
			</tr>
			<tr>
				<th><label for="fono">Telefono: </label></th>
				<th><?php echo $Recinto->getTelefono();?></th>
			</tr>
			<tr>
				<th><label for="estado">ID Estado: </label></th>
				<th><?php echo $Recinto->getIdEstado();?></th>
			</tr>
		</table>
		<?php 
		}
	?>
</body>
</html>