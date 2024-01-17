<?php
    include('prcsos/prsna/rgstroPdre.php');

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


    $registroPadre = new RgstroPdre();

    $registroPadre->setPersonaSistema($personaSistema);
    $registroPadre->setNombrePersona($nombre);
    $registroPadre->setPrimerApellidoPersona($primerApellido);
    $registroPadre->setSegundoApellidoPersona($segundoApellido);
    $registroPadre->setTipoIdentificacionPersona($tipoIdentificacion);
    $registroPadre->setNumeroIdentificacionPersona($numeroIdentificacion);
    $registroPadre->setSegundoNombrePersona($txtSegundoNombre);
    $registroPadre->setRhPersona($selRh);
    $registroPadre->setDireccionPersona($txtDireccion);
    $registroPadre->setMunicipioResidenciaPersona($selMunResidencia);
    $registroPadre->setCorreoPersona($txtCorreo);
    $registroPadre->setTelefonoPersona($txtTelefonoFijo);
    $registroPadre->setCelularPersona($txtCelularPersonal);
    $registroPadre->setGeneroPersona($genero);
    $registroPadre->setEstadoPersona($estado);
    $registroPadre->setPerfil($perfil);


    echo $registroPadre->insertPadre();


?>
