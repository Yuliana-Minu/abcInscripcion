<?php
    include('prcsos/nscrpcion/classInscrpcion.php');
    class dtosEstdnte extends Inscripcion{
        private $cnxion;
        private $codigoInscripcion;

        public function __construct(){
            $this->cnxion = Dtbs::getInstance();
            $this->codigoInscripcion=date('YmdHis').rand(99,999);
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
 
        public function codigo_curso_perdido(){

            $sql_codigo_curso_perdido="SELECT MAX(dcp_codigo) AS cod_crso_prddo
                                        FROM principal.datos_cursos_perdidos;";
    
            $query_codigo_curso_perdido=$this->cnxion->ejecutar($sql_codigo_curso_perdido);
    
            $data_codigo_curso_perdido=$this->cnxion->obtener_filas($query_codigo_curso_perdido);
    
            $cod_crso_prddo = $data_codigo_curso_perdido['cod_crso_prddo'];

            if($cod_crso_prddo){
                $codigo_crso_prddo = $cod_crso_prddo + 1;
            }
            else{
                $codigo_crso_prddo = 1;
            }
            return $codigo_crso_prddo;
        }

        public function codigo_estudios_anteriores(){

            $sql_codigo_estudios_anteriores="SELECT MAX(ean_codigo) AS cod_anterior_estudio
                                               FROM principal.estudios_anteriores;";
    
            $query_codigo_estudios_anteriores=$this->cnxion->ejecutar($sql_codigo_estudios_anteriores);
    
            $data_codigo_estudios_anteriores=$this->cnxion->obtener_filas($query_codigo_estudios_anteriores);
    
            $cod_anterior_estudio = $data_codigo_estudios_anteriores['cod_anterior_estudio'];

            if($cod_anterior_estudio){
                $codigo_anteriores_estudio = $cod_anterior_estudio + 1;
            }
            else{
                $codigo_anteriores_estudio = 1;
            }
            return $codigo_anteriores_estudio;
        }

        public function codigo_seguimiento(){

            $sql_codigo_seguimiento="SELECT MAX(sni_codigo) AS cod_segmnto
                                       FROM principal.seguimiento_ninio;";
    
            $query_codigo_seguimiento=$this->cnxion->ejecutar($sql_codigo_seguimiento);
    
            $data_codigo_seguimiento=$this->cnxion->obtener_filas($query_codigo_seguimiento);
    
            $cod_segmnto = $data_codigo_seguimiento['cod_segmnto'];

            if($cod_segmnto){
                $codigo_sgmnto = $cod_segmnto + 1;
            }
            else{
                $codigo_sgmnto = 1;
            }
            return $codigo_sgmnto;
        }

        public function consulta_datos_inscripcion($codigo_ninio, $calendario_apertura){

            $sql_datos_inscricpion="SELECT COUNT(*) AS datainscripcion
                                      FROM principal.datos_inscripcion_ninio
                                     WHERE din_ninio = $codigo_ninio
                                       AND dni_anio = $calendario_apertura;";
 
            $query_datos_inscricpion=$this->cnxion->ejecutar($sql_datos_inscricpion);

            $data_datos_inscricpion=$this->cnxion->obtener_filas($query_datos_inscricpion);

            $dataInscripcion=$data_datos_inscricpion['datainscripcion'];

            return $dataInscripcion;
        }

        public function codigo_matrimonio(){

            $sql_codigo_matrimonio="SELECT MAX(dma_codigo) AS cod_mat
                                      FROM principal.datos_matrimonio;";
 
            $query_codigo_matrimonio=$this->cnxion->ejecutar($sql_codigo_matrimonio);

            $data_codigo_matrimonio=$this->cnxion->obtener_filas($query_codigo_matrimonio);

            $cod_mat = $data_codigo_matrimonio['cod_mat'];

            if($cod_mat){
                $codigo_matri = $cod_mat + 1;
            }
            else{
                $codigo_matri = 1;
            }
            return $codigo_matri;
        }

        public function codigo_recomendacion(){

            $sql_codigo_recomendacion="SELECT MAX(rec_codigo) AS cod_rec
                                        FROM principal.recomendacion;";
 
            $query_codigo_recomendacion=$this->cnxion->ejecutar($sql_codigo_recomendacion);

            $data_codigo_recomendacion=$this->cnxion->obtener_filas($query_codigo_recomendacion);

            $cod_rec = $data_codigo_recomendacion['cod_rec'];

            if($cod_rec){
                $codigo_reco = $cod_rec + 1;
            }
            else{
                $codigo_reco = 1;
            }
            return $codigo_reco;
        }


        public function dtosInscripcion(){
            
            $calendario_apertura = $this->calendario_apertura();

            $updateEstado="UPDATE principal.estado_ninio
                              SET eni_fechamodifico=NOW(), 
                                  eni_personamodifico=".$this->getCodigoEstudiante().", 
                                  eni_estadoproceso=2,
                                  eni_estadodatos=1
                            WHERE eni_estado = 1
                              AND eni_ninio=".$this->getCodigoEstudiante()."
                            AND eni_calendario = $calendario_apertura;";

            $this->cnxion->ejecutar($updateEstado);

            $fecha_nacimiento=$this->getFechaNacimientoEstudiante();

            if($fecha_nacimiento){
                $condicion_nacimiento=", per_fechanacimiento='".$this->getFechaNacimientoEstudiante()."'";
            }
            else{
                $condicion_nacimiento="";
            }

            $updatePersona="UPDATE principal.persona
                               SET per_nombre='".$this->getPrimerNombreEstudiante()."', 
                                   per_primerapellido='".$this->getPrimerApellidoEstudiante()."', 
                                   per_segundoapellido='".$this->getSegundoApellidoEstudiante()."', 
                                   per_personamodifico='".$this->getPersonaSistema()."', 
                                   per_fechamodifico=NOW(), per_identificacion='".$this->getNumeroIdentificacionEstudiante()."', 
                                   per_segundonombre='".$this->getSegundoNombreEstudiante()."', 
                                   per_municipionacimiento=".$this->getMunicipioNaceEstudiante().", 
                                   per_nacionalidad='".$this->getNacionalidadEstudiante()."', 
                                   per_otranacionalidad='".$this->getOtraNacionalidadEstudiante()."',
                                   per_tipoidentificacion=5
                                   $condicion_nacimiento
                             WHERE per_codigo=".$this->getCodigoEstudiante().";";

            $this->cnxion->ejecutar($updatePersona);

            $updateDatosBasicos="UPDATE principal.datos_basicos
                                    SET dba_estadocivil = 0, 
                                        dba_profesion = 0,
                                        dba_direccion='".$this->getDireccionEstudiante()."', 
                                        dba_municipioresidencia=".$this->getMunicipioResidenciaEstudiante().", 
                                        dba_correo='".$this->getCorreoEstudiante()."', 
                                        dba_telefono='".$this->getTelefonoEstudiante()."', 
                                        dba_fechamodifico=NOW(), 
                                        dba_personamodifico=".$this->getCodigoEstudiante().", 
                                        dba_actualizacion=1
                                  WHERE dba_persona=".$this->getCodigoEstudiante().";";

            $this->cnxion->ejecutar($updateDatosBasicos);

            $datosInscripcionV = $this->consulta_datos_inscripcion($this->getCodigoEstudiante(), $calendario_apertura);

            if($datosInscripcionV == 0){
                $insertDatosInscripcion="INSERT INTO principal.datos_inscripcion_ninio(
                                                     din_codigo, 
                                                     din_ninio,
                                                     din_fechacreo, 
                                                     din_fechamodifico, 
                                                     din_personacreo, 
                                                     din_personamodifico,
                                                     dni_anio)
                                             VALUES (".$this->codigoInscripcion.", 
                                                     ".$this->getCodigoEstudiante().", 
                                                     NOW(), 
                                                     NOW(), 
                                                     ".$this->getCodigoEstudiante().",
                                                     ".$this->getCodigoEstudiante().",
                                                     $calendario_apertura);";

                $this->cnxion->ejecutar($insertDatosInscripcion);
            }
            else{
                $tiene_familiar = $this->getTieneFamilarEstudiante();
                if($tiene_familiar){
                    $familiar_tiene = $tiene_familiar;
                }
                else{
                    $familiar_tiene = 0;
                }
    
                $estudio_anterior = $this->getEstudiosAnterioresEstudiante();
                if($estudio_anterior){
                    $anterior_estudio = $estudio_anterior;
                }
                else{
                    $anterior_estudio = 0;
                }
    
                $insertDatosInscripcion="UPDATE principal.datos_inscripcion_ninio
                                            SET din_vivecon ='".$this->getActualmenteViveConEstudiante()."', 
                                                din_tienefamiliar = $familiar_tiene, 
                                                din_parentesco = ".$this->getParentescoEstudiante().", 
                                                din_gradoingresar = '".$this->getGradoIngresarEstudiante()."', 
                                                din_gradoactual = '".$this->getGradoActualEstudiante()."', 
                                                din_estudiaen = '".$this->getEnEstudiante()."', 
                                                din_motivoretiro = '".$this->getMotivoRetiroEstudiante()."', 
                                                din_fechamodifico = NOW(),
                                                din_personamodifico = ".$this->getCodigoEstudiante().", 
                                                din_estudiosanteriores = $anterior_estudio
                                          WHERE din_ninio = ".$this->getCodigoEstudiante()."
                                            AND dni_anio = $calendario_apertura;";

                $this->cnxion->ejecutar($insertDatosInscripcion);

                if($this->getEstudiosAnterioresEstudiante() == 1){
                    $dtos_estudios_antrres = "DELETE FROM principal.estudios_anteriores
                                               WHERE ean_ninio = ".$this->getCodigoEstudiante().";";

                    $this->cnxion->ejecutar($dtos_estudios_antrres);

                    $dtos_crsos_prddos = "DELETE FROM principal.datos_cursos_perdidos
                                           WHERE dcp_ninio = ".$this->getCodigoEstudiante().";";

                    $this->cnxion->ejecutar($dtos_crsos_prddos);

                    $dtos_segimento = "DELETE FROM principal.seguimiento_ninio
                                        WHERE sni_ninio = ".$this->getCodigoEstudiante().";";

                    $this->cnxion->ejecutar($dtos_segimento);

                    if($this->getEducacionAnterior()){

                        foreach ($this->getEducacionAnterior() as $dta_educacion) {
                            $perdio = $dta_educacion['perdio'];
                            $cualPerdio = $dta_educacion['cualPerdio'];
                            $acompaniamieto = $dta_educacion['acompaniamieto'];
                            $estudios_anteriores = $dta_educacion['estudios_anteriores'];

                            $codigo_curso_perdido = $this->codigo_curso_perdido();

                            $sql_cursos_perdidos = "INSERT INTO principal.datos_cursos_perdidos(
                                                                dcp_codigo, 
                                                                dcp_ninio, 
                                                                dcp_haperdido,
                                                                dcp_cual,
                                                                dcp_fechacreo, 
                                                                dcp_fechamodifico, 
                                                                dcp_personacreo, 
                                                                dcp_personamodifico)
                                                        VALUES ($codigo_curso_perdido, 
                                                                ".$this->getCodigoEstudiante().", 
                                                                $perdio, 
                                                                '$cualPerdio', 
                                                                NOW(), 
                                                                NOW(), 
                                                                ".$this->getCodigoEstudiante().", 
                                                                ".$this->getCodigoEstudiante().");";

                            $this->cnxion->ejecutar($sql_cursos_perdidos);

                            if($acompaniamieto){
                                foreach ($acompaniamieto as $dta_acmpnamiento) {
                                    $codigo_acpmpaniamien = $dta_acmpnamiento['codigo_acpmpaniamien'];
                                    $descripcion = $dta_acmpnamiento['descripcion'];

                                    $codigo_seguimiento = $this->codigo_seguimiento();

                                    $sql_sgmnto = "INSERT INTO principal.seguimiento_ninio(
                                                               sni_codigo, 
                                                               sni_ninio, 
                                                               sni_tiposeguimiento, 
                                                               sni_otrosegumiento, 
                                                               sni_fechacreo, 
                                                               sni_fechamodifico, 
                                                               sni_personacreo, 
                                                               sni_personamodifico)
                                                       VALUES ($codigo_seguimiento, 
                                                               ".$this->getCodigoEstudiante().", 
                                                               $codigo_acpmpaniamien, 
                                                               '$descripcion', 
                                                               NOW(), 
                                                               NOW(), 
                                                               ".$this->getCodigoEstudiante().", 
                                                               ".$this->getCodigoEstudiante().");";
                                
                                    $this->cnxion->ejecutar($sql_sgmnto);
                                }
                            }

                            if($estudios_anteriores){
                                foreach ($estudios_anteriores as $dta_estdios_anteriores) {
                                    $grado = $dta_estdios_anteriores['grado'];
                                    $colegio = $dta_estdios_anteriores['colegio'];
                                    $direccion = $dta_estdios_anteriores['direccion'];
                                    $telefono = $dta_estdios_anteriores['telefono'];
                                    $ciudad = $dta_estdios_anteriores['ciudad'];
                                    $anio = $dta_estdios_anteriores['anio'];

                                    $cod_estdio = $this->codigo_estudios_anteriores();

                                    $sql_estdos = "INSERT INTO principal.estudios_anteriores(
                                                               ean_codigo, ean_grado, ean_colegio, 
                                                               ean_direccion, ean_telefono, ean_ciudad, 
                                                               ean_year, ean_fechacreo, ean_fechamodifico, 
                                                               ean_personacreo, ean_personamodifico, 
                                                               ean_ninio)
                                                       VALUES ($cod_estdio, '$grado', '$colegio', 
                                                               '$direccion', '$telefono', '$ciudad', 
                                                               '$anio', NOW(), NOW(), 
                                                               ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().", 
                                                               ".$this->getCodigoEstudiante().");";

                                    $this->cnxion->ejecutar($sql_estdos);
                                }
                            }
                        }
                    }
                }
                else{
                    $dtos_estudios_antrres = "DELETE FROM principal.estudios_anteriores
                                               WHERE ean_ninio = ".$this->getCodigoEstudiante().";";

                    $this->cnxion->ejecutar($dtos_estudios_antrres);

                    $dtos_crsos_prddos = "DELETE FROM principal.datos_cursos_perdidos
                                           WHERE dcp_ninio = ".$this->getCodigoEstudiante().";";

                    $this->cnxion->ejecutar($dtos_crsos_prddos);

                    $dtos_segimento = "DELETE FROM principal.seguimiento_ninio
                                        WHERE sni_ninio = ".$this->getCodigoEstudiante().";";

                    $this->cnxion->ejecutar($dtos_segimento);
                }
            }

            $delete_mtrimonio = "DELETE FROM principal.datos_matrimonio
                                  WHERE dma_ninio = ".$this->getCodigoEstudiante().";";

            $this->cnxion->ejecutar($delete_mtrimonio); 

            $codigo_matrimonio = $this->codigo_matrimonio();

            $insert_matrimonio = "INSERT INTO principal.datos_matrimonio(
                                              dma_codigo, dma_ninio, 
                                              dma_fechamatrimonio, dma_tipomatrimonio, 
                                              dma_cual, dma_vivenjuntos,
                                              dma_fechacreo, dma_fechamodifico, 
                                              dma_personacreo, dma_personamodifico)
                                      VALUES ($codigo_matrimonio, ".$this->getCodigoEstudiante().", 
                                              '".$this->getFechaMatrimonio()."', '".$this->getTipoMatrimonio()."', 
                                              '".$this->getCualMatrimonio()."', '".$this->getVivenJuntosMatrimonio()."', 
                                              NOW(), NOW(), 
                                              ".$this->getCodigoEstudiante().", ".$this->getCodigoEstudiante().");";

            $this->cnxion->ejecutar($insert_matrimonio); 

            $delete_recomendacion = "DELETE FROM principal.recomendacion
                                      WHERE rec_ninio = ".$this->getCodigoEstudiante()."
                                        AND rec_anio = $calendario_apertura ;";

            $this->cnxion->ejecutar($delete_recomendacion); 

            $codigo_recomendacion = $this->codigo_recomendacion();

            $insert_recomendacion = "INSERT INTO principal.recomendacion(
                                                 rec_codigo, rec_ninio, 
                                                 rec_nombre, rec_telefono, 
                                                 rec_celular, rec_fechacreo, 
                                                 rec_fechamodifico, rec_personacreo, 
                                                 rec_personamodifico, rec_motivoeleccion, 
                                                 rec_anio)
                                         VALUES ($codigo_recomendacion, ".$this->getCodigoEstudiante().", 
                                                 '".$this->getNombreRecomendacion()."', '".$this->getTelefonoRecomendacion()."', 
                                                 '".$this->getCelularRecomendacion()."', NOW(), 
                                                 NOW(), ".$this->getCodigoEstudiante().", 
                                                 ".$this->getCodigoEstudiante().", '".$this->getMotivoRecomendacion()."', 
                                                 $calendario_apertura);";

                                                 echo "---> ".$insert_recomendacion;

            $this->cnxion->ejecutar($insert_recomendacion); 
        }
    }
    
?>