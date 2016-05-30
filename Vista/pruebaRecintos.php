<?php
include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');

$jefeRecinto = controlRecintos::obtenerInstancia();
$id=1;
$vectorRecintos = $jefeRecinto->leerRecinto($id);
?>

<html>
<head>
	<title>Probando</title>
</head>
<body>


	<h1>Leer recinto que esta en el sistema</h1>

	<?php
	foreach ($vectorRecintos as $Recinto) {
		echo "Nombre: ".$Recinto->getNombre();?>
		<br/>
		<?php
		echo "Direccion: ".$Recinto->getDireccion();
	}
	?>

	<br/>
	<h1>Ingresar recinto al sistema</h1>
	<form action="registrarRecinto.php" method="post">
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
				<th><label for="tipo">Tipo: </label></th>
				<th><input type="text" name="tipo" id="tipo"/><br/></th>
			</tr>
			<tr>
				<th><label for="superficie">Superficie: </label></th>
				<th><input type="text" name="superficie" id="superficie"/><br/></th>
			</tr>
			<tr>
				<th><label for="precio">Precio: </label></th>
				<th><input type="text" name="precio" id="precio"/><br/></th>
			</tr>
			<tr>
				<th><label for="direccion">Direccion: </label></th>
				<th><input type="text" name="direccion" id="direccion"/><br/></th>
			</tr>
			<tr>
				<th><label for="horario">Horario: </label></th>
				<th><input type="text" name="horario" id="horario"/><br/></th>
			</tr>
			<tr>
				<th><label for="ruta">Ruta Fotografia: </label></th>
				<th><input type="text" name="ruta" id="ruta"/><br/></th>
			</tr>
			<tr>
				<th><label for="canchas">Canchas: </label></th>
				<th><input type="text" name="canchas" id="canchas"/><br/></th>
			</tr>
			<tr>
				<th><label for="puntuacion">Puntuacion: </label></th>
				<th><input type="text" name="puntuacion" id="puntuacion"/><br/></th>
			</tr>
			<tr>
				<th><label for="fono">Telefono: </label></th>
				<th><input type="text" name="fono" id="fono"/><br/></th>
			</tr>
			<tr>
				<th><label for="estado">ID Estado: </label></th>
				<th><input type="text" name="estado" id="estado"/><br/></th>
			</tr>
		</table>
		<input type="submit" value="Aceptar">
	</form>

	<br/>

	<h1>Modificar un recinto</h1>

	<?php 
	$jefeRecinto2 = controlRecintos::obtenerInstancia();
	$id=1;
	$vectorRecintos = $jefeRecinto2->buscaRecinto($id);
	?>

		<form action="actualizarRecinto.php" method="post">
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
				<th><label for="tipo">Tipo: </label></th>
				<th><input type="text" name="tipo" id="tipo"/><br/></th>
			</tr>
			<tr>
				<th><label for="superficie">Superficie: </label></th>
				<th><input type="text" name="superficie" id="superficie"/><br/></th>
			</tr>
			<tr>
				<th><label for="precio">Precio: </label></th>
				<th><input type="text" name="precio" id="precio"/><br/></th>
			</tr>
			<tr>
				<th><label for="direccion">Direccion: </label></th>
				<th><input type="text" name="direccion" id="direccion"/><br/></th>
			</tr>
			<tr>
				<th><label for="horario">Horario: </label></th>
				<th><input type="text" name="horario" id="horario"/><br/></th>
			</tr>
			<tr>
				<th><label for="ruta">Ruta Fotografia: </label></th>
				<th><input type="text" name="ruta" id="ruta"/><br/></th>
			</tr>
			<tr>
				<th><label for="canchas">Canchas: </label></th>
				<th><input type="text" name="canchas" id="canchas"/><br/></th>
			</tr>
			<tr>
				<th><label for="puntuacion">Puntuacion: </label></th>
				<th><input type="text" name="puntuacion" id="puntuacion"/><br/></th>
			</tr>
			<tr>
				<th><label for="fono">Telefono: </label></th>
				<th><input type="text" name="fono" id="fono"/><br/></th>
			</tr>
			<tr>
				<th><label for="estado">ID Estado: </label></th>
				<th><input type="text" name="estado" id="estado"/><br/></th>
			</tr>
		</table>
		<input type="submit" value="Aceptar">
	</form>

	<h1>Listar todos los Recintos</h1>

	<?php 
	$jefeRecinto3 = controlRecintos::obtenerInstancia();
	$vectorRecintos = $jefeRecinto3->obtenerRecintos();
	?>
	<table>
		<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>TIPO</th>
		<th>SUPERFICIE</th>
		<th>PRECIO</th>
		<th>DIRECCION</th>
		<th>HORARIO</th>
		<th>FOTO</th>
		<th>CANTIDAD CANCHAS</th>
		<th>PUNTUACION</th>
		<th>TELEFONO</th>
		<th>ESTADO</th>
		</tr>
		<?php
		foreach ($vectorRecintos as $Recinto) {
			?>
			<tr>
			<th><?php echo $Recinto->getIdRecinto()?></th>
			<th><?php echo $Recinto->getNombre()?></th>
			<th><?php echo $Recinto->getTipo()?></th>
			<th><?php echo $Recinto->getSuperficie()?></th>
			<th><?php echo $Recinto->getPrecio()?></th>
			<th><?php echo $Recinto->getDireccion()?></th>
			<th><?php echo $Recinto->getHorario()?></th>
			<th><?php echo $Recinto->getRutaFotografia()?></th>
			<th><?php echo $Recinto->getCantidadCanchas()?></th>
			<th><?php echo $Recinto->getPuntuacion()?></th>
			<th><?php echo $Recinto->getTelefono()?></th>
			<th><?php echo $Recinto->getIdEstado()?></th>
		</tr>
			<?php
	}
	?>
	</table>






</body>
</html>