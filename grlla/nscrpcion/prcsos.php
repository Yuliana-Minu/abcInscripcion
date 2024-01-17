
<!doctype html>
<html lang="en">
    <head>
        <?php 
            include('prncpal/hd.php');
            $url=$seccion_url; 	
        ?>
        <link rel="stylesheet" href="DataTables/datatables.min.css" />
        <script src="DataTables/datatables.min.js"></script>
        
    </head>

    <body>
    <style>
    .modal-body {
        max-height: calc(100vh - 210px);
        overflow-y: auto;
    }
    </style>
        <div class="page-container" style='padding:0; margin:0;'>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <?php include('prncpal/mnu.php') ?>
                    </div>
                    <div class="col-sm-9 container-principal">
                    
                    <?php 
                        include('crud/rs/nscrpcion/mtrcla.php');
                        include('crud/rs/nscrpcion/nscrpcion.php');

                        $personaSistema = $_SESSION['idusuario'];

                        $calendario_apertura = $objRsInscripcion->calendario_apertura();

                        $banderas_ninio=$objRsInscripcion->banderas_ninio($personaSistema, $calendario_apertura);

                        if($banderas_ninio){
                            foreach($banderas_ninio as $data_banderas_ninio){
                                $eni_codigo=$data_banderas_ninio['eni_codigo'];
                                $eni_ninio=$data_banderas_ninio['eni_ninio'];
                                $eni_estado=$data_banderas_ninio['eni_estado'];
                                $eni_estadoproceso=$data_banderas_ninio['eni_estadoproceso'];
                            }

                            if($eni_estado==1 && $eni_estadoproceso==0){
                                include('nscrpcion.php');
                            }

                            if($eni_estado==1 && $eni_estadoproceso==2){
                                include('nscrpcion.php');
                            }

                            if($eni_estado==1 && $eni_estadoproceso==20){
                                $ver_boton_imprimir = "none";
                                $ver_boton_cargar_foto = "block";
                                include('dtaInscripcion.php');
                            }


                            if($eni_estado==1 && $eni_estadoproceso==1){
                                $ver_boton_imprimir = "block";
                                $ver_boton_cargar_foto = "none";
                                include('dtaInscripcion.php');
                            }

                            if($eni_estado==2 && $eni_estadoproceso==0){
                                include('mtrcla.php');
                            }

                            if($eni_estado==2 && $eni_estadoproceso==2){
                                include('mtrcla.php');
                            }

                            if($eni_estado==2 && $eni_estadoproceso==20){
                                //echo "--->  faltan las fotos ";
                                $ver_boton_imprimir = "none";
                                $ver_boton_cargar_foto = "block";
                                include('dtaMatricula.php');
                            }

                            if($eni_estado==2 && $eni_estadoproceso==1){
                                $ver_boton_imprimir = "block";
                                $ver_boton_cargar_foto = "none";
                                include('dtaMatricula.php');
                            }

                            if($eni_estado==3 && $eni_estadoproceso==1){
                                $ver_boton_imprimir = "block";
                                $ver_boton_cargar_foto = "none";
                                include('dtaMatricula.php');
                            }
                        }

                    ?>

                    </div>
                </div>
                

            </div>
        </div>   
    </body>
</html>
 
<script src="js/jquery.validate.min.js"></script>

