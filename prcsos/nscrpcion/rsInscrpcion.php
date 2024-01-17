<?php
class RsInscripcion {

    private $cnxion;

    public function __construct(){
        $this->cnxion = Dtbs::getInstance();
    }

    public function datos_estudiante($per_codigo){

        $sql_datos_estudiante="SELECT per_codigo, per_nombre, 
                                      per_primerapellido, per_segundoapellido, 
                                      per_personacreo, per_personamodifico, 
                                      per_fechacreo, per_fechamodifico, 
                                      per_genero, per_tipoidentificacion, 
                                      per_identificacion, per_estado, 
                                      per_segundonombre, per_fechanacimiento, 
                                      per_municipionacimiento, per_aleatoreo, 
                                      dba_municipioresidencia, dba_correo, 
                                      dba_telefono, dba_celular,
                                      dba_lugarexpedicion, dba_direccion,
                                      per_foto, per_nacionalidad, 
                                      per_otranacionalidad
                                 FROM principal.persona, principal.datos_basicos
                                WHERE CAST(per_codigo as bigint)=dba_persona
                                  AND CAST(per_codigo as bigint)=$per_codigo;";

        $query_datos_estudiante=$this->cnxion->ejecutar($sql_datos_estudiante);

        while($data_datos_estudiante=$this->cnxion->obtener_filas($query_datos_estudiante)){
            $datadatos_estudiante[]=$data_datos_estudiante;
        }
        return $datadatos_estudiante;
    }

    public function lista_grado(){

        $sql_lista_grado="SELECT gra_codigo, gra_nombre, gra_estado
                            FROM principal.grado;";

        $query_lista_grado=$this->cnxion->ejecutar($sql_lista_grado);

        while($data_lista_grado=$this->cnxion->obtener_filas($query_lista_grado)){
            $datalista_grado[]=$data_lista_grado;
        }
        return $datalista_grado;
    }

    public function parentesco(){

        $sql_parentesco="SELECT par_codigo, par_nombre, par_estado
                           FROM principal.parentesco;";

        $query_parentesco=$this->cnxion->ejecutar($sql_parentesco);

        while($data_parentesco=$this->cnxion->obtener_filas($query_parentesco)){
            $dataparentesco[]=$data_parentesco;
        }
        return $dataparentesco;
    }

    public function list_municipios($codigo_departamento){

        $sql_list_municipios="SELECT mun_codigo, mun_nombre, mun_dane
                                FROM principal.municipio
                               INNER JOIN principal.departamento ON principal.municipio.dep_codigo = CAST(dep_dane AS BIGINT)
                               WHERE principal.departamento.dep_codigo = $codigo_departamento
                               ORDER BY mun_nombre ASC";

        $query_list_municipios=$this->cnxion->ejecutar($sql_list_municipios);

        while($data_list_municipios=$this->cnxion->obtener_filas($query_list_municipios)){
            $datalist_municipios[]=$data_list_municipios;
        }
        return $datalist_municipios;
    }


    public function select_departamento(){

        $sql_select_departamento="SELECT dep_codigo, dep_nombre, dep_dane
                             FROM principal.departamento
                             ORDER BY dep_nombre ASC;";

        $query_select_departamento=$this->cnxion->ejecutar($sql_select_departamento);

        while($data_select_departamento=$this->cnxion->obtener_filas($query_select_departamento)){
            $dataselect_departamento[]=$data_select_departamento;
        }
        return $dataselect_departamento;

    }

    public function select_municipio($departamento){

        $sql_select_municipio="SELECT mun_codigo, mun_nombre, dep_codigo, mun_dane
                          FROM principal.municipio
                          WHERE dep_codigo=$departamento
                         ORDER BY mun_nombre ASC;";

        $query_select_municipio=$this->cnxion->ejecutar($sql_select_municipio);

        while($data_select_municipio=$this->cnxion->obtener_filas($query_select_municipio)){
            $dataselect_municipio[]=$data_select_municipio;
        }
        return $dataselect_municipio;
    }

    public function departamento_residencia(){

        $sql_departamento_residencia="SELECT dep_codigo, dep_nombre, dep_dane
                             FROM principal.departamento
                             ORDER BY dep_nombre ASC;";

        $query_departamento_residencia=$this->cnxion->ejecutar($sql_departamento_residencia);

        while($data_departamento_residencia=$this->cnxion->obtener_filas($query_departamento_residencia)){
            $datadepartamento_residencia[]=$data_departamento_residencia;
        }
        return $datadepartamento_residencia;

    }

