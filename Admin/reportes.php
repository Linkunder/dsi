<?php include('header.php') ?>
                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
    $(function () {
        $('#container1').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Jugadores del sistema por genero'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox', 45.0],
                ['IE', 26.8],
                ['CHROME',12.8],
                ['Safari', 8.5],
                ['Opera', 6.2],
                ['Others', 0.7]
            ]
        }]
    });//Fin grafico hombre/mujer
          $('#container2').highcharts({
               chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Jugadores del sistema por genero'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox', 45.0],
                ['IE', 26.8],
                ['CHROME',12.8],
                ['Safari', 8.5],
                ['Opera', 6.2],
                ['Others', 0.7]
            ]
        }]
    });

  });
    </script>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Inicio</a>
                    </li>
                    <li class="active">
                        <a href="reportes.php"><i class="fa fa-fw fa-bar-chart-o"></i> Reportes</a>
                    </li>
                    <li>
                        <a href="gestionRecintos.php"><i class="fa fa-fw fa-futbol-o"></i> Recintos</a>
                    </li>
                    <li>
                        <a href="gestionJugadores.php"><i class="fa fa-fw fa-users"></i> Jugadores</a>
                    </li>
                    <li>
                        <a href="gestionComentarios.php"><i class="fa fa-fw fa-comments"></i> Comentarios</a>
                    </li>
                    <li><hr/>
                        <a href="cerrarSesion.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                    </li> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Reportes
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Reportes
                            </li>
                        </ol>
                    </div>
                </div>
                                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Reportes gráficos</h2>
                        <p class="lead">
                            En esta sección se encontrarán reportes gráficos de los recintos, jugadores, partidos y comentarios del sistema.
                        </p>
                    </div>
                </div>
                <!-- /.row -->
                <!--Pagina-->
                <!--Jugadores-->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse">Jugadores</a>
                            </h4>
                        </div>
                    <div id="collapse" class="panel-collapse collapse">
                        <!--Primer grafico-->
                        <div id="container1" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        
                        <!--Primer grafico-->
                    <div class="panel-footer">Footer</div>
                    </div>
                    </div>
                </div>
            <!--Jugadores-->

            <!--Recintos-->
                            <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">Recintos</a>
                            </h4>
                        </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <!--Primer grafico-->
                        <div id="container2" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        
                        <!--Primer grafico-->
                    <div class="panel-footer">Footer</div>
                    </div>
                    </div>
                </div>
            <!--Recintos-->

                            <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2">Jugadores</a>
                            </h4>
                        </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <!--Primer grafico-->
                        <div id="container1" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        
                        <!--Primer grafico-->
                    <div class="panel-footer">Footer</div>
                    </div>
                    </div>
                </div>
                    <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse3">Partidos</a>
                            </h4>
                        </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <!--Primer grafico-->
                        <div id="container1" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        
                        <!--Primer grafico-->
                    <div class="panel-footer">Footer</div>
                    </div>
                    </div>
                </div>
                                    <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse4">Comentarios</a>
                            </h4>
                        </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <!--Primer grafico-->
                        <div id="container1" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        
                        <!--Primer grafico-->
                    <div class="panel-footer">Footer</div>
                    </div>
                    </div>
                </div>
 <!--Pagina-->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include('footer.php') ?>


    <script src="Highcharts/js/highcharts.js"></script>
    <script src="Highcharts/js/modules/exporting.js"></script>

    

