<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/ico/favicon.png">

        <title>COCIDES</title>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="../assets/js/html5shiv.js"></script>
              <script src="../assets/js/respond.min.js"></script>
            <![endif]-->

        <!-- Custom styles for this template -->
        <link href="../assets/carousel.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <script src="../assets/js/jquery-v1.10.2.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/holder.js"></script>

        <script>

            //JS PARA INICIALIZAR EL CARUSEL
            // INTEVAL = TIEMPO QUE DURA CADA SLIDE
            var $ = jQuery.noConflict();
            $(document).ready(function() {
                $('#myCarousel').carousel({interval: 3000});
            }
            );

            // CUANDO EL FOCO ESTE SOBRE EL SLIDE TRES, ESTE PAUSA EL SLIDE
            // PARA PODER VER EL VIDEO
            $('#item_vidUfg').hover(function() {
                $(this).carousel('pause');
            });

        </script>
    </head>

    <!-- NAVBAR
        ================================================== -->
    <body>

        <div id="header" class="navbar navbar-default navbar-static-top">
            <?php
            include 'layout/private-header.php';
            ?>
        </div>
        <!-- // Script para cargar recursos html con jQuery en una pagina -->


        <!-- Carousel
            ================================================== -->
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="../assets/img/banner1.jpg" alt="First slide">
                    <!-- EN EL DIV QUE CONTIEME LA CLASE "item active"DEBEN AGREGARSE LAS IMAGENES -->
                    <div class="container">
                        <div class="carousel-caption">

                            <h1>Bienvenido a Cocides</h1>
                            <p>Tu Clinica Dental Amiga</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="../assets/img/banner2.jpg" alt="Second slide">

                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Somos una Institucion sin fines de Lucro</h1>
                            <h2>Regalando sonrisas saludables</h2>
                            <!-- <p><a class="btn btn-lg btn-primary" href="login.html" role="button">Entrar</a></p> -->
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="../assets/img/banner3.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">

                        </div>
                    </div>
                </div> 
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <!-- /.carousel -->


        <div class="container">

            <div class="page-header">


                <h1><small>COCIDES</small></h1>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#Avisos">Avisos</a></li>
                        <li class=""><a href="#Conferencias">Conferencias</a></li>
                        <li class=""><a href="#Comunidades">Comunidades</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="Avisos">
                            <h3>Información</h3>
                        </div>
                        <div class="tab-pane" id="Conferencia">

                            ...

                        </div>
                        <div class="tab-pane" id="Comunidades">...</div>
                    </div>
                    <script>
                        $('#myTab a').click(function(e) {
                            e.preventDefault();
                            $(this).tab('show');
                        });
                    </script>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">


                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Síguenos también 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">



                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Nosotros

                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    ......
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        ...
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- FOOTER -->
            <footer>
                <br>
                <br>
                <p class="pull-right"><a href="#">Back to top</a></p>
                <p>&copy; 2013 Cocides. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos y Condiciones</a></p>
            </footer>

        </div>
        <!-- Bootstrap core JavaScript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>