    public function municipio_residencia($departamento){

        $sql_municipio_residencia="SELECT mun_codigo, mun_nombre, dep_codigo, mun_dane
                          FROM principal.municipio
                          WHERE dep_codigo=$departamento
                         ORDER BY mun_nombre ASC;";

        $query_municipio_residencia=$this->cnxion->ejecutar($sql_municipio_residencia);

        while($data_municipio_residencia=$this->cnxion->obtener_filas($query_municipio_residencia)){
            $datamunicipio_residencia[]=$data_municipio_residencia;
        }
        return $datamunicipio_residencia;

    }


    public function informacion_estudiante($estudiante){

        $sql_informacion_estudiante="SELECT per_codigo, per_nombre, per_primerapellido, per_segundonombre, 
                                            per_segundoapellido, per_identificacion,  per_fechanacimiento, 
                                            per_municipionacimiento, per_foto, dba_direccion, 
                                            dba_municipioresidencia, dba_correo, dba_telefono,
                                            dba_celular, dba_ocupacion
                                    FROM principal.persona, principal.datos_basicos
                                    WHERE per_codigo=dba_persona
                                    AND per_codigo=$estudiante;";

        $query_informacion_estudiante=$this->cnxion->ejecutar($sql_informacion_estudiante);

        while($data_informacion_estudiante=$this->cnxion->obtener_filas($query_informacion_estudiante)){
            $datainformacion_estudiante[]=$data_informacion_estudiante;
        }
        return $datainformacion_estudiante;
    }

    public function lugar_nacimiento($mun_nace){

        $sql_lugar_nacimiento="SELECT mun_codigo, mun_nombre, DEP.dep_codigo, mun_dane,dep_nombre 
                                 FROM principal.municipio AS MUN, principal.departamento AS DEP
                                WHERE CAST(DEP.dep_dane AS BIGINT)=MUN.dep_codigo
                                  AND  mun_codigo=$mun_nace;";

        $query_lugar_nacimiento=$this->cnxion->ejecutar($sql_lugar_nacimiento);

        $data_lugar_nacimiento=$this->cnxion->obtener_filas($query_lugar_nacimiento);

        $mun_nombre=$data_lugar_nacimiento['mun_nombre'];
        $dep_nombre=$data_lugar_nacimiento['dep_nombre'];

        $nombre_lugar=$mun_nombre." / ".$dep_nombre;

        return $nombre_lugar;

    }

    public function datos_inscripcion($estudiante, $calendario_apertura){

        $sql_datos_inscripcion="SELECT din_codigo, din_ninio, din_vivecon, 
                                       din_tienefamiliar, din_parentesco, 
                                       din_gradoingresar, din_gradoactual, 
                                       din_estudiaen, din_motivoretiro,
                                       din_estudiosanteriores
                                  FROM principal.datos_inscripcion_ninio
                                 WHERE din_ninio = $estudiante
                                   AND dni_anio = $calendario_apertura;";

        $query_datos_inscripcion=$this->cnxion->ejecutar($sql_datos_inscripcion);

        while($data_datos_inscripcion=$this->cnxion->obtener_filas($query_datos_inscripcion)){
            $datadatos_inscripcion[]=$data_datos_inscripcion;
        }
        return $datadatos_inscripcion;

    }

    public function dtos_estudios_anteriores($estudiante){

        $sql_dtos_estudios_anteriores="SELECT ean_codigo, ean_grado, ean_colegio, 
                                              ean_direccion, ean_telefono, ean_ciudad, 
                                              ean_year, ean_ninio
                                         FROM principal.estudios_anteriores
                                        WHERE ean_ninio = $estudiante;";

        $query_dtos_estudios_anteriores=$this->cnxion->ejecutar($sql_dtos_estudios_anteriores);

        while($data_dtos_estudios_anteriores=$this->cnxion->obtener_filas($query_dtos_estudios_anteriores)){
            $datadtos_estudios_anteriores[]=$data_dtos_estudios_anteriores;
        }
        return $datadtos_estudios_anteriores;

    }

    public function tipo_acompaniamiento(){

        $sql_tipo_acompaniamiento="SELECT tac_codigo, tac_nombre
                                     FROM principal.tipo_acompaniamiento;";

        $query_tipo_acompaniamiento=$this->cnxion->ejecutar($sql_tipo_acompaniamiento);

        while($data_tipo_acompaniamiento=$this->cnxion->obtener_filas($query_tipo_acompaniamiento)){
            $datatipo_acompaniamiento[]=$data_tipo_acompaniamiento;
        }
        return $datatipo_acompaniamiento;

    }

