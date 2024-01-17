<?php
    include('prcsos/matricula/dtosEstdnte.php');

    function quitar_puntos_comas($cadena) {
        $no_permitidas= array (".",",");
        $permitidas= array ("&apos;");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }
    
    $personaSistema = $_REQUEST['personaSistema'];
    $txtCodigoEstudiante = $_REQUEST['txtCodigoEstudiante'];
    $txtFechaPreMatricula = $_REQUEST['txtFechaPreMatricula'];
    $selGradoIngresar = $_REQUEST['selGradoIngresar'];
    $selTipoIdentificacion = $_REQUEST['selTipoIdentificacion'];
    $txtIdentificacion = htmlspecialchars(quitar_puntos_comas($_REQUEST['txtIdentificacionPadre']),ENT_QUOTES | ENT_HTML5);
    $txtLugarExpedicion = htmlspecialchars($_REQUEST['txtLugarExpedicion'], ENT_QUOTES | ENT_HTML5);
    $txtNombre = htmlspecialchars($_REQUEST['txtNombre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombre = htmlspecialchars($_REQUEST['txtSegundoNombre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellido = htmlspecialchars($_REQUEST['txtPrimerApellido'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoApellido = htmlspecialchars($_REQUEST['txtSegundoApellido'], ENT_QUOTES | ENT_HTML5);
    $radioNacionalidadNinio = $_REQUEST['radioNacionalidadNinio'];
    $selMunNacimiento = $_REQUEST['selMunNacimiento'];
    $txtCualNinio = htmlspecialchars($_REQUEST['txtCualNinio'], ENT_QUOTES | ENT_HTML5);
    $txtFechaNacimiento = $_REQUEST['txtFechaNacimiento'];
    $txtDireccion = htmlspecialchars($_REQUEST['txtDireccion'], ENT_QUOTES | ENT_HTML5);
    $selMunResidencia = $_REQUEST['selMunResidencia'];
    $txtTelefono = htmlspecialchars($_REQUEST['txtTelefono'], ENT_QUOTES | ENT_HTML5);
    $txtCelular = htmlspecialchars($_REQUEST['txtCelular'], ENT_QUOTES | ENT_HTML5);
    $txtCorreo = filter_var($_REQUEST['txtCorreo'], FILTER_SANITIZE_EMAIL);
    $selEps = $_REQUEST['selEps'];
    $selRh = $_REQUEST['selRh'];
    $txtEstrato = htmlspecialchars($_REQUEST['txtEstrato'], ENT_QUOTES | ENT_HTML5);
    $radioSisben = $_REQUEST['radioSisben'];

    if($radioSisben){
        $radioSisben = $radioSisben;
    }
    else{
        $radioSisben = 0;
    }

    $dtosestudiante = new dtosEstdnte();

    $dtosestudiante->setFechaPreMariculaEstudiante($txtFechaPreMatricula);
    $dtosestudiante->setGradoIngresarEstudiante($selGradoIngresar);

    $dtosestudiante->setCodigoEstudiante($txtCodigoEstudiante);
    $dtosestudiante->setPersonaSistema($personaSistema);
    $dtosestudiante->setTipoIdentificacionEstudiante($selTipoIdentificacion);
    $dtosestudiante->setLugarExpedicionEstudiante($txtLugarExpedicion);
    $dtosestudiante->setNumeroIdentificacionEstudiante($txtIdentificacion);
    $dtosestudiante->setPrimerNombreEstudiante($txtNombre);
    $dtosestudiante->setSegundoNombreEstudiante($txtSegundoNombre);
    $dtosestudiante->setPrimerApellidoEstudiante($txtPrimerApellido);
    $dtosestudiante->setSegundoApellidoEstudiante($txtSegundoApellido);
    $dtosestudiante->setMunicipioNaceEstudiante($selMunNacimiento);
    $dtosestudiante->setFechaNacimientoEstudiante($txtFechaNacimiento);
    $dtosestudiante->setTelefonoEstudiante($txtTelefono);
    $dtosestudiante->setDireccionEstudiante($txtDireccion);
    $dtosestudiante->setMunicipioResidenciaEstudiante($selMunResidencia);
    $dtosestudiante->setCorreoEstudiante($txtCorreo);
    $dtosestudiante->setFotoEstudiante($txtFoto);
    $dtosestudiante->setNacionalidadEstudiante($radioNacionalidadNinio);
    $dtosestudiante->setOtraNacionalidadEstudiante($txtCualNinio);
    $dtosestudiante->setCelularEstudiante($txtCelular);
    $dtosestudiante->setEpsEstudiante($selEps);
    $dtosestudiante->setRhEstudiante($selRh);
    $dtosestudiante->setEstratoEstudiante($txtEstrato);
    $dtosestudiante->setSisbenEstudiante($radioSisben);

    $dtosestudiante->info_ninio();
?>