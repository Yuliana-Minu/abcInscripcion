<?php
   include('crud/rs/nscrpcion/rs_inscripcion.php'); 
    
   header("Content-type: application/json");
        
   echo $rs_ninios_inscripcion;

?>