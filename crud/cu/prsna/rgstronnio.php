<?php
    include('prcsos/prsna/rgstroninio.php');

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
    $txtFechaNacimiento=$_REQUEST['txtFechaNacimiento'];
    $selMunNacimiento=$_REQUEST['selMunNacimiento'];
    $txtDireccion=$_REQUEST['txtDireccion'];
    $selMunResidencia=$_REQUEST['selMunResidencia'];
    $txtCorreo=$_REQUEST['txtCorreo'];
    $txtTelefonoFijo=$_REQUEST['txtTelefonoFijo'];
    $CelularPersonal=$_REQUEST['txtCelularPersonal'];
    $perfil=$_REQUEST['perfil'];
    $txtLugarExpedicion=$_REQUEST['txtLugarExpedicion'];
    $selEps=$_REQUEST['selEps'];
    $radioSisben=$_REQUEST['radioSisben'];
    $txtEstrato=$_REQUEST['txtEstrato'];

    if($radioSisben){
        $sisben=$radioSisben;
    }
    else{
        $sisben=0;
    }

    if($CelularPersonal){
        $txtCelularPersonal=$CelularPersonal;
    }
    else{
        $txtCelularPersonal=0;
    }


    $registroNinio = new RgsrtoNnio();

    $registroNinio->setPersonaSistema($personaSistema);
    $registroNinio->setNombrePersona($nombre);
    $registroNinio->setPrimerApellidoPersona($primerApellido);
    $registroNinio->setSegundoApellidoPersona($segundoApellido);
    $registroNinio->setTipoIdentificacionPersona($tipoIdentificacion);
    $registroNinio->setNumeroIdentificacionPersona($numeroIdentificacion);
    $registroNinio->setSegundoNombrePersona($txtSegundoNombre);
    $registroNinio->setRhPersona($selRh);
    $registroNinio->setFechaNacimientoPersona($txtFechaNacimiento);
    $registroNinio->setMunicipioNacimientoPersona($selMunNacimiento);
    $registroNinio->setDireccionPersona($txtDireccion);
    $registroNinio->setMunicipioResidenciaPersona($selMunResidencia);
    $registroNinio->setCorreoPersona($txtCorreo);
    $registroNinio->setTelefonoPersona($txtTelefonoFijo);
    $registroNinio->setCelularPersona($txtCelularPersonal);
    $registroNinio->setGeneroPersona($genero);
    $registroNinio->setEstadoPersona($estado);
    $registroNinio->setPerfil($perfil);
    $registroNinio->setLugarExpedicionPersona($txtLugarExpedicion);
    $registroNinio->setEpsPersona($selEps);
    $registroNinio->setSisbenPersona($sisben);

    $registroNinio->setEstratoPersona($txtEstrato);


    echo $registroNinio->insertNinio();


?>
