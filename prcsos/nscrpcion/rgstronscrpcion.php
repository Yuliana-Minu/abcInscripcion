<?php
include('classInscrpcion.php');

class RgstroInscrpcion extends Inscripcion{
    
        private $updatePersona;
        private $updateDatosBasicos;
        private $insertDatosInscripcion;

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

        private $insertRecomendacion;
        private $insertMatrimonio;

        private $insertCursosPerdidos;

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

        public function buscar_existencia_persona($codigo_buscar){

                $sql_buscar_existencia_persona="SELECT per_codigo, per_nombre, per_primerapellido, 
                                                       per_segundoapellido, per_genero, 
                                                       per_tipoidentificacion, per_identificacion, 
                                                       per_segundonombre,  per_fechanacimiento
                                                  FROM principal.persona
                                                 WHERE per_identificacion = '$codigo_buscar';";
        
                $query_buscar_existencia_persona=$this->cnxion->ejecutar($sql_buscar_existencia_persona);
        
                $data_buscar_existencia_persona=$this->cnxion->obtener_filas($query_buscar_existencia_persona);
        
                $per_codigo=$data_buscar_existencia_persona['per_codigo'];
        
                return $per_codigo;
        }

        public function insertar_inscripcion(){

                $calendario_apertura = $this->calendario_apertura();
                //Estudiante 
                $codigo_estudiante=$this->getCodigoEstudiante();

                $updateEstado="UPDATE principal.estado_ninio
                                   SET eni_fechamodifico=NOW(), 
                                       eni_personamodifico=".$this->getCodigoEstudiante().", 
                                       eni_estadoproceso=1, 
                                       eni_estadodatos=1
                                 WHERE eni_estado = 1
                                    AND eni_ninio=".$this->getCodigoEstudiante()."
                                    AND eni_calendario = $calendario_apertura  ;";

                echo "<br><br> --> ".$updateEstado;
        
                $this->cnxion->ejecutar($updateEstado);

                if($this->getFotoEstudiante()){
                        $condicion_foto_estudiante=", per_foto='".$this->getFotoEstudiante()."'";
                    }
                    else{
                        $condicion_foto_estudiante="";
                    }

                $updatePersona="UPDATE principal.persona
                                   SET per_nombre='".$this->getPrimerNombreEstudiante()."', per_primerapellido='".$this->getPrimerApellidoEstudiante()."', 
                                       per_segundoapellido='".$this->getSegundoApellidoEstudiante()."', per_personamodifico='".$this->getPersonaSistema()."', 
                                       per_fechamodifico=NOW(), per_identificacion='".$this->getNumeroIdentificacionEstudiante()."', 
                                       per_segundonombre='".$this->getSegundoNombreEstudiante()."', per_fechanacimiento='".$this->getFechaNacimientoEstudiante()."', 
                                       per_municipionacimiento=".$this->getMunicipioNaceEstudiante().", 
                                       per_nacionalidad='".$this->getNacionalidadEstudiante()."', per_otranacionalidad='".$this->getOtraNacionalidadEstudiante()."',
                                       per_tipoidentificacion=1
                                       $condicion_foto_estudiante
                                 WHERE per_codigo=".$this->getCodigoEstudiante().";";

                echo "<br><br> --> ".$updatePersona;

                $this->cnxion->ejecutar($updatePersona);

                $updateDatosBasicos="UPDATE principal.datos_basicos
                                        SET dba_estadocivil=0, dba_profesion=0,
                                            dba_direccion='".$this->getDireccionEstudiante()."', dba_municipioresidencia=".$this->getMunicipioResidenciaEstudiante().", 
                                            dba_correo='".$this->getCorreoEstudiante()."', dba_telefono='".$this->getTelefonoEstudiante()."', 
                                            dba_fechamodifico=NOW(), dba_personamodifico=".$this->getPersonaSistema().", dba_actualizacion=1
                                      WHERE dba_persona=".$this->getCodigoEstudiante().";";

                        echo "<br><br> --> ".$updateDatosBasicos;
                $this->cnxion->ejecutar($updateDatosBasicos);

               //Cambios Recientes 
                $tiene_familiar=$this->getTieneFamilarEstudiante();
                if($tiene_familiar){
                        $familiar_tiene=$tiene_familiar;
                }
                else{
                        $familiar_tiene=0;
                }

                $estudio_anterior=$this->getEstudiosAnterioresEstudiante();
                if($estudio_anterior){
                        $anterior_estudio=$estudio_anterior;
                }
                else{
                        $anterior_estudio=0;
                }

                $insertDatosInscripcion="UPDATE principal.datos_inscripcion_ninio
                                            SET din_vivecon='".$this->getActualmenteViveConEstudiante()."', 
                                                din_tienefamiliar=$familiar_tiene, 
                                                din_parentesco=".$this->getParentescoEstudiante().", 
                                                din_gradoingresar='".$this->getGradoIngresarEstudiante()."', 
                                                din_gradoactual='".$this->getGradoActualEstudiante()."', 
                                                din_estudiaen='".$this->getEnEstudiante()."', 
                                                din_motivoretiro='".$this->getMotivoRetiroEstudiante()."', 
                                                din_fechamodifico=NOW(),
                                                din_personamodifico=".$this->getCodigoEstudiante().", 
                                                din_estudiosanteriores=$anterior_estudio
                                          WHERE din_ninio=".$this->getCodigoEstudiante()."
                                                dni_anio=".$calendario_apertura.";";

                echo "<br><br> --> ".$insertDatosInscripcion;
                $this->cnxion->ejecutar($insertDatosInscripcion);

                //datos Estudio Anterios

                $datos_estudio=$this->getEducacionAnterior();

                foreach($datos_estudio as $data_estudios_anteriores){
                        $nombre_grado=$data_estudios_anteriores['nombre_grado'];
                        $nombre_colegio=$data_estudios_anteriores['nombre_colegio'];
                        $nombre_direccion=$data_estudios_anteriores['nombre_direccion'];
                        $numero_telefono=$data_estudios_anteriores['numero_telefono'];
                        $nombre_ciudad=$data_estudios_anteriores['nombre_ciudad'];
                        $numero_year=$data_estudios_anteriores['numero_year'];

                        $codigo_educacionanterior=date('YmdHis').rand(99,99999);

                        $sql_educacion_anterior="INSERT INTO principal.estudios_anteriores(
                                                        ean_codigo, ean_grado, 
                                                        ean_colegio, ean_direccion, 
                                                        ean_telefono, ean_ciudad,
                                                        ean_year, ean_fechacreo, 
                                                        ean_fechamodifico, ean_personacreo, 
                                                        ean_personamodifico, ean_ninio)
                                                VALUES ($codigo_educacionanterior, '$nombre_grado', 
                                                        '$nombre_colegio', '$nombre_direccion',
                                                        '$numero_telefono', '$nombre_ciudad', 
                                                        '$numero_year', NOW(), 
                                                        NOW(), ".$this->getCodigoEstudiante().", 
                                                        ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";

                                                echo "<br><br> --> ".$sql_educacion_anterior;

                                                $this->cnxion->ejecutar($sql_educacion_anterior);
                }


                ///Papa ninio 
                if($this->getIdentificacionPadre()){//Validar si viene la identificacion
                        $buscar_papa = $this->buscar_existencia_persona($this->getIdentificacionPadre());//Validamos que exista la persona
                        if($buscar_papa){//si existe hace lo siguente:
                                $fecha_nacimiento_padre=$this->getFechaNacimientoPadre();

                                if($fecha_nacimiento_padre){//Se valida que venga la fecha de Nacimiento
                                        $padre_fecha_nacimiento=", per_fechanacimiento='$fecha_nacimiento_padre'";
                                }
                                else{
                                        $padre_fecha_nacimiento="";
                                }       
                    
                                if($this->getFotoPadre()){//Se valida que venga la foto
                                         $condicion_foto_padre=", per_foto='".$this->getFotoPadre()."'";
                                }
                                else{
                                        $condicion_foto_padre="";
                                }
                    
                                $actualizarPapa="UPDATE principal.persona
                                                    SET per_nombre='".$this->getPrimerNombrePadre()."', 
                                                        per_segundonombre='".$this->getSegundoNombrePadre()."',
                                                        per_primerapellido='".$this->getPrimerApellidoPadre()."', 
                                                        per_segundoapellido='".$this->getSegundoApellidoPadre()."', 
                                                        per_personamodifico='".$this->getCodigoEstudiante()."', 
                                                        per_fechamodifico=NOW(), 
                                                        per_tipoidentificacion=1, 
                                                        per_identificacion='".$this->getIdentificacionPadre()."' 
                                                        $condicion_foto_padre
                                                        $padre_fecha_nacimiento
                                                    WHERE per_codigo=$buscar_papa;";
                        
                                //echo "<br><br> --> ".$actualizarPapa;
                                $this->cnxion->ejecutar($actualizarPapa);
                
                                $celular_papito=$this->getCelularPadre();
                                if($celular_papito){
                                    $celular_papito=$this->getCelularPadre();
                                }
                                else{
                                    $celular_papito=0;
                                }
                
                                $updateDatosBasicosPapa="UPDATE principal.datos_basicos
                                                            SET dba_direccion='".$this->getDirecionResidenciaPadre()."', 
                                                                dba_correo='".$this->getCorreoPadre()."',
                                                                dba_telefono='".$this->getTelefonoResidenciaPadre()."', 
                                                                dba_celular=$celular_papito, 
                                                                dba_fechamodifico=NOW(),
                                                                dba_personamodifico=".$this->getCodigoEstudiante().",
                                                                dba_ocupacion='".$this->getOcupacionPadre()."'
                                                            WHERE dba_persona=$buscar_papa;";
                
                                $this->cnxion->ejecutar($updateDatosBasicosPapa);
                
                                $updateDatosPapa="UPDATE principal.datos_papas
                                                    SET dpa_vive='".$this->getVivePadre()."', 
                                                        dpa_cargo='".$this->getCargoPadre()."', 
                                                        dpa_empresa='".$this->getEmpresaPadre()."', 
                                                        dpa_direccionoficina='".$this->getDireccionOficinaPadre()."', 
                                                        dpa_telefonooficina='".$this->getTelefonoOficinaPadre()."', 
                                                        dpa_niveleducativo='".$this->getNivelEducativoPadre()."', 
                                                        dba_fechamodifico=NOW(), 
                                                        dba_personamodifico=".$this->getCodigoEstudiante()."
                                                  WHERE pni_papas=$buscar_papa;";
                
                                $this->cnxion->ejecutar($updateDatosPapa);
                        }  
                }   

                if($this->getIdentificacionMadre()){
                        $buscar_mama = $this->buscar_existencia_persona($this->getIdentificacionMadre());//Validamos que exista la persona
                        if($buscar_mama){
                                $fecha_nacimiento_madre=$this->getFechaNacimientoMadre();
                                if($fecha_nacimiento_madre){
                                        $madre_fecha_nacimiento=", per_fechanacimiento='$fecha_nacimiento_madre'";
                                }
                                else{
                                        $madre_fecha_nacimiento="";
                                }
                        
                                if($this->getFotoMadre()){
                                        $condicion_foto_madre=", per_foto='".$this->getFotoMadre()."'";
                                }
                                else{
                                        $condicion_foto_madre="";
                                }

                                $updateMama="UPDATE principal.persona
                                                SET per_nombre='".$this->getPrimerNombreMadre()."', 
                                                    per_segundonombre='".$this->getSegundoNombreMadre()."',
                                                    per_primerapellido='".$this->getPrimerApellidoMadre()."', 
                                                    per_segundoapellido='".$this->getSegundoApellidoMadre()."', 
                                                    per_personamodifico='".$this->getCodigoEstudiante()."', 
                                                    per_fechamodifico=NOW(), 
                                                    per_tipoidentificacion=1, 
                                                    per_identificacion='".$this->getIdentificacionMadre()."'
                                                    $condicion_foto_madre
                                                    $madre_fecha_nacimiento
                                              WHERE per_codigo= $buscar_mama;";
                        
                                $this->cnxion->ejecutar($updateMama);

                                $celular_mamita=$this->getCelularMadre();
                                if($celular_mamita){
                                        $celular_mamita=$this->getCelularMadre();
                                }
                                else{
                                        $celular_mamita=0;
                                }

                                $updateDatosBasicosMama="UPDATE principal.datos_basicos
                                                            SET dba_direccion='".$this->getDirecionResidenciaMadre()."', 
                                                                dba_correo='".$this->getCorreoMadre()."',
                                                                dba_telefono='".$this->getTelefonoResidenciaMadre()."', 
                                                                dba_celular=$celular_mamita, 
                                                                dba_fechamodifico=NOW(),
                                                                dba_personamodifico=".$this->getCodigoEstudiante().",
                                                                dba_ocupacion='".$this->getOcupacionMadre()."'
                                                          WHERE dba_persona= $buscar_mama;";

                                $this->cnxion->ejecutar($updateDatosBasicosMama);

                                $updateDatosMama="UPDATE principal.datos_papas
                                                     SET dpa_vive='".$this->getViveMadre()."', 
                                                         dpa_cargo='".$this->getCargoMadre()."', 
                                                         dpa_empresa='".$this->getEmpresaMadre()."', 
                                                         dpa_direccionoficina='".$this->getDireccionOficinaMadre()."', 
                                                         dpa_telefonooficina='".$this->getTelefonoOficinaMadre()."', 
                                                         dpa_niveleducativo='".$this->getNivelEducativoMadre()."', 
                                                         dba_fechamodifico=NOW(), 
                                                         dba_personamodifico=".$this->getCodigoEstudiante()."
                                                   WHERE dpa_papa=$buscar_mama;";

                                $this->cnxion->ejecutar($updateDatosMama);

                        }
                }
              
                /***Datos Matrimonio *******/
                $fecha_matrimonio=$this->getFechaMatrimonio();
                if($fecha_matrimonio){
                        $matri_fecha=", dma_fechamatrimonio='$fecha_matrimonio'";
                }
                else{
                        $matri_fecha="";
                }

                $insertMatrimonio="UPDATE principal.datos_matrimonio
                                        SET dma_tipomatrimonio='".$this->getTipoMatrimonio()."', 
                                        dma_cual='".$this->getCualMatrimonio()."', 
                                        dma_vivenjuntos='".$this->getVivenJuntosMatrimonio()."', 
                                        dma_fechamodifico=NOW(),
                                        dma_personamodifico=$codigo_estudiante
                                         $matri_fecha
                                        WHERE dma_ninio=$codigo_estudiante;";

                        echo "<br><br> --> ".$insertMatrimonio;
                $this->cnxion->ejecutar($insertMatrimonio);
                /*********** */

                /***Recomendacion  ********** */
                $insertRecomendacion="UPDATE principal.recomendacion
                                     SET rec_nombre='".$this->getNombreRecomendacion()."', 
                                         rec_telefono='".$this->getTelefonoRecomendacion()."', 
                                         rec_celular='".$this->getCelularRecomendacion()."', 
                                         rec_fechamodifico=NOW(), 
                                         rec_personamodifico=".$this->getCodigoEstudiante().", 
                                         rec_motivoeleccion='".$this->getMotivoRecomendacion()."'
                                   WHERE rec_ninio=".$this->getCodigoEstudiante()."
                                   AND rec_anio = $calendario_apertura;";

                echo "<br><br> --> ".$insertRecomendacion;
                $this->cnxion->ejecutar($insertRecomendacion);
                /********** */



                $insertCursosPerdidos="INSERT INTO principal.datos_cursos_perdidos(
                                                   dcp_codigo, dcp_ninio, 
                                                   dcp_haperdido, dcp_cual, 
                                                   dcp_fechacreo, dcp_fechamodifico, 
                                                   dcp_personacreo, dcp_personamodifico)
                                           VALUES (".$this->codigoCursoPerdido.", ".$this->getCodigoEstudiante().",
                                                   ".$this->getHaPerdidoCurso().", '".$this->getCualPerdio()."', 
                                                   NOW(), NOW(),
                                                   ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";

                echo "<br><br> --> ".$insertCursosPerdidos;
                $this->cnxion->ejecutar($insertCursosPerdidos);

                $acompaniamiento=$this->getSegumientoNinio();
                
                if(!empty($acompaniamiento)){
                        for ($inicio=0; $inicio < count($acompaniamiento) ; $inicio++) {
                                
                                $sni_codigo[$inicio]=date('YmdHis').rand(99,99999);

                                if($acompaniamiento[$inicio]==4){
                                        $sni_otrosegumiento=$this->getCualSeguimientoNinio();
                                }
                                else{
                                        $sni_otrosegumiento="";
                                }

                                $insertSegumiento[$inicio]="INSERT INTO principal.seguimiento_ninio(
                                                                        sni_codigo, sni_ninio, 
                                                                        sni_tiposeguimiento, sni_otrosegumiento, 
                                                                        sni_fechacreo, sni_fechamodifico,
                                                                        sni_personacreo, sni_personamodifico)
                                                                VALUES ($sni_codigo[$inicio], ".$this->getCodigoEstudiante().", 
                                                                        $acompaniamiento[$inicio], '$sni_otrosegumiento', 
                                                                        NOW(), NOW(),
                                                                        ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";
                                        echo "<br> --->".$insertSegumiento[$inicio];
                                $this->cnxion->ejecutar($insertSegumiento[$inicio]);

                        }
                }

               
                

        }
        
}
?>