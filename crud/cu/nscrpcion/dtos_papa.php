<?php 
    include('prcsos/nscrpcion/pdre.php');

    $per_codigo = $_REQUEST['per_codigo'];
    $identificacion_padre = $_REQUEST['txtIdentificacionPadre'];


    $validacionpadre = new VldacionPdre();

    $validacionpadre->setCodigoEstudiante($per_codigo);
    $validacionpadre->setIdentificacionPadre($identificacion_padre);

    header("Content-type: application/json");
        
    $datos_father =  $validacionpadre->info_papa();

    echo $datos_father; 

?>