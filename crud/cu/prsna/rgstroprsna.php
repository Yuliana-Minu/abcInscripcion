<?php
    include('prcsos/prsna/rgstroprsna.php');

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
    $selEstadoCivil=$_REQUEST['selEstadoCivil'];
    $selProfesion=$_REQUEST['selProfesion'];
    $txtFechaNacimiento=$_REQUEST['txtFechaNacimiento'];
    $selMunNacimiento=$_REQUEST['selMunNacimiento'];
    $txtDireccion=$_REQUEST['txtDireccion'];
    $selMunResidencia=$_REQUEST['selMunResidencia'];
    $txtCorreo=$_REQUEST['txtCorreo'];
    $txtTelefonoFijo=$_REQUEST['txtTelefonoFijo'];
    $txtCelularPersonal=$_REQUEST['txtCelularPersonal'];
    $perfil=$_REQUEST['perfil'];


    $registroPersona = new RgsrtoPrsna();

    $registroPersona->setPersonaSistema($personaSistema);
    $registroPersona->setNombrePersona($nombre);
    $registroPersona->setPrimerApellidoPersona($primerApellido);
    $registroPersona->setSegundoApellidoPersona($segundoApellido);
    $registroPersona->setTipoIdentificacionPersona($tipoIdentificacion);
    $registroPersona->setNumeroIdentificacionPersona($numeroIdentificacion);
    $registroPersona->setSegundoNombrePersona($txtSegundoNombre);
    $registroPersona->setRhPersona($selRh);
    $registroPersona->setEstadoCivilPersona($selEstadoCivil);
    $registroPersona->setProfesionPersona($selProfesion);
    $registroPersona->setFechaNacimientoPersona($txtFechaNacimiento);
    $registroPersona->setMunicipioNacimientoPersona($selMunNacimiento);
    $registroPersona->setDireccionPersona($txtDireccion);
    $registroPersona->setMunicipioResidenciaPersona($selMunResidencia);
    $registroPersona->setCorreoPersona($txtCorreo);
    $registroPersona->setTelefonoPersona($txtTelefonoFijo);
    $registroPersona->setCelularPersona($txtCelularPersonal);
    $registroPersona->setGeneroPersona($genero);
    $registroPersona->setEstadoPersona($estado);
    $registroPersona->setPerfil($perfil);


    echo $registroPersona->insertPersona();


?>
