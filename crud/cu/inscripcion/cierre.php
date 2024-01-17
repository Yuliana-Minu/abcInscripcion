<?php
    include('prcsos/inscripcion/finalizar_form.php');

    $personaSistema = $_SESSION['idusuario'];

    $formfinalizado = new FinalizarFormulario();

    $formfinalizado->setCodigoEstudiante($personaSistema);

    $formfinalizado->cierre_formulario();
?>