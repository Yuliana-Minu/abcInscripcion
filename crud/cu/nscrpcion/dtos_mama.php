<?php 
    include('prcsos/nscrpcion/mdre.php');

    $per_codigo = $_REQUEST['per_codigo'];
    $identificacion_madre = $_REQUEST['txtIdentificacionMadre'];

    $validacionmadre = new VldacionMdre();

    $validacionmadre->setCodigoEstudiante($per_codigo);
    $validacionmadre->setIdentificacionMadre($identificacion_madre);

    header("Content-type: application/json");
        
    $datos_mother =  $validacionmadre->info_mama();

    echo $datos_mother; 

?>