<?php
    include('prcsos/nscrpcion/classInscrpcion.php');
    class FinalizarFormulario extends Inscripcion{
        private $cnxion;

        public function __construct(){
            $this->cnxion = Dtbs::getInstance();
        }

        public function calendario_apertura(){

            $sql_calendario_apertura="SELECT MAX(ama_vigencia) AS vigencia_matricula
                                        FROM academico.apertura_matricula
                                       WHERE ama_estado = 1;";
    
            $query_calendario_apertura=$this->cnxion->ejecutar($sql_calendario_apertura);
    
            $data_calendario_apertura=$this->cnxion->obtener_filas($query_calendario_apertura);
    
            $vigencia_matricula=$data_calendario_apertura['vigencia_matricula'];
    
            return $vigencia_matricula;
        }
        
        public function fin_formulario(){

            $calendario_apertura = $this->calendario_apertura();

            $updateEstado="UPDATE principal.estado_ninio
                              SET eni_fechamodifico=NOW(), 
                                  eni_personamodifico=".$this->getCodigoEstudiante().", 
                                  eni_estadoproceso=20,
                                  eni_estadodatos=1
                            WHERE eni_estado = 1
                              AND eni_ninio=".$this->getCodigoEstudiante()."
                              AND eni_calendario = $calendario_apertura;";

            echo "----> ".$updateEstado;
            $this->cnxion->ejecutar($updateEstado);

        }

        public function cierre_formulario(){

            $calendario_apertura = $this->calendario_apertura();

            $updateEstado="UPDATE principal.estado_ninio
                              SET eni_fechamodifico=NOW(), 
                                  eni_personamodifico=".$this->getCodigoEstudiante().", 
                                  eni_estadoproceso=1,
                                  eni_estadodatos=1
                            WHERE eni_estado = 1
                              AND eni_ninio=".$this->getCodigoEstudiante()."
                              AND eni_calendario = $calendario_apertura;";

            echo "----> ".$updateEstado;
            $this->cnxion->ejecutar($updateEstado);

        }
    }
    
?>