    public function parentesco_nombre($par_codigo){

        $sql_parentesco_nombre="SELECT par_codigo, par_nombre, par_estado
                                FROM principal.parentesco
                                WHERE par_codigo=$par_codigo;";

        $query_parentesco_nombre=$this->cnxion->ejecutar($sql_parentesco_nombre);

        $data_parentesco_nombre=$this->cnxion->obtener_filas($query_parentesco_nombre);

        $par_nombre=$data_parentesco_nombre['par_nombre'];

        return $par_nombre;

    }

    public function check_acompaniamiento($codigo_estudiante, $codigo_acompaniamiento){

        $sql_check_acompaniamiento="SELECT COUNT(*) AS validar
                                      FROM principal.seguimiento_ninio
                                     WHERE sni_ninio = $codigo_estudiante
                                       AND sni_tiposeguimiento = $codigo_acompaniamiento;";

        $query_check_acompaniamiento=$this->cnxion->ejecutar($sql_check_acompaniamiento);

        $data_check_acompaniamiento=$this->cnxion->obtener_filas($query_check_acompaniamiento);

        $validar = $data_check_acompaniamiento['validar'];

        if($validar == 0){
            $checked_segnmnto = "";
        }
        else{
            $checked_segnmnto = "checked";
        }
        return $checked_segnmnto;
    }

    public function nombre_acompaniante($codigo_estudiante){

        $sql_nombre_acompaniante="SELECT sni_codigo, sni_ninio, 
                                         sni_tiposeguimiento, sni_otrosegumiento
                                    FROM principal.seguimiento_ninio
                                    WHERE sni_ninio = $codigo_estudiante
                                    AND sni_tiposeguimiento = 4;";

        $query_nombre_acompaniante=$this->cnxion->ejecutar($sql_nombre_acompaniante);

        $data_nombre_acompaniante=$this->cnxion->obtener_filas($query_nombre_acompaniante);

        $sni_otrosegumiento = $data_nombre_acompaniante['sni_otrosegumiento'];

        return $sni_otrosegumiento;
    }

    public function grado_ingresar($gra_codigo){

        $sql_grado_ingresar="SELECT gra_codigo, gra_nombre, gra_estado
                                    FROM principal.grado
                                    WHERE gra_codigo=$gra_codigo";

        $query_grado_ingresar=$this->cnxion->ejecutar($sql_grado_ingresar);

        $data_grado_ingresar=$this->cnxion->obtener_filas($query_grado_ingresar);

        $gra_nombre=$data_grado_ingresar['gra_nombre'];

        return $gra_nombre;

    }

    public function educacion_anterior($estudiante){

        $sql_educacion_anterior="SELECT ean_codigo, ean_grado, 
                                        ean_colegio, ean_direccion, 
                                        ean_telefono, ean_ciudad, 
                                        ean_year, ean_ninio
                                   FROM principal.estudios_anteriores
                                  WHERE ean_ninio=$estudiante;";

        $query_educacion_anterior=$this->cnxion->ejecutar($sql_educacion_anterior);

        while($data_educacion_anterior=$this->cnxion->obtener_filas($query_educacion_anterior)){
            $dataeducacion_anterior[]=$data_educacion_anterior;
        }
        return $dataeducacion_anterior;

    }

    public function info_anio_perdido($estudiante){

        $sql_info_anio_perdido="SELECT dcp_codigo, dcp_ninio, 
                                        dcp_haperdido, dcp_cual, 
                                        dcp_fechacreo, dcp_fechamodifico, 
                                        dcp_personacreo, dcp_personamodifico
                                   FROM principal.datos_cursos_perdidos
                                 WHERE dcp_ninio=$estudiante;";

        $query_info_anio_perdido=$this->cnxion->ejecutar($sql_info_anio_perdido);

        while($data_info_anio_perdido=$this->cnxion->obtener_filas($query_info_anio_perdido)){
            $datainfo_anio_perdido[]=$data_info_anio_perdido;
        }
        return $datainfo_anio_perdido;

    }

    public function info_papito($estudiante){

        $sql_info_papito="SELECT per_codigo, per_nombre, per_segundonombre, 
                                 per_primerapellido, per_segundoapellido, per_genero,
                                 per_fechanacimiento, per_municipionacimiento,
                                 per_foto, per_identificacion, dba_municipioresidencia,
                                 dba_correo, dba_telefono, dba_celular,
                                 dba_lugarexpedicion, dba_direccion,
                                 dba_ocupacion
                            FROM principal.persona, principal.papas_ninios, principal.datos_basicos
                            WHERE per_codigo=pni_papas
                            AND per_codigo=dba_persona
                            AND pni_tipo=1
                            AND pni_ninio=$estudiante;";

        $query_info_papito=$this->cnxion->ejecutar($sql_info_papito);

        while($data_info_papito=$this->cnxion->obtener_filas($query_info_papito)){
            $datainfo_papito[]=$data_info_papito;
        }
        return $datainfo_papito;
    }

