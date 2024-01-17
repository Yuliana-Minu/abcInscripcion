<?php
    include('prcsos/prsna/updatePdre.php');

    $personaSistema = $_SESSION['idusuario'];
    $nombre=$_REQUEST['txtNombre'];
    $primerApellido=$_REQUEST['txtPrimerApellido'];
    $segundoApellido=$_REQUEST['txtSegundoApellido'];
    $tipoIdentificacion=$_REQUEST['selTipoIdentificacion'];
    $numeroIdentificacion=$_REQUEST['txtIdentificacion'];
    $genero=$_REQUEST['radioGenero'];
    $estado=$_REQUEST['radioEstado'];
    $txtSegundoNombre=$_REQUEST['txtSegundoNombre'];
    $selRh=$_REQUEST['selRh'];
    $txtDireccion=$_REQUEST['txtDireccion'];
    $selMunResidencia=$_REQUEST['selMunResidencia'];
    $txtCorreo=$_REQUEST['txtCorreo'];
    $txtTelefonoFijo=$_REQUEST['txtTelefonoFijo'];
    $txtCelularPersonal=$_REQUEST['txtCelularPersonal'];
    $perfil=$_REQUEST['perfil'];
    $codigo=$_REQUEST['codigoPersona'];

    $updatepadre = new UpdtePrsna();

    $updatepadre->setPersonaSistema($personaSistema);
    $updatepadre->setNombrePersona($nombre);
    $updatepadre->setPrimerApellidoPersona($primerApellido);
    $updatepadre->setSegundoApellidoPersona($segundoApellido);
    $updatepadre->setTipoIdentificacionPersona($tipoIdentificacion);
    $updatepadre->setNumeroIdentificacionPersona($numeroIdentificacion);
    $updatepadre->setSegundoNombrePersona($txtSegundoNombre);
    $updatepadre->setRhPersona($selRh);
    $updatepadre->setDireccionPersona($txtDireccion);
    $updatepadre->setMunicipioResidenciaPersona($selMunResidencia);
    $updatepadre->setCorreoPersona($txtCorreo);
    $updatepadre->setTelefonoPersona($txtTelefonoFijo);
    $updatepadre->setCelularPersona($txtCelularPersonal);
    $updatepadre->setGeneroPersona($genero);
    $updatepadre->setEstadoPersona($estado);
    $updatepadre->setPerfil($perfil);
    $updatepadre->setCodigoPersona($codigo);


    echo $updatepadre->updatePersona();


?>
