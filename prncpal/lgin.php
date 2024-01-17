
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="">
    <title>ABC</title>



    <!-- Bootstrap core CSS -->


    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >


    <script src='js/jquery.min.js'></script>
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <script type="text/javascript" src="vjs/cambio_u.js"></script>
    <script type="text/javascript" src="vjs/cambio_c.js"></script>

    <script src="https://code.jquery.com/jquery-latest.js"></script>


    <!-- Custom styles for this template -->
    <link href="css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" role="form" id="accesoinscripcionform">
      <div class="text-center mb-4">
        <img class="mb-4" src="images/logo.jpeg" style="width: 50%; height: 50%" alt="" >
        <h1 class="h4 mb-4 font-weight-normal">Proceso de Inscripción</h1>
      </div>

        <div class="form-label-group form-group">
            <input type="text" id="inputUsuario" name="textUsuario" class="form-control" placeholder="Usuario" data-rule-required="true" data-msg-required="Por favor ingrese el Número Identificación." required autofocus>
            <label for="inputUsuario">Identificaci&oacute;n</label>
            <span class="help-block" id="error"></span>
            <div class="error_login" id="error_login" ></div>
        </div>


      <button class="btn btn-lg btn-danger btn-block" type="submit" onClick="validar_asopano();" >Entrar</button>
      <!--<br>
      <button class="btn btn-success btn-lg btn-danger btn-block" onClick="validar_inscripcion();" >Inscripción</button>-->

      <p class="mt-5 mb-3 text-muted text-center">&copy;ABC School-TDI V1.0 | School</p>
  </form>
</body>
</html>
<script src="js/jquery.validate.min.js"></script>
<script src="vjs/envio_accso.js"></script>
