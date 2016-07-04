<?php include('header.php');
    include_once('../Logica/controlGraficos.php');
    $jefeGrafico = controlGraficos::obtenerInstancia();
?>


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
            name: 'Cantidad',
            data: [

                ['Hombre', <?php echo $jefeGrafico->cantidadHombres();?>],
                ['Mujer', <?php echo  $jefeGrafico->cantidadMujeres();?>]

            ]
        }]
    });//Fin grafico hombre/mujer

$('#container112').highcharts({ //Comentarios
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Numero de comentarios por jugador'
        },
        subtitle: {
            text: 'Matchday'
        },
        xAxis: {
            name: 'Jugador',
            categories: [
<?php
                
                $jugador = $jefeGrafico->jugadoresComentario();
                while($res=mysql_fetch_array($jugador)){
?>

                ['<?php echo $res['idUsuario'] ?>'],
<?php
}
?>

            ],
            title: {
                text: 'jugador'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Comentarios ',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Comentario',
            data: [
<?php
        
             $jugador1 = $jefeGrafico->jugadoresComentario();
                while($res=mysql_fetch_array($jugador1)){
?>

                [<?php echo $res['cantidad'] ?>],
<?php
}
?>


            ]
        }]
    });

        $('#container2').highcharts({
 chart: {
            type: 'bar'
        },
        title: {
            text: 'Jugadores agrupados por edad'
        },
        subtitle: {
            text: 'Matchday'
        },
        xAxis: {
            categories: [
<?php
                $res1 = $jefeGrafico->edadJugadores();
             
              while($row=mysql_fetch_array($res1)){
                   
                
?>

                [<?php echo $row['edad'] ?>],
<?php
    }
?>

            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jugadores ',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Jugadores'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Numero Jugadores',
            data: [
<?php
                $res2 = $jefeGrafico->edadJugadores();
                
                 while($row=mysql_fetch_array($res2)){
?>

                [<?php echo $row['cantidad'] ?>],
<?php
    }
?>


            ]
        }]
    });
        //Superficie recintos deportivos

 $('#container3').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Superficie recintos deportivos Chillan' //titulo
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie', //Tipo de grafico
            name: 'Recintos deportivos', //nombre de lo que estamos viendo
            data: [
                
                <?php 
                $r= $jefeGrafico->recintosSuperficie();
                while($row=mysql_fetch_array($r)){
                ?>
            ['<?php echo $row['superficie'] ?>',  <?php echo $row['cantidad']?>],
            <?php
                }
            ?>
            ]
        }]
    });
//precio recintos deportivos
$('#container4').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Precio Recintos deportivos Chillan' //titulo
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie', //Tipo de grafico
            name: 'Recintos', //nombre de lo que estamos viendo
            data: [
                
                <?php 
                $r=$jefeGrafico->recintosPrecio();
                while($res=mysql_fetch_array($r)){
                ?>
            ['<?php echo $res['precio'] ?>',  <?php echo $res['cantidad']?>],
            <?php
                }
            ?>
            ]
        }]
    });
//partidos por recintos deportivos
 $('#container5').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Recintos deportivos y sus partidos' //titulo
        },
        tooltip: {
            pointFormat: '{series.name}: {point.percentage:.1f} %</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie', //Tipo de grafico
            name: 'Cantidad', //nombre de lo que estamos viendo
            data: [
                
                <?php 
                $partidos=$jefeGrafico->recintosPartido();
                while($res=mysql_fetch_array($partidos)){
                ?>
            ['<?php echo $res['n'] ?>',  <?php echo $res['cantidad']?>],
            <?php
                }
            ?>
            ]
        }]
    });
 $('#container51').highcharts({ //Comentarios
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Numero de partidos en recintos'
        },
        subtitle: {
            text: 'Matchday'
        },
        xAxis: {
            categories: [
<?php
                $comentarios=$jefeGrafico->recintosPartido();
                while($res=mysql_fetch_array($comentarios)){
?>

                ['<?php echo $res['n'] ?>'],
<?php
}
?>

            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Recintos ',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Partidos',
            data: [
<?php
                $lista=$jefeGrafico->recintosPartido();
                while($res=mysql_fetch_array($lista)){
?>

                [<?php echo $res['cantidad'] ?>],
<?php
}
?>


            ]
        }]
    });
 $('#container6').highcharts({ //Comentarios
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Comentarios Recintos deportivos'
        },
        subtitle: {
            text: 'Matchday'
        },
        xAxis: {
            categories: [
<?php
                $comentarios=$jefeGrafico->recintosComentario();
                while($res=mysql_fetch_array($comentarios)){
?>

                ['<?php echo $res['nombre'] ?>'],
<?php
}
?>

            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Recintos ',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },

        credits: {
            enabled: false
        },
        series: [{
            name: 'Comentarios',
            data: [
<?php
                $lista=$jefeGrafico->recintosComentario();
                while($res=mysql_fetch_array($lista)){
?>

                [<?php echo $res['cantidad'] ?>],
<?php
}
?>


            ]
        }]
    });

  $('#container7').highcharts({
        title: {
            text: 'Partidos agendados por hora'
        },
        subtitle: {
            text: 'Matchday'
        },
        xAxis: {


            categories: [
               <?php
                $lista=$jefeGrafico->partidosHora();
                while($res=mysql_fetch_array($lista)){
                ?>

                '<?php echo $res['hora'] ?>',
                <?php
                    }
                ?>
            ],
             title: {
                text: 'Hora',
                align: 'high'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            data: [
             <?php
                $lista=$jefeGrafico->partidosHora();
                while($res=mysql_fetch_array($lista)){
                ?>

                <?php echo $res['cantidad'] ?>,
                <?php
                    }
                ?>



            ]
        }]
    });

  $('#container8').highcharts({ //Comentarios
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Partidos agendados vs jugados vs cancelados'
        },
        subtitle: {
            text: 'Matchday'
        },
        xAxis: {
            name: 'Jugador',
            categories: [
<?php
                
                $jugador = $jefeGrafico->partidosEstado();
                while($res=mysql_fetch_array($jugador)){
?>

                ['<?php echo $res['nombre'] ?>'],
<?php
}
?>

            ],
            title: {
                text: 'Estado'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Partidos ',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Partido',
            data: [
<?php
        
             $jugador1 = $jefeGrafico->partidosEstado();
                while($res=mysql_fetch_array($jugador1)){
?>

                [<?php echo $res['cantidad'] ?>],
<?php
}
?>


            ]
        }]
    });

  $('#container9').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Jugadores Capitanes'
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
            name: 'Cantidad',
            data: [

                ['Capitan', <?php echo $jefeGrafico->jugadoresCapitan();?>],
                ['Normal', <?php echo  $jefeGrafico->jugadores();?>]

            ]
        }]
    });//Fin grafico hombre/mujer


        });//FIN GRAFICOS
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
                        <div id="container2" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                         <div id="container112" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        <div id="container9" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
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
                        <div id="container3" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        <div id="container4" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        <div id="container5" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        <div id="container51" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        <div id="container6" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>

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
                                <a data-toggle="collapse" href="#collapse3">Partidos</a>
                            </h4>
                        </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <!--Primer grafico-->
                        <div id="container7" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
                        <div id="container8" style="min-width: 400px; height: 500px; max-width: 600px; margin: 0 auto"></div>
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

    

