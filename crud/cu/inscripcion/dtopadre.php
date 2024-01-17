<?php
    include('prcsos/inscripcion/dtoPadre.php');

    $personaSistema  = $_SESSION['idusuario'];
    $txtNombrePadre = htmlspecialchars($_REQUEST['txtNombrePadre'], ENT_QUOTES | ENT_HTML5);
    $txtSegundoNombrePadre = htmlspecialchars($_REQUEST['txtSegundoNombrePadre'], ENT_QUOTES | ENT_HTML5);
    $txtPrimerApellidoPadre = htmlspecialchars($_REQUEST['txtPrimerApellidoPadre'], ENT_QUOTES | ENT_HTML5);
    $textSegundoApellidoPadre = htmlspecialchars($_REQUEST['textSegundoApellidoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtFechaNacimientoPadre = $_REQUEST['txtFechaNacimientoPadre'];
    $radioVivePadre = $_REQUEST['radioVivePadre'];
    $txtNivelEducativoPadre = htmlspecialchars($_REQUEST['txtNivelEducativoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCorreoPadre = htmlspecialchars($_REQUEST['txtCorreoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtOcupacionPadre = htmlspecialchars($_REQUEST['txtOcupacionPadre'], ENT_QUOTES | ENT_HTML5);
    $txtEmpresaPadre = htmlspecialchars($_REQUEST['txtEmpresaPadre'], ENT_QUOTES | ENT_HTML5);
    $txtCargoPadre = htmlspecialchars($_REQUEST['txtCargoPadre'], ENT_QUOTES | ENT_HTML5);
    $txtDireccionOficinaPadre = htmlspecialchars($_REQUEST['txtDireccionOficinaPadre'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoOficinaPadre = htmlspecialchars($_REQUEST['txtTelefonoOficinaPadre'], ENT_QUOTES | ENT_HTML5);
    $txtDireccionResidencia = htmlspecialchars($_REQUEST['txtDireccionResidencia'], ENT_QUOTES | ENT_HTML5);
    $txtTelefonoResidencia = $_REQUEST['txtTelefonoResidencia'];
    $txtCelularPadre = $_REQUEST['txtCelularPadre'];
    $codigoPapaNinio = $_REQUEST['codigoPapaNinio'];
    
    $rgstrosdatospapas = new dtosPapas();

    $rgstrosdatospapas->setPersonaSistema($personaSistema);
    $rgstrosdatospapas->setPrimerNombrePadre($txtNombrePadre);
    $rgstrosdatospapas->setSegundoNombrePadre($txtSegundoNombrePadre);
    $rgstrosdatospapas->setPrimerApellidoPadre($txtPrimerApellidoPadre);
    $rgstrosdatospapas->setSegundoApellidoPadre($textSegundoApellidoPadre);
    $rgstrosdatospapas->setFechaNacimientoPadre($txtFechaNacimientoPadre);
    $rgstrosdatospapas->setVivePadre($radioVivePadre);
    $rgstrosdatospapas->setNivelEducativoPadre($txtNivelEducativoPadre);
    $rgstrosdatospapas->setCorreoPadre($txtCorreoPadre);
    $rgstrosdatospapas->setOcupacionPadre($txtOcupacionPadre);
    $rgstrosdatospapas->setEmpresaPadre($txtEmpresaPadre);
    $rgstrosdatospapas->setCargoPadre($txtCargoPadre);
    $rgstrosdatospapas->setDireccionOficinaPadre($txtDireccionOficinaPadre);
    $rgstrosdatospapas->setTelefonoOficinaPadre($txtTelefonoOficinaPadre);
    $rgstrosdatospapas->setDirecionResidenciaPadre($txtDireccionResidencia);
    $rgstrosdatospapas->setTelefonoResidenciaPadre($txtTelefonoResidencia);
    $rgstrosdatospapas->setCelularPadre($txtCelularPadre);
    $rgstrosdatospapas->setCodigoPapa($codigoPapaNinio);

    $rgstrosdatospapas->dtaPapa();
?>