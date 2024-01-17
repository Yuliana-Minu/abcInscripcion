<?php
include('classFto.php');
class UpdteFoto  extends Foto{

    public function __construct(){
        $this->cnxion = Dtbs::getInstance();
    }
   
    public function updateFoto(){

        $sql_buscar = "SELECT per_foto 
                         FROM principal.persona
                        WHERE per_codigo = ".$this->getPersonaFoto().";";

        $query_buscar=$this->cnxion->ejecutar($sql_buscar);

        $data_buscar=$this->cnxion->obtener_filas($query_buscar);

        $per_foto = $data_buscar['per_foto'];

        if($per_foto){
            if (file_exists($name_archivo)) {
                unlink($per_foto);
            }
        }        

        $updateFoto="UPDATE principal.persona
                         SET per_personamodifico=".$this->getPersonaSistema().", 
                             per_fechamodifico=NOW(), 
                             per_foto='".$this->getFotoFoto()."'
                       WHERE per_codigo=".$this->getPersonaFoto().";";
           
        $this->cnxion->ejecutar($updateFoto);


        return $updateFoto;

    }
}
?>
