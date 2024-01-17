<?php
//echo "Hola prueba ";

    ob_start();
    session_start();



    include('lbr/dataSrvdor.php'); // datos del servidor
    include('prcsos/sstma/Sstem.php'); // procesos del sistema, archivos del sistema de acurdo a la url


    if($contenido==2){
        if(!$_SESSION['idusuario']){
            header('Location:'.$enlace);
        }
        else{
            echo "";
        }
    }

    $objSistema = new Sstema();
    $objSistema->setContenido($contenido);
    $objSistema->setSeccionurl($seccion_url);

    $data_sistema = $objSistema->mostrarsistema(); // lleva los parametros para mostrar los archivos a mostrar en el sistema

    $nombre_sistema = $objSistema->getNombre_modulosytem();
    $modulosistema = $objSistema->getImagen_modulosytem();
    $filesistema = $objSistema->getIncludefile();
    $padreSystem = $objSistema->getPadreSystem();



    include($filesistema);



    ob_end_flush();

?>
