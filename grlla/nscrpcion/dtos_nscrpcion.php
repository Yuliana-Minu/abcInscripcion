
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
            <!--<div class="container-fluid">-->
                <!--<div class="row">-->
                    <?php 
                        include('crud/rs/nscrpcion/mtrcla.php');
                        include('crud/rs/nscrpcion/nscrpcion.php');

                        include('datos.php');
                        

                    ?>
                    <!--
                    <div class="col-sm-3">
                        <?php //include('prncpal/mnu.php') ?>
                    </div>
                    <div class="col-sm-9 container-principal">
                    -->
                   
                <!--</div>-->
                

            <!--</div>-->
        </div>  
    </body>
</html>
 
<script src="js/jquery.validate.min.js"></script>

