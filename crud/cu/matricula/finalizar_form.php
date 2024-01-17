<?php
    include('prcsos/matricula/finalizar_form.php');

    $personaSistema = $_SESSION['idusuario'];
    $txtFechaPreMatricula = $_REQUEST['txtFechaPreMatricula'];
    $selGradoIngresar = $_REQUEST['selGradoIngresar'];

    $formfinalizado = new FinalizarFormulario();

    $formfinalizado->setCodigoEstudiante($personaSistema);
    $formfinalizado->setFechaPreMariculaEstudiante($txtFechaPreMatricula);
    $formfinalizado->setGradoIngresarEstudiante($selGradoIngresar);

    $formfinalizado->fin_formulario();
?>