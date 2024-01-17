<?php 
    include('prcsos/nscrpcion/classMtrcla.php');
    class dtosEstdnte extends Matricula {
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

        public function info_ninio(){
            $calendario_apertura = $this->calendario_apertura();

            $updateEstado="UPDATE principal.estado_ninio
                              SET eni_fechamodifico=NOW(), 
                                  eni_personamodifico=".$this->getCodigoEstudiante().", 
                                  eni_estadoproceso=2,
                                  eni_estadodatos=1
                            WHERE eni_estado = 2
                              AND eni_ninio=".$this->getCodigoEstudiante()."
                              AND eni_calendario = $calendario_apertura;";

            $this->cnxion->ejecutar($updateEstado);

            $fecha_nacimiento_ninio=$this->getFechaNacimientoEstudiante();

            if($fecha_nacimiento_ninio){
                $condicion_fecha_nacimiento=", per_fechanacimiento='$fecha_nacimiento_ninio'";
            }
            else{
                $condicion_fecha_nacimiento="";
            }

            $municipio_nacimientoninio=$this->getMunicipioNaceEstudiante();
            if($municipio_nacimientoninio){
                $munnaceninio=$municipio_nacimientoninio;
            }
            else{
                $municipio_nacimientoninio=0;
            }

            $updatePersona="UPDATE principal.persona
                               SET per_nombre='".$this->getPrimerNombreEstudiante()."', 
                                   per_primerapellido='".$this->getPrimerApellidoEstudiante()."', 
                                   per_segundoapellido='".$this->getSegundoApellidoEstudiante()."', 
                                   per_personamodifico='".$this->getCodigoEstudiante()."', 
                                   per_fechamodifico=NOW(), 
                                   per_segundonombre='".$this->getSegundoNombreEstudiante()."',
                                   per_municipionacimiento=$municipio_nacimientoninio, 
                                   per_nacionalidad='".$this->getNacionalidadEstudiante()."', 
                                   per_otranacionalidad='".$this->getOtraNacionalidadEstudiante()."',
                                   per_tipoidentificacion=".$this->getTipoIdentificacionEstudiante()."
                                   $condicion_fecha_nacimiento
                             WHERE per_codigo=".$this->getCodigoEstudiante().";";

            $this->cnxion->ejecutar($updatePersona);

            if($this->getCelularEstudiante()){
                $celular_ninio=$this->getCelularEstudiante();
            }
            else{
                $celular_ninio=0;
            }

            if($this->getSisbenEstudiante()){
                $sisben_ninio=$this->getSisbenEstudiante();
            }
            else{
                $sisben_ninio=0;
            }

            $updateDatosBasicos="UPDATE principal.datos_basicos
                                    SET dba_estadocivil=0, 
                                        dba_profesion=0,
                                        dba_direccion='".$this->getDireccionEstudiante()."', 
                                        dba_municipioresidencia=".$this->getMunicipioResidenciaEstudiante().", 
                                        dba_correo='".$this->getCorreoEstudiante()."', 
                                        dba_telefono='".$this->getTelefonoEstudiante()."', 
                                        dba_fechamodifico=NOW(), 
                                        dba_personamodifico=".$this->getCodigoEstudiante().", 
                                        dba_actualizacion=1,
                                        dba_celular=$celular_ninio, 
                                        dba_eps=".$this->getEpsEstudiante().",
                                        dba_sisben=$sisben_ninio, 
                                        dba_rh=".$this->getRhEstudiante().",
                                        dba_estrato='".$this->getEstratoEstudiante()."', 
                                        dba_lugarexpedicion='".$this->getLugarExpedicionEstudiante()."'
                                  WHERE dba_persona=".$this->getCodigoEstudiante().";";

            $this->cnxion->ejecutar($updateDatosBasicos);

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

        }
    }
    
?>