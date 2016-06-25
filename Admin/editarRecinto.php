<?php 

include('header.php');
include_once('../TO/Recinto.php');
include_once('../Logica/controlRecintos.php');
$idRecinto = $_GET['idRecinto'];
$jefeRecinto = controlRecintos::obtenerInstancia();
$recinto = $jefeRecinto->leerRecinto($idRecinto);




?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gestión de recintos
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li>
                                <i class="fa fa-edit"></i> <a href="gestionRecintos.php">Recintos</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>
                                Editar recinto "<?php
                                    foreach ($recinto as $key ) {
                                        echo $key->getNombre();
                                    }
                                    
                                ?>"
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="procesarRecinto.php" method="post">
                            <div class="table-responsive">
                                <table class="table table-form">
                                    <?php
                                    $_SESSION["idRecinto"] = $idRecinto;
                                    foreach ($recinto as $key ) {
                                    ?>
                                    <tr>
                                        <th>Recinto: </th>
                                        <td><input class="form-control" name="idRecinto" id="idRecinto" readonly="readonly" value="<?php echo $key->getIdRecinto();?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Nombre: </th>
                                        <td><input class="form-control" name="nombre" id="nombre" value="<?php echo $key->getNombre();?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Tipo: </th>
                                        <td><input class="form-control" name="tipo" id="tipo" value="<?php echo $key->getTipo();?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Superficie: </th>
                                        <td><input class="form-control" name="superficie" id="superficie" value="<?php echo $key->getSuperficie();?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Precio: </th>
                                        <td><input class="form-control" name="precio" id="precio" value="<?php echo $key->getPrecio();?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Dirección: </th>
                                        <td><input class="form-control" name="direccion" id="direccion" value="<?php echo $key->getDireccion();?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Horario: </th>
                                        <td><input class="form-control" name="horario" id="horario" value="<?php echo $key->getHorario();?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Canchas: </th>
                                        <td><input class="form-control" name="canchas" id="canchas" value="<?php echo $key->getCantidadCanchas();?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Telefono: </th>
                                        <td><input class="form-control" name="telefono" id="telefono" value="<?php echo $key->getTelefono();?>"></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            
                            <div class="col-lg-4">
                                 <button type="submit" class="btn btn-lg btn-primary">Actualizar <i class="fa fa-check fa-1x"></i></button>
                            </div>
                            <div class="col-lg-4">
                                <button type="reset" class="btn btn-lg btn-warning">Reiniciar <i class="fa fa-eraser fa-1x"></i></button>
                            </div>
                            



                        </form>
                        <div class="col-lg-4">
                                <a href="gestionRecintos.php"><button class="btn btn-lg btn-danger">Volver <i class="fa fa-arrow-left fa-1x"></i></button></a>
                            </div>

                    </div>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include('footer.php') ?>
