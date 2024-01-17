<?php
    include('prcsos/matricula/dtosPapa.php');

    function quitar_puntos_comas($cadena) {
        $no_permitidas= array (".",",");
        $permitidas= array ("&apos;");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }

    $personaSistema = $_SESSION['idusuario'];
    $txtCodigoPadre = $_REQUEST['txtCodigoPadre'];
    $txtNombrePadre = htmlspecialchars($_REQUEST['txtNombrePadre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombrePadre  = htmlspecialchars($_REQUEST['txtSegundoNombrePadre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellidoPadre = htmlspecialchars($_REQUEST['txtPrimerApellidoPadre'], ENT_QUOTES | ENT_HTML5);
    $textSegundoApellidoPadre = htmlspecialchars($_REQUEST['textSegundoApellidoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtIdentificacionPadre = htmlspecialchars(quitar_puntos_comas($_REQUEST['txtIdentificacionPadre']),ENT_QUOTES | ENT_HTML5);
    $txtFechaNacimientoPadre = $_REQUEST['txtFechaNacimientoPadre'];
    $radioNacionalidadPadre = $_REQUEST['radioNacionalidadPadre'];
    $selMunNacimientoPadre = $_REQUEST['selMunNacimientoPadre'];
    $txCualPadre = htmlspecialchars($_REQUEST['txCualPadre'], ENT_QUOTES | ENT_HTML5);
    $txtOcupacionPadre = htmlspecialchars($_REQUEST['txtOcupacionPadre'], ENT_QUOTES | ENT_HTML5);
    $txtEmpresaPadre = htmlspecialchars($_REQUEST['txtEmpresaPadre'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoPadre = htmlspecialchars($_REQUEST['txtTelefonoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCelularPadre = htmlspecialchars($_REQUEST['txtCelularPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCargoPadre = htmlspecialchars($_REQUEST['txtCargoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCorreoPadre = filter_var($_REQUEST['txtCorreoPadre'],FILTER_SANITIZE_EMAIL);
   
    $dtospapas = new dtosPadree();

    $dtospapas->setCodigoPadre($txtCodigoPadre);
    $dtospapas->setPrimerNombrePadre($txtNombrePadre);
    $dtospapas->setSegundoNombrePadre($txtSegundoNombrePadre);
    $dtospapas->setPrimerApellidoPadre($txtPrimerApellidoPadre);
    $dtospapas->setSegundoApellidoPadre($textSegundoApellidoPadre);
    $dtospapas->setFechaNacimientoPadre($txtFechaNacimientoPadre);
    $dtospapas->setIdentificacionPadre($txtIdentificacionPadre);
    $dtospapas->setNacionalidadPadre($radioNacionalidadPadre);
    $dtospapas->setMunicipioPadre($selMunNacimientoPadre);
    $dtospapas->setCualNacionalidadPadre($txCualPadre);
    $dtospapas->setCorreoPadre($txtCorreoPadre);
    $dtospapas->setOcupacionPadre($txtOcupacionPadre);
    $dtospapas->setEmpresaPadre($txtEmpresaPadre);
    $dtospapas->setCargoPadre($txtCargoPadre);
    $dtospapas->setTelefonoResidenciaPadre($txtTelefonoPadre);
    $dtospapas->setCelularPadre($txtCelularPadre);
    $dtospapas->setCodigoEstudiante($personaSistema);

    $dtospapas->info_papa();
?>