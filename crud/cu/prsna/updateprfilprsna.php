<?php 

    include('prcsos/prsna/updateprfilprsna.php');

    $personaSistema = $_SESSION['idusuario'];

    $txtalias=$_REQUEST['txtalias'];
    $txtPass=$_REQUEST['txtPass'];
    $perfil=$_REQUEST['perfil'];
    $codigoPersona=$_REQUEST['codigoPersona'];

    $cantidadInsertar=count($perfil);

    $updatePersonaPerfil= new UpdtePrsnaPrfil();

    $updatePersonaPerfil->setPersonaPersonaPerfil($codigoPersona);
    $updatePersonaPerfil->setPerfilPersonaPerfil($perfil);
    $updatePersonaPerfil->setUsuarioPersona($txtalias);
    $updatePersonaPerfil->setContraseniaPersona($txtPass);
    $updatePersonaPerfil->setCantidadInsertar($cantidadInsertar);
    $updatePersonaPerfil->setPersonaSistema($personaSistema);

    echo $updatePersonaPerfil->updatePersonaPerfil();
?>