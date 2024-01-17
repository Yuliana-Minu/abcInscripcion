<?php
include('classMtrcla.php');

class RgstroMtrcula extends Matricula{
    
        private $updatePersona;
        private $updateDatosBasicos;
        private $insertMatricula;
        private $insertFirmaNinio;

        private $insertMama;
        private $insertDatosBasicosMama;
        private $insertDatosMama;
        private $insertMamaNinio;
        private $insertPerfilMama;

        private $insertPapa;
        private $insertDatosBasicosPapa;
        private $insertDatosPapa;
        private $insertPapaNinio;
        private $insertPerfilPapa;

        private $insertAcudiente;
        private $insertDatosBasicosAcudiente;
        private $insertDatosAcudiente;
        private $insertAcudienteNinio;
        private $insertPerfilAcudiente;

        private $insertRecomendacion;
        private $insertMatrimonio;

        private $insertCursosPerdidos;

        private $codigoMatricula;

        //private $codigoFirma;

        private $codigoCursoPerdido;

        private $codigoInscripcion;

        private $codigoPapa;
        private $codigoDatosBasicosPapa;
        private $codigoDatosPapa;
        private $codigoPapaNinio;
        private $codigoPerfilPapa;

        private $codigoMama;
        private $codigoDatosBasicosMama;
        private $codigoDatosMama;
        private $codigoMamaNinio;
        private $codigoPerfilMama;

        private $codigoAcudiente;
        private $codigoDatosBasicosAcudiente;
        private $codigoDatosAcudiente;
        private $codigoAcudienteNinio;
        private $codigoPerfilAcudiente;


        private $codigoRecomendacion;

        private $codigoMatrimonio;




        public function __construct(){
                $this->cnxion = Dtbs::getInstance();

                $this->codigoInscripcion=date('YmdHis').rand(99,999);

                $this->codigoPapa=date('YmdHis').rand(99,999);
                $this->codigoDatosBasicosPapa=date('YmdHis').rand(99,999);
                $this->codigoDatosPapa=date('YmdHis').rand(99,999);
                $this->codigoPapaNinio=date('YmdHis').rand(99,999);
                $this->codigoPerfilPapa=date('YmdHis').rand(99,999);

                $this->codigoMama=date('YmdHis').rand(99,999);
                $this->codigoDatosBasicosMama=date('YmdHis').rand(99,999);
                $this->codigoDatosMama=date('YmdHis').rand(99,999);
                $this->codigoMamaNinio=date('YmdHis').rand(99,999);
                $this->codigoPerfilMama=date('YmdHis').rand(99,999);

                $this->codigoAcudiente=date('YmdHis').rand(99,999);
                $this->codigoDatosBasicosAcudiente=date('YmdHis').rand(99,999);
                $this->codigoDatosAcudiente=date('YmdHis').rand(99,999);
                $this->codigoAcudienteNinio=date('YmdHis').rand(99,999);
                $this->codigoPerfilAcudiente=date('YmdHis').rand(99,999);

                $this->codigoMatricula=date('YmdHis').rand(99,999);

                $this->codigoCursoPerdido=date('YmdHis').rand(99,999);

                $this->codigoRecomendacion=date('YmdHis').rand(99,999);


                $this->codigoMatrimonio=date('YmdHis').rand(99,999);
        }

