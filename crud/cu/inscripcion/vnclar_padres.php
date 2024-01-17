<?php
    include('prcsos/inscripcion/vnclar_padres.php');

    $no_permitidas = array('.',',');

    $personaSistema = $_SESSION['idusuario'];
    $identificacion_papa = str_replace($no_permitidas,'',$_REQUEST['identificacion_papa']);
    $rol = $_REQUEST['rol'];

    $vinculacionpadres = new VinculacionPadres();

    $vinculacionpadres->setCodigoEstudiante($personaSistema);
    $vinculacionpadres->setIdentificacionPadre($identificacion_papa);
    $vinculacionpadres->setRol($rol);

    $vinculacionpadres->vinculacion();
?>