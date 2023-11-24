
<?php
session_start();
require 'funciones.php';
require_once('database_credentials.php');
include_once('database_utilities.php');
$result = run_query();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AWShop </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">AWShop</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">AWShop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadTeclado();?></span></a>              
            </li> 
            <li>
            <a href="panel/teclados/index.php" class="btn">JOYAS <span class="badge"></span></a>
            </li>
            <li>
            <a href="panel/index.php" class="btn">LOGIN <span class="badge"></span></a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
    <div class="row">
            <?php
              require 'vendor/autoload.php';
              $teclado = new Kawschool\Teclado;
              $info_teclado = $teclado->mostrar();
              $cantidad = count($info_teclado);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_teclado[$x];
            ?>
              <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="text-center titulo-pelicula"><?php print $item['titulo'] ?></h1>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src=" <?php print $foto; ?>" class="img-responsive" >
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
                    <div class="panel-footer">
                        <a href="carrito.php?id=<?php print $item['IDteclado'] ?>" class="btn btn-success btn-block">
                          <span class="glyphicon glyphicon-shopping-cart"> Comprar</span>
                        </a>
                    </div>
                  </div>
              
              
              </div>
          <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>
        

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