    public function info_adicional_papito($padre){

        $sql_info_adicional_papito="SELECT dpa_codigo, dpa_papa, dpa_vive,
                                           dpa_cargo, dpa_empresa, 
                                           dpa_direccionoficina, dpa_telefonooficina, 
                                           dpa_niveleducativo
                                      FROM principal.datos_papas
                                     WHERE dpa_papa=$padre";

        $query_info_adicional_papito=$this->cnxion->ejecutar($sql_info_adicional_papito);

        while($data_info_adicional_papito=$this->cnxion->obtener_filas($query_info_adicional_papito)){
            $datainfo_adicional_papito[]=$data_info_adicional_papito;
        }
        return $datainfo_adicional_papito;
    }

    public function info_mamita($estudiante){

        $sql_info_mamita="SELECT per_codigo, per_nombre, per_segundonombre, 
                                per_primerapellido, per_segundoapellido, per_genero,
                                per_fechanacimiento, per_municipionacimiento,
                                per_foto, per_identificacion, dba_municipioresidencia,
                                dba_correo, dba_telefono, dba_celular,
                                dba_lugarexpedicion, dba_direccion,
                                dba_ocupacion
                           FROM principal.persona, principal.papas_ninios, principal.datos_basicos
                          WHERE per_codigo=pni_papas
                            AND per_codigo=dba_persona
                            AND pni_tipo=2
                            AND pni_ninio=$estudiante;";

        $query_info_mamita=$this->cnxion->ejecutar($sql_info_mamita);

        while($data_info_mamita=$this->cnxion->obtener_filas($query_info_mamita)){
            $datainfo_mamita[]=$data_info_mamita;
        }
        return $datainfo_mamita;

    }

    public function info_adicional_mamita($madre){

        $sql_info_adicional_mamita="SELECT dpa_codigo, dpa_papa, dpa_vive,
                                           dpa_cargo, dpa_empresa, 
                                           dpa_direccionoficina, dpa_telefonooficina, 
                                           dpa_niveleducativo
                                      FROM principal.datos_papas
                                     WHERE dpa_papa=$madre";

        $query_info_adicional_mamita=$this->cnxion->ejecutar($sql_info_adicional_mamita);

        while($data_info_adicional_mamita=$this->cnxion->obtener_filas($query_info_adicional_mamita)){
            $datainfo_adicional_mamita[]=$data_info_adicional_mamita;
        }
        return $datainfo_adicional_mamita;
    }

    public function datos_matrimonio($ninio){

        $sql_datos_matrimonio="SELECT dma_codigo, dma_ninio, dma_fechamatrimonio,
                                      dma_tipomatrimonio, dma_cual, dma_vivenjuntos
                                 FROM principal.datos_matrimonio
                                 WHERE dma_ninio=$ninio;";

        $query_datos_matrimonio=$this->cnxion->ejecutar($sql_datos_matrimonio);

        while($data_datos_matrimonio=$this->cnxion->obtener_filas($query_datos_matrimonio)){
            $datadatos_matrimonio[]=$data_datos_matrimonio;
        }
        return $datadatos_matrimonio;
    }

    public function datos_recomendacion($ninio, $calendario_apertura){

        $sql_datos_recomendacion="SELECT rec_codigo, rec_ninio, rec_nombre, 
                                         rec_telefono, rec_celular, rec_motivoeleccion
                                    FROM principal.recomendacion
                                   WHERE rec_ninio = $ninio
                                   AND rec_anio = $calendario_apertura;";

        $query_datos_recomendacion=$this->cnxion->ejecutar($sql_datos_recomendacion);

        while($data_datos_recomendacion=$this->cnxion->obtener_filas($query_datos_recomendacion)){
            $datadatos_recomendacion[]=$data_datos_recomendacion;
        }
        return $datadatos_recomendacion;
    }

    public function datos_acompaniamiento($ninio, $acompanamiento){

        $sql_datos_acompaniamiento="SELECT COUNT(*) AS seguimiento_acompaniamiento
                                     FROM principal.seguimiento_ninio
                                    WHERE sni_ninio=$ninio
                                    AND sni_tiposeguimiento=$acompanamiento;";

        $query_datos_acompaniamiento=$this->cnxion->ejecutar($sql_datos_acompaniamiento);

        $data_datos_acompaniamiento=$this->cnxion->obtener_filas($query_datos_acompaniamiento);

        $seguimiento_acompaniamiento=$data_datos_acompaniamiento['seguimiento_acompaniamiento'];

        return $seguimiento_acompaniamiento;
    }

