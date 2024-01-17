<?php 

    include('prcsos/prsna/rgstroPrsnaPrfil.php');

    $personaSistema = $_SESSION['idusuario'];

    $txtalias=$_REQUEST['txtalias'];
    $txtPass=$_REQUEST['txtPass'];
    $perfil=$_REQUEST['perfil'];
    $codigoPersona=$_REQUEST['codigoPersona'];

    $cantidadInsertar=count($perfil);

    $registroPersonaPerfil= new RgsrtoPrsnaPrfil();

    $registroPersonaPerfil->setPersonaPersonaPerfil($codigoPersona);
    $registroPersonaPerfil->setPerfilPersonaPerfil($perfil);
    $registroPersonaPerfil->setUsuarioPersona($txtalias);
    $registroPersonaPerfil->setContraseniaPersona($txtPass);
    $registroPersonaPerfil->setCantidadInsertar($cantidadInsertar);
    $registroPersonaPerfil->setPersonaSistema($personaSistema);

    echo $registroPersonaPerfil->insertPersonaPerfil();
?>