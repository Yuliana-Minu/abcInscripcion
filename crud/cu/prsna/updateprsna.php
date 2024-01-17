<?php
    include('prcsos/prsna/updatePrsna.php');

    $personaSistema = $_SESSION['idusuario'];
    $codigo=$_REQUEST['codigoPersona'];
    $nombre=$_REQUEST['txtNombre'];
    $primerApellido=$_REQUEST['txtPrimerApellido'];
    $segundoApellido=$_REQUEST['txtSegundoApellido'];
    $tipoIdentificacion=$_REQUEST['selTipoIdentificacion'];
    $numeroIdentificacion=$_REQUEST['txtIdentificacion'];
    $genero=$_REQUEST['radioGenero'];
    $estado=$_REQUEST['radioEstado'];
    $txtSegundoNombre=$_REQUEST['txtSegundoNombre'];
    $selRh=$_REQUEST['selRh'];
    $selEstadoCivil=$_REQUEST['selEstadoCivil'];
    $selProfesion=$_REQUEST['selProfesion'];
    $txtFechaNacimiento=$_REQUEST['txtFechaNacimiento'];
    $selMunNacimiento=$_REQUEST['selMunNacimiento'];
    $txtDireccion=$_REQUEST['txtDireccion'];
    $selMunResidencia=$_REQUEST['selMunResidencia'];
    $txtCorreo=$_REQUEST['txtCorreo'];
    $txtTelefonoFijo=$_REQUEST['txtTelefonoFijo'];
    $txtCelularPersonal=$_REQUEST['txtCelularPersonal'];


    $updatePersona = new UpdtePrsna();

    $updatePersona->setPersonaSistema($personaSistema);
    $updatePersona->setCodigoPersona($codigo);
    $updatePersona->setNombrePersona($nombre);
    $updatePersona->setPrimerApellidoPersona($primerApellido);
    $updatePersona->setSegundoApellidoPersona($segundoApellido);
    $updatePersona->setTipoIdentificacionPersona($tipoIdentificacion);
    $updatePersona->setNumeroIdentificacionPersona($numeroIdentificacion);
    $updatePersona->setSegundoNombrePersona($txtSegundoNombre);
    $updatePersona->setRhPersona($selRh);
    $updatePersona->setEstadoCivilPersona($selEstadoCivil);
    $updatePersona->setProfesionPersona($selProfesion);
    $updatePersona->setFechaNacimientoPersona($txtFechaNacimiento);
    $updatePersona->setMunicipioNacimientoPersona($selMunNacimiento);
    $updatePersona->setDireccionPersona($txtDireccion);
    $updatePersona->setMunicipioResidenciaPersona($selMunResidencia);
    $updatePersona->setCorreoPersona($txtCorreo);
    $updatePersona->setTelefonoPersona($txtTelefonoFijo);
    $updatePersona->setCelularPersona($txtCelularPersonal);
    $updatePersona->setGeneroPersona($genero);
    $updatePersona->setEstadoPersona($estado);


    echo $updatePersona->updatePersona();


?>
