<?php 
    include('prcsos/nscrpcion/classMtrcla.php');
    class dtosAcudiente extends Matricula {
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

        public function datos_papas($codigo_papas){

            $sql_datos_papas=" SELECT dpa_codigo, dpa_papa, dpa_vive, 
                                      dpa_cargo, dpa_empresa, dpa_direccionoficina, 
                                      dpa_telefonooficina, dpa_niveleducativo 
                                 FROM principal.datos_papas
                                WHERE dpa_papa = $codigo_papas";
    
            $query_datos_papas=$this->cnxion->ejecutar($sql_datos_papas);
    
            while($data_datos_papas=$this->cnxion->obtener_filas($query_datos_papas)){
                $datadatos_papas[]=$data_datos_papas;
            }
            return $datadatos_papas;
        }

        public function info_acudiente(){
            if($this->getFechaNacimientoAcudiente()){
                $condicion_nacimientoAcudiente=", per_fechanacimiento='".$this->getFechaNacimientoAcudiente()."'";
            }
            else{
                $condicion_nacimientoAcudiente="";
            }

            if($this->getMunicipioAcudiente()){
                $munnaceacudiente=$this->getMunicipioAcudiente();
            }
            else{
                $munnaceacudiente=0;
            }

            $insertAcudiente="UPDATE principal.persona
                                SET per_nombre='".$this->getPrimerNombreAcudiente()."', 
                                    per_primerapellido='".$this->getPrimerApellidoAcudiente()."',
                                    per_segundoapellido='".$this->getSegundoApellidoAcudiente()."', 
                                    per_personamodifico= ".$this->getCodigoEstudiante().", 
                                    per_fechamodifico=NOW(), 
                                    per_segundonombre='".$this->getSegundoNombreAcudiente()."', 
                                    per_municipionacimiento=$munnaceacudiente, 
                                    per_nacionalidad='".$this->getNacionalidadAcudiente()."',
                                    per_otranacionalidad='".$this->getCualNacionalidadAcudiente()."',
                                    per_tipoidentificacion=1
                                    $condicion_nacimientoAcudiente
                            WHERE per_codigo=".$this->getCodigoAcudiente().";";

            $this->cnxion->ejecutar($insertAcudiente);

            if($this->getCelularAcudiente()){
                $celularAcudiente=$this->getCelularAcudiente();
            }
            else{
                $celularAcudiente=0;
            }

            $insertDatosBasicosAcudiente="UPDATE principal.datos_basicos
                                        SET dba_correo='".$this->getCorreoAcudiente()."', 
                                            dba_telefono='".$this->getTelefonoResidenciaAcudiente()."', 
                                            dba_celular=$celularAcudiente,  
                                            dba_fechamodifico=NOW(), 
                                            dba_personamodifico=".$this->getCodigoEstudiante().", 
                                            dba_ocupacion='".$this->getOcupacionAcudiente()."'
                                      WHERE dba_persona=".$this->getCodigoAcudiente().";";

            $this->cnxion->ejecutar($insertDatosBasicosAcudiente);

            $datosAcu = $this->datos_papas($this->getCodigoAcudiente());
            if($datosAcu){
                $insertDatosAcudiente="UPDATE principal.datos_papas
                                          SET dpa_cargo='".$this->getCargoAcudiente()."', 
                                              dpa_empresa='".$this->getEmpresaAcudiente()."', 
                                              dba_fechamodifico=NOW(), 
                                              dba_personamodifico=".$this->getCodigoEstudiante()."
                                        WHERE dpa_papa=".$this->getCodigoAcudiente().";";

                $this->cnxion->ejecutar($insertDatosAcudiente); 
            }
            else{
                $codigoDatosAcudiente = date('YmdHis').rand(99,999);
                $insertDatosAcudiente="INSERT INTO principal.datos_papas(
                                    dpa_codigo, dpa_papa, 
                                    dba_fechacreo, dba_fechamodifico, 
                                    dba_personacreo, dba_personamodifico)
                            VALUES ($codigoDatosAcudiente, ".$this->getCodigoAcudiente().", 
                                    NOW(), NOW(), 
                                    ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";

                $this->cnxion->ejecutar($insertDatosAcudiente);
            }
        }
    }
    
?>