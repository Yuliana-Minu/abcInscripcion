<?php
    include('prcsos/matricula/dtosAcudiente.php');

    function quitar_puntos_comas($cadena) {
        $no_permitidas= array (".",",");
        $permitidas= array ("&apos;");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    $personaSistema = $_SESSION['idusuario'];
    $codigoAcudiente = $_REQUEST['codigoAcudiente'];
    $txtNombreAcudiente = htmlspecialchars($_REQUEST['txtNombreAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombreAcudiente = htmlspecialchars($_REQUEST['txtSegundoNombreAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellidoAcudiente = htmlspecialchars($_REQUEST['txtPrimerApellidoAcudiente'],ENT_QUOTES | ENT_HTML5);
    $textSegundoApellidoAcudiente = htmlspecialchars($_REQUEST['textSegundoApellidoAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtIdentificacionAcudiente = quitar_puntos_comas($_REQUEST['txtIdentificacionAcudiente']);
    $txtFechaNacimientoAcudiente = $_REQUEST['txtFechaNacimientoAcudiente'];
    $radioNacionalidadAcudiente = $_REQUEST['radioNacionalidadAcudiente'];
    $SelDepNacimientoAcudiente = $_REQUEST['SelDepNacimientoAcudiente'];
    $selMunNacimientoAcudiente = $_REQUEST['selMunNacimientoAcudiente'];
    $txtCualAcudiente = htmlspecialchars($_REQUEST['txtCualAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtOcupacionAcudiente = htmlspecialchars($_REQUEST['txtOcupacionAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtEmpresaAcudiente = htmlspecialchars($_REQUEST['txtEmpresaAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtTelefonoResidenciaAcudiente = htmlspecialchars($_REQUEST['txtTelefonoResidenciaAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtCelularAcudiente = htmlspecialchars($_REQUEST['txtCelularAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtCargoAcudiente = htmlspecialchars($_REQUEST['txtCargoAcudiente'],ENT_QUOTES | ENT_HTML5);
    $txtCorreoAcudiente= filter_var($_REQUEST['txtCorreoAcudiente'], FILTER_SANITIZE_EMAIL);

    $datosacudiente = new dtosAcudiente();

    $datosacudiente->setCodigoEstudiante($personaSistema);
    $datosacudiente->setCodigoAcudiente($codigoAcudiente);
    $datosacudiente->setPrimerNombreAcudiente($txtNombreAcudiente);
    $datosacudiente->setSegundoNombreAcudiente($txtSegundoNombreAcudiente);
    $datosacudiente->setPrimerApellidoAcudiente($txtPrimerApellidoAcudiente);
    $datosacudiente->setSegundoApellidoAcudiente($textSegundoApellidoAcudiente);
    $datosacudiente->setFechaNacimientoAcudiente($txtFechaNacimientoAcudiente);
    $datosacudiente->setIdentificacionAcudiente($txtIdentificacionAcudiente);
    $datosacudiente->setNacionalidadAcudiente($radioNacionalidadAcudiente);
    $datosacudiente->setMunicipioAcudiente($selMunNacimientoAcudiente);
    $datosacudiente->setCualNacionalidadAcudiente($txtCualAcudiente);
    $datosacudiente->setCorreoAcudiente($txtCorreoAcudiente);
    $datosacudiente->setOcupacionAcudiente($txtOcupacionAcudiente);
    $datosacudiente->setEmpresaAcudiente($txtEmpresaAcudiente);
    $datosacudiente->setCargoAcudiente($txtCargoAcudiente);
    $datosacudiente->setTelefonoResidenciaAcudiente($txtTelefonoResidenciaAcudiente);
    $datosacudiente->setCelularAcudiente($txtCelularAcudiente);
    
    $datosacudiente->info_acudiente();
?>