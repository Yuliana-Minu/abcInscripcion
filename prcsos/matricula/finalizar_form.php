<?php
    include('prcsos/nscrpcion/classMtrcla.php');
    class FinalizarFormulario extends Matricula{
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
                            WHERE eni_estado = 2
                              AND eni_ninio=".$this->getCodigoEstudiante()."
                              AND eni_calendario = $calendario_apertura;";

            $this->cnxion->ejecutar($updateEstado);
        }

        public function datos_matricula_ninio($codigo_ninio, $calendario_apertura){

            $sql_datos_matricula_ninio="SELECT dma_codigo, dma_ninio, dma_estado
                                          FROM principal.datos_matricula
                                         WHERE dma_ninio = $codigo_ninio
                                           AND dma_anio = $calendario_apertura";
    
            $query_datos_matricula_ninio=$this->cnxion->ejecutar($sql_datos_matricula_ninio);
    
            $data_datos_matricula_ninio=$this->cnxion->obtener_filas($query_datos_matricula_ninio);
    
            $dma_codigo = $data_datos_matricula_ninio['dma_codigo'];
    
            return $dma_codigo;
        }

        public function cierre_formulario(){

            $calendario_apertura = $this->calendario_apertura();

            $datos_matricula_ninio = $this->datos_matricula_ninio($this->getCodigoEstudiante(), $calendario_apertura);
            if($datos_matricula_ninio){
                if($this->getFechaPreMariculaEstudiante()){
                    $condicion_fecha_prematricula=", dma_fechamatricula='".$this->getFechaPreMariculaEstudiante()."'";
                }
                else{
                    $condicion_fecha_prematricula="";
                }

                $insertMatricula="UPDATE principal.datos_matricula
                                     SET dma_gradoingresar=".$this->getGradoIngresarEstudiante().", 
                                         dma_estado=1, 
                                         dma_fechamodifico=NOW(), 
                                         dma_personamodifico=".$this->getCodigoEstudiante().",
                                         dma_anio = $calendario_apertura
                                         $condicion_fecha_prematricula
                                   WHERE dma_ninio=".$this->getCodigoEstudiante().";";

                $this->cnxion->ejecutar($insertMatricula);
            }
            else{
                $codigoInscripcion = date('YmdHis').rand(99,999);
                if($this->getFechaPreMariculaEstudiante()){
                    $columna=",dma_fechamatricula";
                    $dto = ",'".$this->getFechaPreMariculaEstudiante()."'";
                }
                else{
                    $columna="";
                    $dto ="";
                }

                $insertMatricula="INSERT INTO principal.datos_matricula(
                                    dma_codigo, 
                                    dma_ninio, 
                                    dma_gradoingresar, 
                                    dma_fechacreo, 
                                    dma_fechamodifico, 
                                    dma_personacreo, 
                                    dma_personamodifico,
                                    dma_anio,
                                    dma_estado
                                    $columna)
                            VALUES ($codigoInscripcion, 
                                    ".$this->getCodigoEstudiante().",
                                    ".$this->getGradoIngresarEstudiante().",
                                    NOW(),
                                    NOW(), 
                                    ".$this->getCodigoEstudiante().", 
                                    ".$this->getCodigoEstudiante().",
                                    $calendario_apertura,
                                    1
                                    $dto);";

                $this->cnxion->ejecutar($insertMatricula);
            }

            $updateEstado="UPDATE principal.estado_ninio
                              SET eni_fechamodifico=NOW(), 
                                  eni_personamodifico=".$this->getCodigoEstudiante().", 
                                  eni_estadoproceso=1,
                                  eni_estadodatos=1
                            WHERE eni_estado = 2
                              AND eni_ninio=".$this->getCodigoEstudiante()."
                              AND eni_calendario = $calendario_apertura;";

            echo "----> ".$updateEstado;
            $this->cnxion->ejecutar($updateEstado);

        }
    }
    
?>