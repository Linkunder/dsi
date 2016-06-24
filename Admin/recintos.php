<?php include('header.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Control de recintos
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Recintos
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Superficie</th>
                                        <th>Dirección</th>
                                        <th>Horario</th>
                                        <th>Teléfono</th>
                                        <th>Estado actual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include_once('../TO/Recinto.php');
                                        include_once('../Logica/controlRecintos.php');
                                        $jefeRecinto = controlRecintos::obtenerInstancia();
                                        $recintos = $jefeRecinto->obtenerRecintos();
                                        foreach ($recintos as $key) {
                                        ?>
                                    <tr>
                                        <td><?php echo $key->getNombre();?></td>
                                        <td><?php echo $key->getTipo();?></td>
                                        <td><?php echo $key->getSuperficie();?></td>
                                        <td><?php echo $key->getDireccion();?></td>
                                        <td><?php echo $key->getHorario();?></td>
                                        <td><?php echo $key->getTelefono();?></td>
                                        <td><?php echo $key->getIdEstado();?></td>
                                    </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include('footer.php') ?>
