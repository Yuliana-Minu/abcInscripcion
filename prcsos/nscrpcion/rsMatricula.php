<?php 
class RsMatricula{
    private $cnxion;

    public function __construct(){
        $this->cnxion = Dtbs::getInstance();
    }

    public function tipo_identificacion(){

        $sql_tipo_identificacion="SELECT tid_codigo, tid_nombre, tid_referencia
                                    FROM principal.tipo_identificacion;";

        $query_tipo_identificacion=$this->cnxion->ejecutar($sql_tipo_identificacion);

        while($data_tipo_identificacion=$this->cnxion->obtener_filas($query_tipo_identificacion)){
            $datatipo_identificacion[]=$data_tipo_identificacion;
        }
        return $datatipo_identificacion;
    }

    public function eps(){

        $sql_eps="SELECT eps_codigo, eps_descripcion, eps_estado
                     FROM principal.eps;";

        $query_eps=$this->cnxion->ejecutar($sql_eps);

        while($data_eps=$this->cnxion->obtener_filas($query_eps)){
            $dataeps[]=$data_eps;
        }
        return $dataeps;
    }

    public function rh(){

        $sql_rh="SELECT rh_codigo, rh_nombre, rh_estado
                    FROM principal.rh;";

        $query_rh=$this->cnxion->ejecutar($sql_rh);

        while($data_rh=$this->cnxion->obtener_filas($query_rh)){
            $datarh[]=$data_rh;
        }
        return $datarh;
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

    public function datos_ninio($per_codigo){

        $sql_datos_ninio="SELECT per_codigo, per_nombre, per_primerapellido, 
                                per_segundoapellido, per_personacreo, per_personamodifico, 
                                per_fechacreo, per_fechamodifico, per_genero, 
                                per_tipoidentificacion, per_identificacion, 
                                per_estado, per_segundonombre, per_fechanacimiento, 
                                per_municipionacimiento, per_aleatoreo, dba_municipioresidencia,
                                dba_correo, dba_telefono, dba_celular,
                                dba_lugarexpedicion, dba_direccion,per_foto,
                                per_nacionalidad, per_otranacionalidad,
                                dba_eps, dba_estrato, dba_sisben, dba_rh
                        FROM principal.persona, principal.datos_basicos
                        WHERE CAST(per_codigo as bigint)=dba_persona
                            AND CAST(per_codigo as bigint)=$per_codigo;";

        $query_datos_ninio=$this->cnxion->ejecutar($sql_datos_ninio);

        while($data_datos_ninio=$this->cnxion->obtener_filas($query_datos_ninio)){
            $datadatos_ninio[]=$data_datos_ninio;
        }
        return $datadatos_ninio;

    }

    public function datos_papa($per_codigo){

        $sql_datos_papa="SELECT per_codigo, per_nombre, per_segundonombre, 
                                per_primerapellido, per_segundoapellido, per_genero,
                                per_fechanacimiento, per_municipionacimiento,
                                per_foto, per_identificacion, dba_municipioresidencia,
                                dba_correo, dba_telefono, dba_celular,
                                dba_lugarexpedicion, dba_direccion,
                                dba_ocupacion, per_nacionalidad, per_otranacionalidad,
                                per_tipoidentificacion
                        FROM principal.persona, principal.papas_ninios, principal.datos_basicos
                        WHERE per_codigo=pni_papas
                        AND per_codigo=dba_persona
                        AND pni_tipo=1
                            AND pni_ninio=$per_codigo;";

        $query_datos_papa=$this->cnxion->ejecutar($sql_datos_papa);

        while($data_datos_papa=$this->cnxion->obtener_filas($query_datos_papa)){
            $datadatos_papa[]=$data_datos_papa;
        }
        return $datadatos_papa;

    }


    public function datos_mama($per_codigo){

        $sql_datos_papa="SELECT per_codigo, per_nombre, per_segundonombre, 
                                per_primerapellido, per_segundoapellido, per_genero,
                                per_fechanacimiento, per_municipionacimiento,
                                per_foto, per_identificacion, dba_municipioresidencia,
                                dba_correo, dba_telefono, dba_celular,
                                dba_lugarexpedicion, dba_direccion,
                                dba_ocupacion, per_nacionalidad, per_otranacionalidad,
                                per_tipoidentificacion
                           FROM principal.persona, principal.papas_ninios, principal.datos_basicos
                          WHERE per_codigo=pni_papas
                            AND per_codigo=dba_persona
                            AND pni_tipo=2
                            AND pni_ninio=$per_codigo;";

        $query_datos_papa=$this->cnxion->ejecutar($sql_datos_papa);

        while($data_datos_papa=$this->cnxion->obtener_filas($query_datos_papa)){
            $datadatos_papa[]=$data_datos_papa;
        }
        return $datadatos_papa;

    }

    public function datos_acudiente($per_codigo){

        $sql_datos_acudiente="SELECT per_codigo, per_nombre, per_segundonombre, 
                                per_primerapellido, per_segundoapellido, per_genero,
                                per_fechanacimiento, per_municipionacimiento,
                                per_foto, per_identificacion, dba_municipioresidencia,
                                dba_correo, dba_telefono, dba_celular,
                                dba_lugarexpedicion, dba_direccion,
                                dba_ocupacion, per_nacionalidad, per_otranacionalidad,
                                per_tipoidentificacion
                           FROM principal.persona, principal.papas_ninios, principal.datos_basicos
                          WHERE per_codigo=pni_papas
                            AND per_codigo=dba_persona
                            AND pni_tipo=3
                            AND pni_ninio=$per_codigo;";

        $query_datos_acudiente=$this->cnxion->ejecutar($sql_datos_acudiente);

        while($data_datos_acudiente=$this->cnxion->obtener_filas($query_datos_acudiente)){
            $datadatos_acudiente[]=$data_datos_acudiente;
        }
        return $datadatos_acudiente;

    }


    public function dep_nacimiento($mun_codigo){

        $sql_departamento_nombre="SELECT DEP.dep_codigo, dep_nombre, dep_dane, mun_nombre
                                    FROM principal.departamento as DEP, principal.municipio AS MUN
                                   WHERE CAST(dep_dane AS BIGINT)=MUN.dep_codigo
                                     AND mun_codigo=$mun_codigo;";

        $query_departamento_nombre=$this->cnxion->ejecutar($sql_departamento_nombre);

        $data_departamento_nombre=$this->cnxion->obtener_filas($query_departamento_nombre);

        $dep_codigo=$data_departamento_nombre['dep_codigo'];

        return $dep_codigo;
    }

    public function mun_rela_dep($dep_codigo){

        $sql_mun_rela_dep="SELECT DEP.dep_codigo, dep_nombre, dep_dane, mun_nombre, mun_codigo
                                    FROM principal.departamento as DEP, principal.municipio AS MUN
                                   WHERE CAST(dep_dane AS BIGINT)=MUN.dep_codigo
                                     AND DEP.dep_codigo=$dep_codigo;";

        $query_mun_rela_dep=$this->cnxion->ejecutar($sql_mun_rela_dep);

        while($data_mun_rela_dep=$this->cnxion->obtener_filas($query_mun_rela_dep)){
            $datamun_rela_dep[]=$data_mun_rela_dep;
        }
        return $datamun_rela_dep;
    }

    public function datos_matricula($ninio, $calendario_apertura){

        $sql_datos_matricula="SELECT dma_codigo, dma_ninio, dma_fechamatricula, 
                                  dma_gradoingresar, dma_estado, gra_nombre
                             FROM principal.datos_matricula, principal.grado
                            WHERE dma_gradoingresar=gra_codigo
                              AND dma_ninio = $ninio
                              AND dma_anio = $calendario_apertura;";

        $query_datos_matricula=$this->cnxion->ejecutar($sql_datos_matricula);

        while($data_datos_matricula=$this->cnxion->obtener_filas($query_datos_matricula)){
            $datadatos_matricula[]=$data_datos_matricula;
        }
        return $datadatos_matricula;
    }


    public function nombre_tipo_identificacion($tid_codigo){

        $sql_nombre_tipo_identificacion="SELECT tid_codigo, tid_nombre, tid_referencia
                                            FROM principal.tipo_identificacion
                                        WHERE tid_codigo=$tid_codigo;";

        $query_nombre_tipo_identificacion=$this->cnxion->ejecutar($sql_nombre_tipo_identificacion);

        $data_nombre_tipo_identificacion=$this->cnxion->obtener_filas($query_nombre_tipo_identificacion);

        $tid_nombre=$data_nombre_tipo_identificacion['tid_nombre'];

        return $tid_nombre;
    }

    public function eps_nombre($codigo_eps){

        $sql_eps_nombre="SELECT eps_codigo, eps_descripcion, eps_estado
                            FROM principal.eps
                        WHERE eps_codigo=$codigo_eps;";

        $query_eps_nombre=$this->cnxion->ejecutar($sql_eps_nombre);

        $data_eps_nombre=$this->cnxion->obtener_filas($query_eps_nombre);

        $eps_descripcion=$data_eps_nombre['eps_descripcion'];

        return $eps_descripcion;
    }

    public function rh_nombre($codigo_rh){

        $sql_rh_nombre="SELECT rh_codigo, rh_nombre
                            FROM principal.rh
                        WHERE rh_codigo=$codigo_rh;";

        $query_rh_nombre=$this->cnxion->ejecutar($sql_rh_nombre);

        $data_rh_nombre=$this->cnxion->obtener_filas($query_rh_nombre);

        $rh_nombre=$data_rh_nombre['rh_nombre'];

        return $rh_nombre;
    }



}

?>