        public function ninio_padres($codigo_ninio, $parentesco){

                $sql_ninio_padres="SELECT pni_codigo, pni_papas, pni_ninio,pni_tipo 
                                     FROM principal.papas_ninios
                                    WHERE pni_ninio=$codigo_ninio
                                      AND pni_tipo=$parentesco;";
        
                $query_ninio_padres=$this->cnxion->ejecutar($sql_ninio_padres);
        
                $data_ninio_padres=$this->cnxion->obtener_filas($query_ninio_padres);
        
                $pni_papas=$data_ninio_padres['pni_papas'];
        
                return $pni_papas;
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

        public function insert_matricula(){

                //Estudiante 
                $calendario_apertura = $this->calendario_apertura();

                $updateEstado="UPDATE principal.estado_ninio
                                  SET eni_fechamodifico=NOW(), 
                                      eni_personamodifico=".$this->getCodigoEstudiante().", 
                                      eni_estadoproceso=1,
                                      eni_estadodatos=1
                                WHERE eni_estado = 2
                                  AND eni_ninio=".$this->getCodigoEstudiante()."
                                  AND eni_calendario = $calendario_apertura;";

                echo "<br><br> --> ".$updateEstado;
        
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

                if($this->getFotoEstudiante()){
                        $condicion_foto_estudiante=", per_foto='".$this->getFotoEstudiante()."'";
                }
                else{
                        $condicion_foto_estudiante="";
                }

                $updatePersona="UPDATE principal.persona
                                        SET per_nombre='".$this->getPrimerNombreEstudiante()."', 
                                        per_primerapellido='".$this->getPrimerApellidoEstudiante()."', 
                                        per_segundoapellido='".$this->getSegundoApellidoEstudiante()."', 
                                        per_personamodifico='".$this->getCodigoEstudiante()."', 
                                        per_fechamodifico=NOW(), 
                                        per_identificacion='".$this->getNumeroIdentificacionEstudiante()."', 
                                        per_segundonombre='".$this->getSegundoNombreEstudiante()."',
                                        per_municipionacimiento=$municipio_nacimientoninio, 
                                        per_nacionalidad='".$this->getNacionalidadEstudiante()."', 
                                        per_otranacionalidad='".$this->getOtraNacionalidadEstudiante()."',
                                        per_tipoidentificacion=".$this->getTipoIdentificacionEstudiante()."
                                        $condicion_fecha_nacimiento
                                        $condicion_foto_estudiante
                                WHERE per_codigo=".$this->getCodigoEstudiante().";";

                echo "<br><br> --> ".$updatePersona;

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

                echo "<br><br> --> ".$updateDatosBasicos;
                $this->cnxion->ejecutar($updateDatosBasicos);



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
                                        dma_personamodifico=".$this->getCodigoEstudiante()."
                                        $condicion_fecha_prematricula
                                  WHERE dma_ninio=".$this->getCodigoEstudiante()."
                                    AND dma_anio=".$calendario_apertura.";";

                echo " <br><br> Datos Pre Matricula--> ".$insertMatricula;

                $this->cnxion->ejecutar($insertMatricula);

                $codigo_estudiante=$this->getCodigoEstudiante();
                //Datos Papá
                $papa_nininio=$this->ninio_padres($codigo_estudiante, 1);


                if($this->getFechaNacimientoPadre()){
                        $condicion_fechanacimiento=", per_fechanacimiento='".$this->getFechaNacimientoPadre()."'";
                }
                else{
                        $condicion_fechanacimiento="";
                }

                if($this->getMunicipioPadre()){
                        $munnacepadre=$this->getMunicipioPadre();
                }
                else{
                        $munnacepadre=0;
                }

                if($this->getFotoPadre()){
                        $condicion_foto_padre=", per_foto='".$this->getFotoPadre()."'";
                }
                        else{
                $condicion_foto_padre="";
                }
                //Datos Informacion Padre 
                $insertPapa="UPDATE principal.persona
                                SET per_nombre='".$this->getPrimerNombrePadre()."', 
                                per_primerapellido='".$this->getPrimerApellidoPadre()."',
                                per_segundoapellido='".$this->getSegundoApellidoPadre()."', 
                                per_personamodifico= ".$this->getCodigoEstudiante().", 
                                per_fechamodifico=NOW(), 
                                per_identificacion='".$this->getIdentificacionPadre()."',
                                per_segundonombre='".$this->getSegundoNombrePadre()."', 
                                per_municipionacimiento=$munnacepadre,                                  
                                per_nacionalidad='".$this->getNacionalidadPadre()."', 
                                per_otranacionalidad='".$this->getCualNacionalidadPadre()."',
                                per_tipoidentificacion=1
                                $condicion_fechanacimiento
                                $condicion_foto_padre
                        WHERE per_codigo=$papa_nininio;";
        
                echo "<br><br> --> ".$insertPapa;
                $this->cnxion->ejecutar($insertPapa);

                if($this->getCelularPadre()){
                $celular_papa=$this->getCelularPadre();
                }
                else{
                $celular_papa=0;
                }

                $insertDatosBasicosPapa="UPDATE principal.datos_basicos
                                        SET dba_correo='".$this->getCorreoPadre()."', 
                                                dba_telefono='".$this->getTelefonoResidenciaPadre()."', 
                                                dba_celular=".$celular_papa.",  
                                                dba_fechamodifico=NOW(), 
                                                dba_personamodifico=".$this->getCodigoEstudiante().", 
                                                dba_ocupacion='".$this->getOcupacionPadre()."'
                                        WHERE dba_persona=$papa_nininio;";

                echo "<br><br> --> ".$insertDatosBasicosPapa;
                $this->cnxion->ejecutar($insertDatosBasicosPapa);
        

                $insertDatosPapa="UPDATE principal.datos_papas
                                        SET dpa_cargo='".$this->getCargoPadre()."', 
                                        dpa_empresa='".$this->getEmpresaPadre()."', 
                                        dba_fechamodifico=NOW(), 
                                        dba_personamodifico=".$this->getCodigoEstudiante()."
                                WHERE dpa_papa=$papa_nininio;";

                echo "<br><br> --> ".$insertDatosPapa;
                $this->cnxion->ejecutar($insertDatosPapa);
        
                $mama_nininio=$this->ninio_padres($codigo_estudiante, 2);

                if($this->getFechaNacimientoMadre()){
                        $condicion_nacimientoMadre=", per_fechanacimiento='".$this->getFechaNacimientoMadre()."'";
                }
                else{
                        $condicion_nacimientoMadre="";
                }

                if($this->getMunicipioMadre()){
                        $munnacemadre=$this->getMunicipioMadre();
                }
                else{
                        $munnacemadre=0;
                }

                if($this->getFotoMadre()){
                        $condicion_foto_madre=", per_foto='".$this->getFotoMadre()."'";
                }
                else{
                        $condicion_foto_madre="";
                }
                //Datos Informacion Madre 
                $insertMama="UPDATE principal.persona
                                SET per_nombre='".$this->getPrimerNombreMadre()."', 
                                per_primerapellido='".$this->getPrimerApellidoMadre()."',
                                per_segundoapellido='".$this->getSegundoApellidoMadre()."', 
                                per_personamodifico= ".$this->getCodigoEstudiante().", 
                                per_fechamodifico=NOW(), 
                                per_identificacion='".$this->getIdentificacionMadre()."',
                                per_segundonombre='".$this->getSegundoNombreMadre()."', 
                                per_municipionacimiento=$munnacemadre, 
                                per_nacionalidad='".$this->getNacionalidadMadre()."',
                                per_otranacionalidad='".$this->getCualNacionalidadMadre()."',
                                per_tipoidentificacion=1
                                $condicion_nacimientoMadre
                                $condicion_foto_madre
                                WHERE per_codigo=$mama_nininio;";

                echo "<br><br> --> ".$insertMama;
                $this->cnxion->ejecutar($insertMama);

                if($this->getCelularMadre()){
                        $celularMadre=$this->getCelularMadre();
                }
                else{
                        $celularMadre=0;
                }

                $insertDatosBasicosMama="UPDATE principal.datos_basicos
                                        SET dba_correo='".$this->getCorreoMadre()."', 
                                                dba_telefono='".$this->getTelefonoResidenciaMadre()."', 
                                                dba_celular=$celularMadre,  
                                                dba_fechamodifico=NOW(), 
                                                dba_personamodifico=".$this->getCodigoEstudiante().", 
                                                dba_ocupacion='".$this->getOcupacionMadre()."'
                                        WHERE dba_persona=$mama_nininio";

                echo "<br><br> --> ".$insertDatosBasicosMama;
                $this->cnxion->ejecutar($insertDatosBasicosMama);


                
                $insertDatosMama="UPDATE principal.datos_papas
                                SET dpa_cargo='".$this->getCargoMadre()."', 
                                        dpa_empresa='".$this->getEmpresaMadre()."', 
                                        dba_fechamodifico=NOW(), 
                                        dba_personamodifico=".$this->getCodigoEstudiante()."
                                WHERE dpa_papa=$mama_nininio;";

                echo "<br><br> --> ".$insertDatosMama;
                $this->cnxion->ejecutar($insertDatosMama); 
                
        
                //Acudiente
                $acudiente_nininio=$this->ninio_padres($codigo_estudiante, 3);

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

                if($this->getFotoAcudiente()){
                        $condicion_foto_acudiente=", per_foto='".$this->getFotoAcudiente()."'";
                }
                else{
                        $condicion_foto_acudiente="";
                }
                //Datos Informacion Acudiente 
                $insertAcudiente="UPDATE principal.persona
                                SET per_nombre='".$this->getPrimerNombreAcudiente()."', 
                                per_primerapellido='".$this->getPrimerApellidoAcudiente()."',
                                per_segundoapellido='".$this->getSegundoApellidoAcudiente()."', 
                                per_personamodifico= ".$this->getCodigoEstudiante().", 
                                per_fechamodifico=NOW(), 
                                per_identificacion='".$this->getIdentificacionAcudiente()."',
                                per_segundonombre='".$this->getSegundoNombreAcudiente()."', 
                                per_municipionacimiento=$munnaceacudiente, 
                                per_nacionalidad='".$this->getNacionalidadAcudiente()."',
                                per_otranacionalidad='".$this->getCualNacionalidadAcudiente()."',
                                per_tipoidentificacion=1
                                $condicion_nacimientoAcudiente
                                $condicion_foto_acudiente
                                WHERE per_codigo=$acudiente_nininio;";

                echo "<br><br> --> ".$insertAcudiente;
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
                                        WHERE dba_persona=$acudiente_nininio";

                echo "<br><br> --> ".$insertDatosBasicosAcudiente;
                $this->cnxion->ejecutar($insertDatosBasicosAcudiente);

        
                $insertDatosAcudiente="UPDATE principal.datos_papas
                                SET dpa_cargo='".$this->getCargoAcudiente()."', 
                                        dpa_empresa='".$this->getEmpresaAcudiente()."', 
                                        dba_fechamodifico=NOW(), 
                                        dba_personamodifico=".$this->getCodigoEstudiante()."
                                WHERE dpa_papa=$acudiente_nininio;";

                echo "<br><br> --> ".$insertDatosAcudiente;
                $this->cnxion->ejecutar($insertDatosAcudiente); 
                

        }
        
}
?>