    public function cual_acompaniamiento($ninio, $acompanamiento){

        $sql_cual_acompaniamiento="SELECT sni_codigo, sni_ninio, sni_otrosegumiento
                                     FROM principal.seguimiento_ninio
                                    WHERE sni_ninio=$ninio
                                      AND sni_tiposeguimiento=$acompanamiento;";

        $query_cual_acompaniamiento=$this->cnxion->ejecutar($sql_cual_acompaniamiento);

        $data_cual_acompaniamiento=$this->cnxion->obtener_filas($query_cual_acompaniamiento);

        $sni_otrosegumiento=$data_cual_acompaniamiento['sni_otrosegumiento'];

        return $sni_otrosegumiento;
    }

    public function banderas_ninio($ninio, $calendario_apertura){

        $sql_banderas_ninio="SELECT eni_codigo, eni_ninio, eni_estado,  eni_estadoproceso
                               FROM principal.estado_ninio
                              WHERE eni_estadodatos = 1
                                AND eni_ninio = $ninio
                                AND eni_calendario = $calendario_apertura;";

        $query_banderas_ninio=$this->cnxion->ejecutar($sql_banderas_ninio);

        while($data_banderas_ninio=$this->cnxion->obtener_filas($query_banderas_ninio)){
            $databanderas_ninio[]=$data_banderas_ninio;
        }
        return $databanderas_ninio;
    }

    public function depa_codigo($muni_codigo){

        $sql_depa_codigo="SELECT mun_codigo, mun_nombre, DEP.dep_codigo, mun_dane,dep_nombre 
                                  FROM principal.municipio AS MUN, principal.departamento AS DEP
                                WHERE CAST(DEP.dep_dane AS BIGINT)=MUN.dep_codigo
                                  AND  mun_codigo=$muni_codigo;";

        $query_depa_codigo=$this->cnxion->ejecutar($sql_depa_codigo);

        $data_depa_codigo=$this->cnxion->obtener_filas($query_depa_codigo);

        $dep_codigo=$data_depa_codigo['dep_codigo'];

        return $dep_codigo;

    }

    public function select_municipio_depa($depa_codigo){

        $sql_select_municipio_depa="SELECT mun_codigo, mun_nombre, DEP.dep_codigo, mun_dane,dep_nombre 
                                  FROM principal.municipio AS MUN, principal.departamento AS DEP
                                WHERE CAST(DEP.dep_dane AS BIGINT)=MUN.dep_codigo
                                  AND  DEP.dep_codigo=$depa_codigo;";

        $query_select_municipio_depa=$this->cnxion->ejecutar($sql_select_municipio_depa);

        while($data_select_municipio_depa=$this->cnxion->obtener_filas($query_select_municipio_depa)){
            $dataselect_municipio_depa[]=$data_select_municipio_depa;
        }
        return $dataselect_municipio_depa;
    }

    public function info_inscrpcion($nnino, $calendario_apertura){

        $sql_info_inscrpcion="SELECT din_codigo, din_vivecon,
                                     din_tienefamiliar, din_parentesco, 
                                     din_gradoingresar, din_gradoactual, 
                                     din_estudiaen, din_motivoretiro, 
                                     din_estudiosanteriores
                                FROM principal.datos_inscripcion_ninio
                               WHERE din_ninio = $nnino
                               AND dni_anio = $calendario_apertura;";

        $query_info_inscrpcion=$this->cnxion->ejecutar($sql_info_inscrpcion);

        while($data_info_inscrpcion=$this->cnxion->obtener_filas($query_info_inscrpcion)){
            $datainfo_inscrpcion[]=$data_info_inscrpcion;
        }
        return $datainfo_inscrpcion;
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

    public function validar_papa($codigo_estudiante, $rol){

        $sql_validar_papa="SELECT COUNT(*) AS dtos
                             FROM principal.papas_ninios
                            WHERE pni_tipo = $rol
                              AND pni_ninio = $codigo_estudiante;";

        $query_validar_papa=$this->cnxion->ejecutar($sql_validar_papa);

        $data_validar_papa=$this->cnxion->obtener_filas($query_validar_papa);

        $dtos = $data_validar_papa['dtos'];

        return $dtos;
    }
}
?>